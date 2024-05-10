<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $workData
 */
class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'age' => ['required', 'numeric'],
            'email' => ['required', 'email', 'max:255'],
            'position' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'workData' => ['nullable', 'string'],
        ];
    }
}
