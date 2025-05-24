<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Загрузка файла</title>
        <style>
        </style>
    </head>
    <body>
        @if($image_url)
            <h2>Загруженное изображение</h2>
                <p>
                    <img src="{{ $image_url }}" alt="" />
                </p>


        @endif
        {{-- url()->current() - отправка формы на эту же страницу --}}
        <form name='myform' action='{{ url()->current() }}' method='post' enctype="multipart/form-data">
          @csrf
          @error('image')
            <span> {{ $message }}  </span>  
            <br/>           
          @enderror
          <input type='file' name='image' />
          <br/>
          <input type='submit' name='submit' value='Отправить' />                  
        </form>
    </body>
</html>
