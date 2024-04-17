<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $statuses = [
            'В работе' => 'in progress',
            'Сделать' => 'backlog',
            'На проверке' => 'review',
            'Завершено' => 'done',
        ];

        $this->merge([
            'status' => $statuses[$this->status] ?? 'backlog',
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', Rule::in(['in progress', 'backlog', 'review', 'done'])],
            'deadline' => 'nullable|date',
        ];
    }
}