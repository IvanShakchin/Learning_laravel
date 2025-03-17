<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// фасад Route содержит набор статичиских функций с функциями замыкания

Route::get('/', function () { // все get запросы обрабатываются тут
    return view('welcome');  // глобальная функция view запускает шаблон welcome
});

Route::get('/about', function () {  // get, post, put, patch, delete,
    $x = 5 + 7;
    echo $x."<br> Выводит что то <br>";
    return $x + 5; 
});

Route::post('/about', function () { 
    return 1; 
});

Route::match (['get','post'], 'contacts', function () { 
    return 'contacts'; 
}); // на этой странице мы get открваем стр. post обрабатыем данные

Route::any ('feedback', function () { // обработает запросы любого вида
    return 'feedback'; 
})->middleware('throttle:test'); // прописываем правило ограничения


//получение параметров url 
Route::get('/post/{parametr1}/{parametr2}', function ($id_1,$id_2) { 
    echo $id_1." - Выводит первый параметр<br>";
    echo $id_2." - Выводит второй параметр<br>";
    return ; 
});

// Выводит Request параметр
Route::get('/user/{id}', function ($id, Request $request) { 
    echo $request->path()." - Выводит Request параметр<br>";
    return $id; 
// регулярное выражение в where ограничит вывод тольоко цифры  
//})-> where ('id', '[0-9]+'); 
// если параметров несколько то делаем массив
//})-> where (['id', '[0-9]+','comment', '[0-9]+']); 
// варант через готовую функцию только цифры
// })-> whereNumber ('id'); 
// варант через готовую функцию только строка
// })-> whereAlpha('id'); 
// варант через готовую функцию число и строка
})-> whereAlphaNumeric('id') ->name('user'); 
// Задание имен для маршрутов прописывем фукция name()



// Если нет параметра /user то {id?} и задается параметр по умолчанию $id = 1
Route::get('/user/{id?}', function ($id = 1) { 
    return "user: ". $id; 
});

// Создание груп маршрутов например группа manager
// Route::prefix ('manager')->group (function (){
//     Route::get('/', function () { 
//         return 'manager.index';  
//     });
//     Route::get('/users', function () { 
//         return 'manager.users';  
//     });
// });

// прописываем ограничение для группы
Route::group ([ 'prefix' => 'manager','middleware' => 'throttle:test'], function (){
    Route::get('/', function () { 
        return 'manager.index';  
    });
    Route::get('/users', function () { 
        return 'manager.users';  
    });
});

// Редирект с помощью маршрутизатора
Route::redirect ('/myuser/', '/user/');
Route::redirect ('/myuser/{id}', '/user/{id}');
//Вариант постоянного редиректа permanentredirect
// Route::permanentredirect ('/myuser/', '/user/');

// products 


// Route::match (['get','post'],'/products', function () { 

//     $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     $url = explode('?', $url);
//     $url = $url[0]; 
//     return $url ; 

// });


Route::get('/product/{id}/{comment}', function ($id_1,$id_2) { 

    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0]; 
    return $url ; 

});


// Route::prefix ('admin')->group (function (){

Route::group ([ 'prefix' => 'admin','middleware' => 'throttle:test'], function (){

    Route::match (['get','post'], '/', function () { 
        return 'admin.index';  
    });


    Route::match (['get','post'], '/auth', function () { 
        return 'admin.auth';  
    });

    Route::match (['get','post'], '/products', function () { 
        return 'admin.products';  
    });

    Route::match (['get','post'], '/clients', function () { 
        return 'admin.clients';  
    });

});



Route::get('/secretpage', function () {  
    return 'secretpage'; 
})->middleware('checklocalhost'); // прописываем правило ограничения

// в массиве указываем название контроллера и название функции
Route::get ('/home',[MainController::class, 'home']);
Route::get ('/map',[MainController::class, 'map']);

Route::get ('/message/{id}',[MainController::class, 'message']);

//  метод __invoke вызвается когда нет указания на конкретную функцию
Route::get ('/request',MainController::class);


Route::get ('/mypage',[MainController::class, 'mypage']);


Route::get ('/testview',[MainController::class, 'testView']);
