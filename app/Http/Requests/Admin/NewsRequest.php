<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'category_id' => 'required|exists:news_categories,id',
            'slug' => 'required|string|min:3|max:255|alpha_dash',
            'status' => 'required|in:0,1',
            'text' => 'required|string|min:3',
        ];
    }

    /**
     * Spersonalizowane wiadomości błędów.
     */
    public function messages(): array
    {
        return [
            'title.required' => __('validation.required'),
            'title.min' => __('validation.min.string'),
            'title.max' => __('validation.max.string'),

            'category_id.required' => __('validation.required'),
            'category_id.exists' => __('validation.exists'),

            'slug.required' => __('validation.required'),
            'slug.min' => __('validation.min.string'),
            'slug.max' => __('validation.max.string'),
            'slug.alpha_dash' => __('validation.alpha_dash'),

            'status.required' => __('validation.required'),
            'status.in' => __('validation.custom.status.in'),

            'text.required' => __('validation.required'),
            'text.min' => __('validation.min.string'),
        ];
    }
}
