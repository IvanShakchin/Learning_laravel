<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // теперь global_var доступен во всех шаблонах
        View::share ('global_var','любое значение');

        // в рамках компоновщика composer указваем шаблон 
        // функуцию которая принимает ссылку на объект view
        // View::composer ('example', function ($view){

        //     //объект $view вытекает из файла MainController.php
        //     // public function testView () {
        //     //      return view('example',['a'=> 'Hello','b'=> 25]);

        //     // объекту view добавляем параметры
        //     $view->with('composer_data', 'Hello');

        // });

        View::composer('example',\App\View\Composers\ExampleComposer::class);

        // для отработки компанвщика ExampleComposer в разных шаблонах
        // используем массив
        // View::composer(
        //     ['example', 'sub.example'],
        //     \App\View\Composers\ExampleComposer::class
        // );

        View::composer ('mypage', function ($view){

        // объекту view добавляем параметры
        // количество товаров в корзине и общая сумма.
            $view->with('basket_quantity', 15); 
            $view->with('basket_amount', 25874);

        });

        // importantmessage название нашей директивы
        Blade::directive('importantmessage', function ($param) {
        // возвращаем строку с php кодом которая будет подставляться в blade
            return "<?php echo '<b>$param</b>'; ?>";
        });


    }
}
