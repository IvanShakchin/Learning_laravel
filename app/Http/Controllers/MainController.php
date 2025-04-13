<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;


class MainController extends Controller
{
    /* Обработайте входящий запрос */
    public function __invoke(Request $request)
    {
        echo $request->header('Host').'<br/>';
        echo $request->method().'<br/>';
        echo $request->isMethod('GET').'<br/>';
        echo $request->ip().'<br/>';
        echo $request->path().'<br/>';
        echo $request->url().'<br/>';
        echo $request->fullUrl().'<br/>';

        // можно дополнить данные в get
        echo $request->fullUrlWithQuery( ['c' => 12] ).'<br/>';

        // выводит все get и post параметры
        echo '<pre>';
        print_r ($request->input());
        echo '</pre>';

        // выводит только get параметры
        echo '<pre>';
        print_r ($request->query());
        echo '</pre>';

        // вариант получения переменной из get
        // если ее не будет то значение 0
        $a = $request->input('a', 0);
        // еще вариант записи $a = $request->a;
        echo 'a: '.$a.'<br/>';

        // has проверяет есть параметр или нет
        if ($request->has('b')) echo 'Параметрт b есть<br/>';
        else echo 'Праметра b НЕТ<br/>';

        // filled проверяет наличие значения параметра
        if ($request->filled('b')) echo 'значение Параметрт b есть<br/>';
        else echo 'значение Праметра b НЕТ<br/>';

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

    public function testBlade () {       
        return view('testblade',['a'=> 'Hello','b'=> '<b>Мой комментариц</b>','c'=> 3 ]);   
    }

    public function mypageBlade () {       
        return view('mypageblade',['basket_quantity'=> 15,'basket_amount'=> 25874 ]);   
    }
    
    public function extendsView () {       
        return view('childs.index');   
    }

    public function testComponents () { 
        // для того что бы использовать компонент my-input.blade.php
        // вызываем его из шаблона testcomponets 
        // (создаем testcomponets.blade.php этот шалон руками)      
        return view('testcomponents',['a'=> 15]);
    }

    public function testLayout () {    
        return view('childs.indexlayout');
    }

    public function testResponse () { 
        // 200 это код ответа в заголовке
        // return response('Тело ответа', 200);
        // добавить инфу в заголовке можно через header
        // return response('Тело ответа', 200)->header('a',1)->header('content-type', 'text/plain');
        // return response()->json(['a'=>5, 'b'=>[1,2,3],'c'=>true]);
        // при открытии страницы файл скачивается
        // return response()->download('index.php');
        // отображается содержимое файла
         return response()->file('robots.txt');
    }

    public function testUrl () {  
        
        echo url()->current().'</br>';
        //вариант вызова через фасад 
        // подключаем фасад use Illuminate\Support\Facades\URL;
        echo URL::current().'</br>';

        echo url()->full().'</br>';

        // показывает предыдущую страницу
        echo url()->previous().'</br>';

        // формирование нужного нам адреса см. стр /user
        echo url()->route('user', ['id'=>15]).'</br>';

        // секретная ссылка
        //echo url()->signedRoute('activate', ['id'=>15]).'</br>';

        // секретная ссылка временная в примере 60 миунт
        // еще есть вариант с секунадми addSeconds() // часы sddHours()
        echo url()->temporarysignedRoute('activate', now()->addMinutes(60), ['id'=>15]).'</br>';
        return '';
    }

    public function activate ( Request $request) {         
        // проверка валидносит ссылки через hasValidSignature
        // if ($request->hasValidSignature()){
        //     return 'Успешная активация: '.$request->id;
        // }
        // abort (401);     
        
        // проверка валидносит ссылки на этапе посредника
        return 'Успешная активация: '.$request->id;

    }

    public function counter ( Request $request) {  
        //выводим Объект сессии
        echo '<pre>';
        print_r ($request->session()->all());
        echo '<pre>';        
        // тотже вывод но без $request
        // echo '<pre>';
        // print_r (session()->all());
        // echo '<pre>'; 

        //проверка существования переменной в сесси
        echo 'a - '.session()->exists('a').'<br />';
        echo '_previous - '.session()->exists('_previous').'<br />';

        // проверка сущестрования переменной и отличия от null
        echo '_previous не null - '.session()->has('_previous').'<br />';

        // добваить параметр в сессию (он будет виден с первой загрузки стр)
        // ниже в программе после его объявления
        session()->put('b',10);
        // получить параметр
        echo 'b - '.session()->get('b').'<br />';
        // добавление массива в сессию
        session(['c'=>[1,2,8]]);
        // добавление элемента в существующий массив
        session()->push('c',1555);

        // получить элемент и сразу его удалить
        //echo session()->pull('b').'<br />';

        // удалить переменную из сессии
        //session()->forget('a');

        // пример - Счетчик посещения стр конкретным пользователем
        $counter = session()->get('counter', 0);
        $counter++;
        session()->put('counter',$counter);
        return 'counter - '.$counter;

        // вариант записи примера счетчика через функцию increment
        // session()->increment('counter');
        // return session()->get('counter');


    }

    public function testException () {    
       throw new CustomException ();
    }

    public function testLog() {    
        Log::debug('debug-lavel message');
        return 1;
    }    
}
