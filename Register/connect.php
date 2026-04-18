<?php
$server = 'localhost';
$pass = '';
$user = 'root';
$bd = 'authorization';

$db = mysqli_connect($server, $user, $pass, $bd);
if (mysqli_connect_errno()) {
    echo 'Не удается подключиться к бд';
    exit();
}
?>