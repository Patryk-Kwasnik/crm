<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class DocumentUploadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'files.*' => 'mimes:pdf,doc,docx,xlsx,xls,jpg,jpeg,png|required|file|max:10240',
            'category_id' => 'nullable|exists:document_categories,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
