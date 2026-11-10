<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VenueRequest extends FormRequest
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
        $venueId = $this->route('venue') instanceof \App\Models\Venue ? $this->route('venue')->id : $this->route('venue');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('venues', 'slug')->ignore($venueId)],
            'address' => ['nullable', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'gmaps_url' => ['nullable', 'url'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'max_stops' => ['nullable', 'integer'],
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
