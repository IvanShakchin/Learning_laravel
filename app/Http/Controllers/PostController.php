<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //testModel
    public function  testModel() {
        // для создания нового экземпляра модели 
        // вызываем конструктор нашей модели Post
        /*
        $post = new Post();
        // пример работы с полями
        // добавление новой записи        
        $post->autor = "Федор";
        $post->title = "Новыйе истории дяди Федора";
        $post->is_publish = false;
        $post->save();        
         
        // Пример работы с фабрикой
        $post = Post::factory()->make();
        echo $post->autor;
        $post->title = "наблюдаем добавление";
        $post->save();
        
        // добавление строки и объекта
        // обязательно добавляем fillable для обработки массовых запросов
        $post = Post::create(['autor'=>'Иван']);
        echo $post->title.'<br/>';
        */

        // примеры получения данных
        // вывод заголовка у 5 поста
        $post = Post::find(5);
        echo $post->title.'<br/>';
        // проверка изменялась ли модель после извлечения данных
        echo $post->isClean().'<br/>';
        // вводим изменения модели
        $post->title = 'Изменение модели';
        echo $post->isClean().'<br/>'; // выдасть 0
        // противоположная isClean это isDirty
        echo $post->isDirty().'<br/>';
        echo $post->isDirty('autor').'<br/>';//проверка по конретному полю
        echo $post->isDirty('title').'<br/>';//проверка по конретному полю
        $post->save();

        // извлечение всех объектов из таблицы all
        echo ('<br>/// извлечение всех объектов из таблицы all ////<br>');
        foreach (Post::all() as $post){
            echo $post->title.'<br/>';
        }
        // $post = Post::all();
        // echo ('<pre>');print_r($post);echo ('</pre>');

        // функция аналогичная find но с условием если строки нет то ошбка
        //$post = Post::findOrFail(100);//выведет 404 страницу

        // пример извлечения из бд по признаку (похоже как в построителе запросов)
        $posts = Post::where('is_publish',1)->get();
        echo ('<br>/// пример извлечения из бд по признаку ///<br>');
        foreach ($posts as $post){
            echo $post->autor.'<br/>';
        }
        

        $posts = Post::all();

        // пример удаления из выборки ненужного элемента reject
        $posts = $posts->reject(function($post) {
            return $post->autor == 'Nick Carroll MD';//уберет Nick Carroll MD
        });
        echo ('<br>/// пример удаления из выборки ненужного элемента reject ///<br>');
        foreach ($posts as $post){
            echo $post->autor.'<br/>';
        }

        // примеры обновления данныех  в бд
        Post::where('id','<=',5)->update(['is_publish' => 1]);

        // пример удаления строки c первоначальным извлечение
        //Post::find(3)->delete();

        // пример просто удаления строки 2 и 4 
        //Post::destroy([2,4]);

        // пример мягкого удаления (скрытия строки)
        // подключаем use SoftDeletes в Post.php
        // добавляем поле $table->SoftDeletes(); в миграцию

        // теперь при вызове destroy или delete строка не удаляется
        // а в поле deleted_at появляется данное об удалении строки
        Post::destroy([2,4]);        

        // для отображения удаленных записей используем withTrashed()
        $posts = Post::withTrashed()->get();
        echo ('<br>// для отображения удаленных записей используем withTrashed() //<br>');
        foreach ($posts as $post){
            echo $post->autor.'<br/>';
        }       
        return '';
    }
}
