<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'type_label' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'gmaps_url' => ['nullable', 'url'],
            'phone' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'url'],
            'services' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'venue_relation' => ['nullable', 'string'],
            'distance' => ['nullable', 'string', 'max:50'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $merge = [];

        if ($this->has('is_active')) {
            $merge['is_active'] = filter_var($this->input('is_active'), FILTER_VALIDATE_BOOLEAN);
        }

        if ($this->filled('gmaps_url')) {
            $url = trim($this->input('gmaps_url'));
            if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                $url = 'https://' . $url;
            }
            $merge['gmaps_url'] = $url;
        }

        if ($this->has('sort_order') && $this->input('sort_order') !== null && $this->input('sort_order') !== '') {
            $merge['sort_order'] = (int) $this->input('sort_order');
        }

        if (!empty($merge)) {
            $this->merge($merge);
        }
    }
}
