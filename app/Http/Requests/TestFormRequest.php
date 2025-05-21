<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestFormRequest extends FormRequest
{
    // пирмер как можно переназначить редирек в случае если 
    // при общибке в форме нужно направить кудато еще 
    //protected $redirect = '/';
    // тотже пример с использованием имен маршрута
    //protected $redirectRoute = 'index';

    // если найдена ошибка в правиле то сделующие не проверяются
    //protected  $stopOnFirstFailure = true;


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // проверка права пользователя на достпу к странице
        // временно посавим true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // набор правил такой же как в validate
        return [
            'name' => 'required|min:2|max:100',
            'text' => 'required|max:100',
            'bd' => 'nullable|date'
        ];
    }

    // messages переопределяем сообщения об ошибках
    public function messages(){
        return [
            'name.required'=> 'Поле :attribute обязательное!!!! messages',
        ];
    }

        // attributes переопределяем атрибуты
        public function attributes(){
            return [
                'text' => 'текст attributes переопределяем атрибуты ***',
                'bd' => 'дата рождения attributes переопределяем атрибуты',
            ];
        }
}
