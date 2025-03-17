<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return 'invoke';
    }

    public function home () {
        return 'home';
    }

    public function map () {
        return 'map';
    }

    public function message ($id) {
        return $id;
    }



    public function mypage () {
        //return 'mypage';
        return view('mypage');
    }




    public function testView () {
        // варинат передачи данных через массив

        $clients = array("id"=>"1", "name"=>"Pedro", "email"=>"Pedo@ya.ru");
        
        return view('example',['a'=> 'Hello','b'=> 25,'clients'=> $clients ]);

        // вариант с функцией with
        // return view('example')
        //     ->with ('a','Hello')
        //     ->with ('b', 25);

        // если шаблон лежит в другой папке например sub
        //return view('sub.example',['a'=> 'SUB Hello','b'=> 25]);

        // Фнкция veiw это просто обращение к фасаду View
        // для его работы порописываем use Illuminate\Support\Facades\View;
        //return View::make('sub.example',['a'=> 'SUB Hello','b'=> 25]);

        // у фасада View есть функция проверки существования шаблона
        //return View::exists('example'); // выдаст 1 

        
        
    }
}
