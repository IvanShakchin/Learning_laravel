{{-- здесь создается основной шаблон --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>{{-- если title не будет указан то отобразиться 'Заголовок страницы' --}}
        <title>@yield('title', 'Заголовок страницы')</title>
</head>
<body>
    <div>Шапка сайта</div>
    <div>@importantmessage(своя директива)</div>
    <div>        
        @section('left'){{-- определяем блок меню --}}
        <div>Основное меню</div>        
        @show{{-- директива отображения блока   --}}
    </div>  
    <div>
        @yield('content')
    </div>
    <div>Подвал</div>     
</body>
</html>