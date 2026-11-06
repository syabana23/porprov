<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GalleryRequest extends FormRequest
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
        $galleryId = $this->route('gallery') instanceof \App\Models\Gallery ? $this->route('gallery')->id : $this->route('gallery');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('galleries', 'slug')->ignore($galleryId)],
            'media_type' => ['required', Rule::in(['image', 'video'])],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'url' => ['nullable', 'url'],
            'caption' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_published' => $this->has('is_published') ? true : false,
            'sort_order' => $this->input('sort_order') === '' ? 0 : $this->input('sort_order'),
        ]);
    }
}
