<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\TaskPriorityEnum;
use App\Enums\TaskStatusEnum;

class TaskRequest extends FormRequest
{
    /**
     * Sprawdza, czy użytkownik ma uprawnienia do wykonania żądania.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reguły walidacji dla formularza zadań.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'text' => 'required|string|min:3',
            'id_user_assigned' => 'required|exists:users,id',
            'status' => 'required|in:' . implode(',', array_keys(TaskStatusEnum::getList())),
            'priority' => 'required|in:' . implode(',', array_keys(TaskPriorityEnum::getList())),
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'execution_time' => 'nullable|numeric|min:0|max:1000',
        ];
    }

    /**
     * Wiadomości błędów walidacji.
     */
    public function messages(): array
    {
        return [
            'name.required' => __('validation.required'),
            'name.min' => __('validation.min.string'),
            'name.max' => __('validation.max.string'),

            'text.required' => __('validation.required'),

            'id_user_assigned.required' => __('validation.required'),
            'id_user_assigned.exists' => __('validation.exists'),

            'id_author.required' => __('validation.required'),
            'id_author.exists' => __('validation.exists'),

            'status.required' => __('validation.required'),
            'status.in' => __('validation.in'),

            'priority.required' => __('validation.required'),
            'priority.in' => __('validation.in'),

            'start_date.required' => __('validation.required'),
            'start_date.date' => __('validation.date'),
            'start_date.before_or_equal' => __('validation.before_or_equal'),

            'end_date.required' => __('validation.required'),
            'end_date.date' => __('validation.date'),
            'end_date.after_or_equal' => __('validation.after_or_equal'),

            'execution_time.numeric' => __('validation.numeric'),
            'execution_time.min' => __('validation.min.numeric'),
            'execution_time.max' => __('validation.max.numeric'),
        ];
    }
}
