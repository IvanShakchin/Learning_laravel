<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // для получения клиента по данным из адреса
    public function client() {
            return $this->hasOne(Client::class);
    }
}
