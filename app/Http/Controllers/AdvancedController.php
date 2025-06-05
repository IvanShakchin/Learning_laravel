<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;

class AdvancedController extends Controller
{
    public function testMail(){
        Mail::to('z1001z@yandex.ru')->send(new Hello('Иван'));
        return 'testmail';
    }
}
