<?php

namespace App\Http\Requests\Admin;

use App\Enums\OfferStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
class OfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['nullable', 'exists:customers,id'],
            'customer_name' => ['required_without:customer_id', 'string', 'max:255'],
            'customer_email' => ['nullable', 'email'],
            'customer_phone' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'disount' => ['nullable', 'numeric', 'min:0'],
            'currency' => ['required', 'string'],
            'valid_until' => ['nullable', 'date'],
            'status' => 'required|in:' . implode(',', array_keys(OfferStatusEnum::getList())),
        ];
    }
}
