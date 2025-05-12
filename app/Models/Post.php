<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
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

}
