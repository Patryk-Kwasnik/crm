<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Sprawdza, czy użytkownik ma uprawnienia do wykonania żądania.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Definiuje reguły walidacji dla pól formularza.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'slug' => 'required|max:255|min:3',
            'status' => 'required|in:1,0',
            'category_parent_id' => 'nullable|exists:categories,id'
        ];
    }

    /**
     * Opcjonalnie: Spersonalizowane wiadomości błędów.
     */
    public function messages(): array
    {
        return [
            'name.required' => __('validation.required'),
            'name.min' => __('validation.min.string'),
            'name.max' => __('validation.max.string'),
            'slug.required' => __('validation.required'),
            'slug.min' => __('validation.min.string'),
            'slug.max' => __('validation.max.string'),
            'status.required' => __('validation.required'),
            'status.in' => __('validation.custom.status.in'),
            'category_parent_id.exists' => __('validation.exists'),
        ];
    }
}
