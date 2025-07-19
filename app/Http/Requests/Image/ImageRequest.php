<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'model_type' => 'required|string|max:255',
            'model_id' => 'required|integer',
            'type' => 'nullable|string|max:100',
            'alt' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => __('validation.required'),
            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.mimes', ['values' => 'jpg, jpeg, png, webp']),
            'image.max' => __('validation.max.file', ['max' => '4MB']),

            'model_type.required' => __('validation.required'),
            'model_type.string' => __('validation.string'),

            'model_id.required' => __('validation.required'),
            'model_id.integer' => __('validation.integer'),

            'type.string' => __('validation.string'),
            'alt.string' => __('validation.string'),
        ];
    }
}
