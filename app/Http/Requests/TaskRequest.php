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
            'В работе' => 'in_progress',
            'Сделать' => 'to_do',
            'На проверке' => 'review',
            'Завершено' => 'done',
            'Отменено' => 'canceled',
        ];

        $engStatuses = ['in_progress', 'to_do', 'review', 'done','canceled'];

        if (!in_array($this->status, $engStatuses)) {
            $this->merge([
                'status' => $statuses[$this->status] ?? 'to_do',
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', Rule::in(['in_progress', 'to_do', 'review', 'done','canceled'])],
            'deadline' => 'nullable|date|date_format:Y-m-d|after_or_equal:tomorrow',
        ];
    }
}
