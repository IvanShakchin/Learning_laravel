<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
