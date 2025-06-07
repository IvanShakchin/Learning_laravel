<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\Hello;
use App\Notifications\ImportantError;
use App\Models\User;
use App\Events\MyEvent;



class AdvancedController extends Controller
{
    public function testMail(){
        Mail::to('z1001z@yandex.ru')->send(new Hello('Иван'));
        return 'testmail';
    }

    public function  testNotification(){
        //User::factory()->count(10)->create();
        Notification::send(User::find(1), new ImportantError(1978));
        return 'testNotification';
    }

    //use App\Events\MyEvent;
    public function  testEvent(){
        MyEvent::dispatch('Какие-то данные...');
        return 'testevent';
    }


}
