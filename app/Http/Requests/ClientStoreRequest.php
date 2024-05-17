<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|',
            'surname' => 'required|string|max:50',
            'email' => 'required|unique:clients|email|regex:/^\S+@\S+\.\S+$/',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'name.max' => 'Имя не должно превышать 50 символов',
            'surname.required' => 'Фамилия обязательна для заполнения',
            'surname.string' => 'Фамилия должна быть строкой',
            'surname.max' => 'Фамилия не должна превышать 50 символов',
            'email.required' => 'Почта обязательна для заполнения',
            'email.unique' => 'Такая почта уже существует',
        ];
    }
}

