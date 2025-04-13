{{-- <p> {{ $attributes['message'] }}</p> --}}

{{-- {{ $attributes['value_name'] }}

{{ $attributes['value_email'] }} --}}


<form id="feedbackForm">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name"  value="{{ $attributes['value_name'] }}">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"  value="{{ $attributes['value_email'] }}">
    <button type="submit">Отправить</button>
</form>