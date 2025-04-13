<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    // тут прописываем то что не нужно обрабатывать
    // protected $dontReport = [
    //     //
    // ];
    /**
     * Список входных данных, которые никогда не передаются в сеанс при проверке исключений.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * зарегистрируйте обратные вызовы для обработки исключений для приложения.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
