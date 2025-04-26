<?php




$host = 'MySQL-8.0';

$dbname = 'laravel';

$username = 'root';

$password = '';



try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo ("Соединение с базой произошло $host = 'MySQL-8.0';");

} catch (PDOException $e) {

    echo ("НЕТ  Соединение с базой  ");

    die("Connection failed: " . $e->getMessage());


}
