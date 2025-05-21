<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>testForm</title>
        <style>
        </style>
    </head>
    <body>
        @if ($errors->any())
            <h3>Ошибки при заполнении формы:</h3>
            @foreach ($errors->all() as $message)
                <span>{{ $message }}</span>
                <br/>                
            @endforeach
        @endif
        <h2>Заполните форму</h2>
        {{-- <form name='myform' action='/testform/send' method='post'> --}}
        <form name='myform' action='/testform/sendbyrequest' method='post'>
            {{-- можно отравлять формы разными методами  --}}
            {{-- @method('PUT') --}}
            {{-- @method('PATCH') --}}
            {{-- @method('DELETE') --}}

            {{-- обязательно прописываем csrf токен --}}
            @csrf

            <label for='name'>Ваше имя:</label>
            <input type='text' name='name' id='name' value='{{ old('name') }}'/>
            {{-- пример вывода конкретного сообщения об ошибке --}}
            @error('name')
                <span>{{ $message }}</span>
            @enderror
            </br>
            <label for='name'>Ваше сообщение:</label>
            </br>
            <textarea id='text' name='text'>{{ old('text') }}</textarea>
            @error('text')
            <span>{{ $message }}</span>
            @enderror
            </br>
            <label for='name'>Ваша дата рождения:</label>
            <input type='date' name='bd' id='bd' value='{{ old('bd') }}'/>
            </br></br>
            <input type='submit' value='Отправить' />            
        </form>

    </body>
</html>
