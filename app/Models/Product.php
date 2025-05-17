<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        // прописываем доступ к нашим заказам
        public function orders(){
            return $this->belongsToMany(Order::class);
        } 
}
