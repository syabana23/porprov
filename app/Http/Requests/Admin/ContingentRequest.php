<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContingentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user && ($user->isSuperAdmin() || $user->isAdmin());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $contingentId = $this->route('contingent') instanceof \App\Models\Contingent ? $this->route('contingent')->id : $this->route('contingent');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('contingents', 'slug')->ignore($contingentId)],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'type' => ['nullable', Rule::in(['kota', 'kabupaten'])],
            'province' => ['nullable', 'string', 'max:255'],
            'regency' => ['nullable', 'string', 'max:255'],
            'athlete_count' => ['nullable', 'integer', 'min:0'],
            'official_count' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $type = $this->input('type');
        if (empty($type)) {
            $name = strtolower($this->input('name', ''));
            $regency = strtolower($this->input('regency', ''));
            if (str_contains($name, 'kab') || str_contains($regency, 'kab')) {
                $type = 'kabupaten';
            } else {
                $type = 'kota';
            }
        }

        $this->merge([
            'type' => $type,
            'is_active' => $this->has('is_active') ? (bool)$this->input('is_active') : true,
            'sort_order' => $this->input('sort_order') === '' || is_null($this->input('sort_order')) ? 0 : $this->input('sort_order'),
        ]);
    }
}
