<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Навигация по страницам</title>

    </head>
    <body>
        <h1>Комментарий (Страница {{ $comments->currentPage() }})</h1>
        @foreach ($comments as $comment)
            <div>
                <p><b>{{ $comment->name }}:</b> {{ $comment->text }} </p>      
            </div>
        @endforeach
        {{-- {{ $comments->links()  }} --}}
        {{ $comments->links('vendor.pagination.simple-bootstrap-5')  }}
    </body>
</html>
