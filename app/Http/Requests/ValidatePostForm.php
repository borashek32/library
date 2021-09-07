<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePostForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|max:100|min:3',
            'img'         => 'required|max:1024',
            'category_id' => 'required',
            'text'        => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'Поле "Название" обязательно для заполнения.',
            'title.max'          => 'Максимальная длина поля "Название" 30 символов',
            'title.min'          => 'Минимальная длина поля "Название" 3 символов',
            'img.required'       => 'Поле "Изображение" обязательно для заполнения',
            'category_id'        => 'Поле "Категория" обязательно для заполнения',
            'text.required'      => 'Поле "Текст" обязательно для заполнения',
            'text.min'           => 'Минимальная длина поля "Текст" 10 символа'
        ];
    }
}
