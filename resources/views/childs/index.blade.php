{{-- здесь будем наследовать из extendsview.blade.php --}}
@extends('extendsview')
{{-- в дериктиве section прописцваем данные title --}}
@section('title','Главная страница')

@section('left')
@parent {{-- отображает <div>Основное меню</div> из extendsview --}}
    <div>Различные банеры</div>{{-- заменят <div>Основное меню</div> из extendsview  --}}
@endsection


@section('content')
    <p>Основное содержимое страницы</p>
@endsection
