<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class  ProductRequest extends FormRequest
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
        $productId = $this->route('product')?->id;
        return [
            'name' => 'required|string|max:255|min:3',
            'slug' => "required|max:255|min:3|unique:products,slug,{$productId}|regex:/^[a-z0-9-]+$/",
            'ean' => "nullable|unique:products,ean,{$productId}",
            'sku' => "nullable|unique:products,sku,{$productId}",
            'description' => 'max:5000|min:3',
            'status' => 'required|in:1,0',
            'category_id' => 'nullable|exists:categories,id'
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
            'slug.unique' => __('validation.unique'),
            'slug.regex' => __('validation.custom.slug.regex'),
            'status.required' => __('validation.required'),
            'status.in' => __('validation.custom.status.in'),
            'category_id.exists' => __('validation.exists'),
            'description.min' => __('validation.min.string'),
            'description.max' => __('validation.max.string'),
            'ean.unique' => __('validation.unique'),
            'sku.unique' => __('validation.unique'),
        ];
    }
}
