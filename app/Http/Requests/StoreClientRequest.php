<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'document' => 'required|string|max:50|unique:clients,document',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'municipality_id' => 'required|exists:municipalities,id',
            'responsible_id' => 'nullable|exists:responsibles,id',
            'initial_status' => 'required|string|in:peticion,respuesta,tutela,sic',
            'bureau' => 'required|string|in:datacredito,cifin',
            'notes' => 'nullable|string',
        ];
    }
}
