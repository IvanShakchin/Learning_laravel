{{-- макет для всех страниц сайта --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>{{-- если title не будет указан то отобразиться 'Заголовок страницы' --}}
        <title>{{ $title ?? 'Заголовок страницы' }}</title>
</head>
<body>
    <div>Шапка сайта</div>
    <div>        
        <div>Основное меню</div>        
        {{ $left }}
    </div>  
    <div>{{ $content }}</div>
    <div>Подвал</div>     
</body>
</html>