<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function address(){
        // для получения адреса по данным из клиента
        // belongsTo — метод который используется для определения отношений между моделями
        // Используется, когда в таблице модели есть поле, которое содержит ID первичного 
        // ключа другой таблицы (внешнего ключа).
        return $this->belongsTo(Address::class);
    }

    // orders - на конце s так как тут обращение к многим заказам
    public function orders(){
        return $this->hasMany(Order::class);
    }
}    
