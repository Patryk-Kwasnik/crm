<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class SortImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'integer|distinct|exists:images,id',
        ];
    }

    public function messages(): array
    {
        return [
            'ids.required' => __('validation.required'),
            'ids.array' => __('validation.array'),

        ];
    }
}
