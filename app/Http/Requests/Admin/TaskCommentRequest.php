<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TaskCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => 'required|string|min:2|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => __('validation.required'),
            'text.min' => __('validation.min.string'),
            'text.max' => __('validation.max.string'),
        ];
    }
}

