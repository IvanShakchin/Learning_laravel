<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // если нужно изменить название таблици 
    // то меняем название в миграции postsneo и пишем тут
    // protected $table = 'postsneo';

    // если ну нужно создавать timestamps то 
    // коментим его в миграции и пишем тут
    // public $timestamps = false;

    // если нужен другой превичный ключ
    // protected $primaryKey = 'тут пишем название поля с ключом';
    // если поле с ключем не числовое а строка то 
    // protected $keyType = 'string';

    // занчения по умолчанию можно прописать в миграции и тут
    protected $attributes = [
        'title' => 'Новый пост',
        'is_publish'=> false
    ];

    // свойство $casts пример приведения типа данных
    protected $casts = [
        'is_publish'=> 'boolean'
    ];

    protected $fillable = ['autor'];
    
    // getAutorAttribute тут прописывается поле Autor к которому обращаемся
    protected function getAutorAttribute ($value) {
        return mb_strtoupper($value);
    }

    // прописываем условие следящее за изменение поля autor
    protected function setAutorAttribute ($value) {
        $this->attributes['autor']=$value;//тут пожно менять поле autor
        $this->attributes['title']='Этот пост был изменен при изменении автора: '.$value;

    }    


}
