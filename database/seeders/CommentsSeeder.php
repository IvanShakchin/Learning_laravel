<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class CommentsSeeder extends Seeder
{
    // тут прописываем данные для заполения таблицы
    public function run(): void
    {
        $names = ['Алексей','Ольга','Василий','Володя','Петруха','Мишаня','Юлий'];
        // заполняем данные через цикл
        for ($i = 0; $i <100; $i++){
            $post_id = mt_rand(1,10);//заполняем поле рандомно

            // такая конструкция выбирает имя рандомно из
            // массива $names
            //$name = $names[mt_rand(0,count($names)-1)]; 
            // есть запись тогоже но с функцией laravel Arr
            // подключаем ее в шапке use Illuminate\Support\Arr;
            $name = Arr::random($names);

            // заполение буквам рандомно тоже подключаем
            // в шапке use Illuminate\Support\Str;
            $text = Str::random(mt_rand(30,100));

            //Не обязательно в будущем, делаем для примера
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');

            // Вариан добавления данные при отстутсвии МОДЕЛИ через фасад DB подключаем use Illuminate\Support\Facades\DB;
            // DB::insert(
            //     'INSERT INTO  `comments` (`post_id`,`name`,`text`,`created_at`,`updated_at`) VALUES (?,?,?,?,?)',
            //     [$post_id, $name, $text, $created_at, $updated_at]           
            // );

            // ЕЩЕ Вариан добавления данные при отстутсвии МОДЕЛИ через фасад DB
            DB::table('comments')->insert([
                'post_id' => $post_id, 
                'name' => $name,
                'text' => $text,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ]);



        }

    }
}
