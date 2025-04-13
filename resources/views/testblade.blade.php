<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <p>a: {{ $a }}</p>
        
        {{-- комментарий в нутри {{ тут тире }} не отображается в коде --}}

        {{-- По умолчанию Laravel все html теги переводит в html сущности  --}}
        <p>b: {{ $b}} </p>
        {{-- Отключить это можно !! знаками --}}
        <p>b: {!! $b !!}</p>

        {{-- @ - отключает обработку {{  }} bleidom --}}
        <p>@{{ a }}</p>

        {{-- создание блока php --}}
        @php
            $x = 'Переменная x';
            echo $x;  
            $z = 'Переменная z из блока кода в блейде';        
        @endphp
        <p> {{ $z }} </p>

        {{-- использование блока if --}}
        @if (is_numeric($a))
            <p>a - это число</p>
        @elseif (is_string($a))
            <p>a - это строка</p>
        @else
            <p>a - это другой тип</p>
        @endif
    
        {{-- вариант @isset короткий от @if (isset($b)) --}}
        @isset($b)
            <p>b - существует</p>
        @endisset
        
        {{-- использование цикла --}}
        @for ($i=0; $i<5; $i++)

            {{-- деректива в нутри дерективы --}}
            @if ($i == 3 )Три 
                @else {{ $i }}
            @endif

        @endfor

        <p></p>

        {{-- цикл foreach  --}}
        @foreach (['один', 'два', 'десеть', 'конец цикла'] as $n )
        
        {{-- номер итерации $loop->iteration --}}
        {{ $loop->iteration }} - {{  $n }}

        {{-- конец цикла $loop->last --}}
        @if ($loop->last)  - Отработал $loop->last
        @endif
            
        @endforeach

        {{-- подключение другого шаблона с передачей данных --}}
        @include('child', ['data'=>"Передали в child из testblade"])
        
         {{-- подключение другого шаблона с условием  --}}
         @includewhen($c==3,'child', ['data'=>"c == 3"])
         {{-- есть вариант если условие ложное @includeUnless(, ) --}}

         {{-- преобразование объекта в Json строку3 --}} 
         @php
         $arr = ['один', 'два', 'десеть', 'конец цикла'];
         @endphp         
        <script>
            let x = {{ Js::from ($arr) }};
            alert (x);
        </script>

        {{-- Функции laravel также доступны --}}
        <p>Env: {{ env('APP_NAME') }}</p>     
    </body>
</html>
