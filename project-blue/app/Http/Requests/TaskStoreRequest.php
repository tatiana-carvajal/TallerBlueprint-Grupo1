<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:completado,pendiente,cancelado'],
            'due_date' => ['nullable', 'date'],
        ];
    }

    public function attributes()
    {
        return [
            'project_id' => 'poryecto',
            'name' => 'nombre',
            'description' => 'descripción',
            'status' => 'estado',
            'due_date' => 'fecha de vencimiento'
        ];
    }
}