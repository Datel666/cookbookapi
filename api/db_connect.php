<?php
$host = 'localhost';
$database = 'cookbookdb';
$user = 'root';
$password = 'root';

$bd = mysqli_connect($host, $user, $password, $database)
or die("Ошибка подключения".mysqli_error($bd));


?>
 