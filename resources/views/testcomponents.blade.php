<!DOCTYPE html>
<head>
<title>Test Components</title>
</head>
<body>
   {{-- если переменная иммет input то обязательно тире --}}
    <x-my-input input-type="text" value="Значение" />
{{-- если компонент лежит в дополнительной папке напрмер forms
то вызваем его так --}}
{{-- <x-forms.my-input input-type="text" value="Значение" /> --}}
<x-my-input input-type="text" value="{{ $a }}" />

<x-my-input input-type="text" placeholder="default" />

<x-error-simple message="Какаято ошибка" />

<x-test-forma value_name="Тут пишем имя"  value_email="Тут почту"  />

{{-- парный тег для компонента со слотами --}}
<x-error-message>

    {{-- парный тег для слотов --}}
    {{-- можно передавать параметы например класс --}}
    <x-slot name="header" class="my-class">
      Ошибка!
    </x-slot>   

    <i>Вот такая ошибка вышла</i>
</x-error-message>

</body>
</html>