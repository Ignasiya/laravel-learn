<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:books',
            'author' => 'required|string|max:100',
            'genre' => 'required|string',
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
            'title.required' => 'Название книги обязательно для заполнения',
            'title.string' => 'Название книги должно быть строкой',
            'title.max' => 'Название книги не должно превышать 255 символов',
            'title.unique' => 'Такое название книги уже существует',
            'author.required' => 'Имя автора обязательно для заполнения',
            'author.string' => 'Имя автора должно быть строкой',
            'author.max' => 'Имя автора не должно превышать 100 символов',
            'genre.required' => 'Жанр обязателен для заполнения',
            'genre.string' => 'Жанр должен быть строкой',
        ];
    }
}
