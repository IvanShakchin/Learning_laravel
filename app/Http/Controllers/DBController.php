<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr; // подключаем
use Illuminate\Support\Str;// подключаем
use Illuminate\Support\Facades\DB;// подключаем

use Illuminate\Http\Request;

class DBController extends Controller
{
    public function testDB(){

        $names = ['Алексей','Ольга','Василий','Володя','Петруха','Мишаня','Юлий'];

            // $post_id = mt_rand(1,10);
            // $name = Arr::random($names);
            // $text = Str::random(mt_rand(30,100));
            // $created_at = date('Y-m-d H:i:s');
            // $updated_at = date('Y-m-d H:i:s');
            // echo DB::insert(
            //     'INSERT INTO  `comments` (`post_id`,`name`,`text`,`created_at`,`updated_at`) VALUES (?,?,?,?,?)',
            //     [$post_id, $name, $text, $created_at, $updated_at]           
            // );

            // Пример обновления post_id с 4 на 2 на странице через echo выведется цифра кол-ва измененных строк
            //echo DB::update ('UPDATE `comments` SET `post_id` = ? WHERE `post_id` =?', [2,4]);
            
            // Пример удаления
            //echo DB::delete ('DELETE FROM `comments` WHERE `name`=:name', ['name'=>'Василий']);

            // DB::insert ('INSERT INTO `comments` (`post_id`,`text`) VALUES (?,?)',[2,'text text text']);
            // DB::update ('UPDATE `comments` SET `post_id` = ? WHERE `post_id` =?', [2,4]);

            // когда стоит задача чтобы предыдущий запрос был отменен если следующй запрос завершился с ошибкой
            // DB::transaction (function(){
            //     DB::insert ('INSERT INTO `comments` (`post_id`,`text`) VALUES (?,?)',[2,'text text text']);
            //     DB::update ('UPDATE `comments` SET `post_id` = ?');
            // });

            // при выборке получаем массив объектов
            $comments = DB::select ('SELECT * FROM `comments`');
            echo ("<pre>");print_r ($comments);echo ("</pre>");

            // вывод через форыч
            foreach ($comments as $perbor){
                echo $perbor->id.'<br/>';
                echo $perbor->post_id.'<br/>';
                echo $perbor->name.'<br/>';
                echo $perbor->text.'<br/>';
                echo $perbor->created_at.'<br/>';
                echo $perbor->updated_at.'<br/>';
            }        
        return "";
    }
}
