<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreResponsibleRequest extends FormRequest
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
            'document' => 'required|string|max:50|unique:responsibles,document',
            'email' => 'required|email|max:255|unique:responsibles,email',
            'phone' => 'nullable|string|max:20',
            'specialty' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|in:cases,approvals,reports',
        ];
    }
}
