<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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

    // use Illuminate\Support\Facades\Storage;
    public function testUpload(Request $request){
        /*
        // пример создания файла
        // Storage::put('1.txt','Text.....');

        // пример создания файла с указанием диска
        Storage::disk('local')->put('1.txt','Text.....disk_local');
        Storage::disk('public')->put('1.txt','Text.....disk_public');
        // добавление текста в начало файла
        Storage::disk('public')->prepend('1.txt','Добавили.....prepend');
        // добавление текста в начало файла
        Storage::disk('public')->append('1.txt','Добавили.....append');
        // пример удаления файла 
        //Storage::disk('public')->delete('2.txt');
        //пример проверки существования файла
        if (Storage::disk('public')->exists('2.txt')){
            echo "файл 2.txt существует <br>";
        }else{
            echo "файл 2.txt несуществует <br>";
        }
        // копирование файла
        Storage::disk('public')->copy('1.txt','2_copy.txt');
        //чтение из файла
        echo Storage::disk('public')->get('1.txt')."<br>";
        // создание url
        // файл откроется потому что мы подключили символчесую ссылку
        echo Storage::disk('public')->url('1.txt')."<br>";
        */

        
        $path_url ='';
        if ($request->submit){
            // пример работы с отдельным валидатором 
            // use Illuminate\Support\Facades\Validator;
            // если будет ошибка влидации то он оставит пользователя на этой странице
            $validator = Validator::make($request->all(),[
                'image' => 'required|file|max:1024|mimes:jpg,png,gif'

            ]);
            $validator->validate();
            echo $request->file('image')->getClientOriginalName().'<br>';
            echo $request->file('image')->getClientOriginalExtension().'<br>';
            echo $request->file('image')->hashName().'<br>';
            echo $request->file('image')->getSize().'<br>';

            // сохраняем файл
            $path = Storage::disk('public')->putFile('images',$request->file('image'));
            echo $path.'<br>';
            // сохраняем файл со своим названием
            $path = Storage::disk('public')->putFileAs('images',$request->file('image'),'совё название.png');
            echo $path.'<br>';

            // получение url ссылки на загруженный файл
            $path_url = Storage::disk('public')->url($path);
            echo $path_url.'<br>';

            // если будет ошибка валидации то можно тут прописат дествие
            if($validator->fails()){
                echo "ошибка валидации";               
            }
        }
        return view('testupload',['image_url'=>$path_url]);
        
    }


}
