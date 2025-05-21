<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestFormRequest;

class FormController extends Controller
{
    public function testForm() { 
        return view('testform');
    }
    public function send (Request $request){
        // $name =$request->name;
        // $text=$request->text;
        // $bd=$request->bd;
        // echo $name.' - '.$text.' - '.$bd;

        // в случае ошибки при валидации функция validate
        // возваращает обратно в форму и пришет данные в сессию
        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
            'text' => 'required|max:100',
            // nullable - может быть нулем
            'bd' => 'nullable|date'
        ]);
        print_r($validated);


        return '';
    }

    // use App\Http\Requests\TestFormRequest;
    public function senBbyRequest (TestFormRequest $request){ 
        // получение данных как массива
        $validated = $request->validated();
        echo ('<pre>');print_r($validated);echo ('</pre>');

        // получение данных как объекта
        $validated = $request->safe();
        echo ('<pre>');print_r($validated);echo ('</pre>');
        echo $validated->name.'<br>';
        echo $validated->text.'<br>';
        echo $validated->bd.'<br>';
        return 1;
    }
}
