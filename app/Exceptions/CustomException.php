<?php
namespace App\Exceptions;
use Exception;

class CustomException extends Exception
{
    //метод для вывода инфы в лог файле
    public function context() {
        return ['data'=>'Данные'];
    }
    //метод отвечает за вывод исключения
    public function render() {
         return 'CustomException';
        //return view('welcome');
        // если без return то отобразиться
        // стандартный блок ошибки
    }
}
