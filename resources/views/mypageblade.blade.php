<!DOCTYPE html>
<head>
<title>Мой сайт</title>
</head>
<body>
<header>
<p>global_var: {{ $global_var }}</p>
<p>basket_quantity: {{ $basket_quantity }}</p>
<p>basket_amount: {{ $basket_amount }}</p>

<p>В вашей корзине {{ $basket_quantity }} тов. на общую сумму {{$basket_amount }} руб.</p>
</header>
</body>
</html>