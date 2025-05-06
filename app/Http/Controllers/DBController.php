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

    public function  testQueryBuilder() {
        /*
        // обращаемся через фасад DB к таблице comments и передаем массив
        // где ключи это названия столбцов а значение это даные 
        DB::table('comments')->insert([
            'post_id'=>'5',
            'name'=>'Олег',
            'text'=>'Мой комментарий'
        ]);
        // вариант многомерного массива
        DB::table('comments')->insert([
            ['post_id'=>'5','name'=>'Олег','text'=>'Мой комментарий'],
            ['post_id'=>'6','name'=>'Петя','text'=>'Мой комментарий 2'],
            ['post_id'=>'8','name'=>'Вася','text'=>'Мой комментарий 987'],
            ['post_id'=>'874','name'=>'Дамболдор','text'=>'Мой комментарий 12178441'],
        ]);

        // пример выборки с апдейтом
        DB::table('comments')->where('post_id','5')->update(['text'=>'замена текста ************** ']);
        // increment увеличивает данное  (5 на 8)
        DB::table('comments')->where('post_id','5')->increment('post_id',3);
        // удаление записей
        DB::table('comments')->where('post_id','8')->delete();
        */
        // пример выборки всех строк - получаем объект (коллекцию) работать с ней мы можем как с массивом
        $comments = DB::table('comments')->get();
        
        // выборка с условием
        $comments = DB::table('comments')->where('post_id',1)->get();

        // выбирает первую запись из выборки
        $comments = DB::table('comments')->where('post_id',1)->first();

        // выбирает записи более 9
        $comments = DB::table('comments')->where('post_id','>',9)->get();   
        
        // выбирает c LIKE
        $comments = DB::table('comments')->where('name','LIKE','%сил%')->get();   
        
        // выбирает по нескольким условиям как AND между условиями
        $comments = DB::table('comments')
            ->where('name','LIKE','%сил%')
            ->where('post_id','>',8)
            ->get();      

        // whereBetween выбирает между 2 - 4
        $comments = DB::table('comments')->whereBetween('id',[2,4])->get();  
        // противоположный вариант whereBetween выбирает между 2 - 4
        $comments = DB::table('comments')->whereNotBetween('id',[2,4])->get();    
        
        // выбирает строго 2 или 4
        $comments = DB::table('comments')->whereIn('id',[2,4])->get();  
        
        // выбирает не Null
        $comments = DB::table('comments')->whereNotNull('post_id')->get();         

        // выбирает Null
        $comments = DB::table('comments')->whereNull('post_id')->get();    

        // выбирает по нескольким условиям как OR между условиями
        $comments = DB::table('comments')
            ->where('post_id',8)
            ->Orwhere('post_id',1)
            ->get();

        // вариант сложно выборки с OR и AND
        $comments = DB::table('comments')
            ->where(function($query){
                $query->where('post_id',8)->where('name','LIKE','%сил%'); 
            })
            ->Orwhere('post_id',1)
            ->get();   
            
        // короткий вариант c find получению одной записи по id
        $comments = DB::table('comments')->find(1);    
        
        // вариант получения только нужного столбца select
        $comments = DB::table('comments')->select(['name','id'])->where('post_id',1)->get();

        // вариант выдачи с заданной сортировкой orderBy
        $comments = DB::table('comments')->orderBy('name')->get();
        // сортировка по убыванию либо desc как второй параметр либо orderByDesc
        $comments = DB::table('comments')->orderBy('name','desc')->get();
        $comments = DB::table('comments')->orderByDesc('name')->get();
        // сортировка по дмум столбцам
        $comments = DB::table('comments')->orderByDesc('name')->orderBy('id')->get();

        // сортировка записей в случайном порядке
        $comments = DB::table('comments')->inRandomOrder('name')->get();

        // вариант лимит limit  со смещением offset
        $comments = DB::table('comments')->limit(2)->offset(3)->get();

        // узанем количество записей
        $comments = DB::table('comments')->count();

        // узанем количество записей с условием
        $comments = DB::table('comments')->where('post_id',1)->count();

        // получаем минимальное/максимальное значение столбца post_id
        $comments = DB::table('comments')->min('post_id',1);
        $comments = DB::table('comments')->max('post_id',1);
        // среднее значение avg
        $comments = DB::table('comments')->avg('post_id',1);
        // сумма
        $comments = DB::table('comments')->sum('post_id',1);

        // проверка существования записи
        $comments = DB::table('comments')->where('post_id',4)->exists();

        // функция для отладки dd
        //$comments = DB::table('comments')->where('post_id',4)->dd();

        // вариант выборки больших данных 
        // где мы може работать в нутри запроса с коллекцией $comments (chunk отсекает по 2 записи)
        // DB::table('comments')->orderBy('id')->chunk(2,function($comments){
        //     echo ("<pre>");print_r ($comments);echo ("</pre>");
        // });
        
        // вариант альтернативный lazy но там в функцию приходит одна строка 
        DB::table('comments')->orderBy('id')->lazy()->each(function($comment){
            echo ("<pre>");print_r ($comment);echo ("</pre>");
        });

        //echo ("<pre>");print_r ($comments);echo ("</pre>");

        return "testQueryBuilder";
    }




}
