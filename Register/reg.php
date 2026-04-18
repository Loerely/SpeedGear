<?php
require_once 'connect.php';
if(isset($_REQUEST['doGo'])){
    if(!$_REQUEST['email']){
        $error = 'Введите логин';
    }
    if(!$_REQUEST['psw']){
        $error = 'Введите пароль';
    }
    if(!$_REQUEST['psw-repeat']){
        $error = 'Введите пароль';
    }
    if($_REQUEST['psw-repeat'] !== $_REQUEST['psw']){
        $error = 'Введите пароль';
    }   
    if(!$error && $_REQUEST['email'] != 'admin'){
        $login = $_REQUEST['email'];
        $psw = $_REQUEST['psw'];
        mysqli_query($db, "INSERT INTO `users` (`login`, `psw`) 
        VALUES('" . $login ."', '" . $psw ."')");
        echo "<script>alert(\"Регистрация успешна.\");</script>";
    }
    elseif($_REQUEST['email'] != 'admin'){
        echo "<script>alert(\". $error .\");</script>";
    }
    if($_REQUEST['email'] === 'admin'){
        echo "<script>alert(\"Вы не можете взять логин admin.\");</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy Star</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../reg_vh1.css">
</head>
<body>
    <!--Шапка сайта-->
    <div class="header">
        <div class="logo_menu">
        <div><a href=""><img src="../img/menu.png" alt=""></a></div>
        <p class="logo">SpeedGear</p>
        </div>

        <div class="header_div">
            <div class="inf_header">
                <p id="number">+7 960 607-43-21</p>
                <p>Круглосуточно</p>
            </div>


            <div class="but_header1">
                <div><a href=""><img src="../img/star.png" alt=""></a></div>
                <div><a href=""><img src="../img/compare1.png" alt=""></a></div>
                <div><a href=""><img src="../img/shopping-cart.png" alt=""></a></div>
            </div>


            <div class="but_header2">
                <div><a href=""><img src="../img/search (1).png" alt=""></a></div>
                <div><a href="../Register/vh.php"><img src="../img/Group.png" alt=""></a></div>
            </div>
        </div>
    </div>


    <!--Тело сайта-->
    <div class="body">
        <form method="post">
            <div class="container1">
                <h1>Регистрация</h1>
                <p>Пожалуйста, введите данные в форму регистрации</p>

                <hr>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Введите Email" name="email" required>

                <label for="psw"><b>Пароль</b></label>
                <input type="password" placeholder="Введите пароль" name="psw" required>

                <label for="psw-repeat"><b>Повторите пароль</b></label>
                <input type="password" placeholder="Повторите пароль" name="psw-repeat" required>

                <hr>
                <input type="submit" value="Зарегитророваться" name="doGo" class="registerbtn">
            </div>

            <div class="container2 signin">
                <p>Уже есть аккаунт? <a href="vh.php">Войти</a>.</p>
            </div>
        </form>
    </div>

    <!--Подвал сайта-->
    <div class="bottom">
        <div class="inf">
            <p class="logo">SpeedGear</p>
            <p class="p">Самый удобный в Москве <br> магазин спортивных товаров</p>
        </div>
        <div class="social">
            <img src="../img/001-facebook.png" alt="">
            <img src="../img/002-twitter.png" alt="">
            <img src="../img/003-vk.png" alt="">
            <img src="../img/004-youtube.png" alt="">
            <img src="../img/005-instagram.png" alt="">
        </div>
        <div class="inf_bottom">
            <div class="sw">
                <p>+7 960 607-43-21</p>
                <p>г. Москва, ул Ленина, дом 2</p>
            </div>
            <div class="opl">
                <img src="../img/visa.png" alt="">
                <img src="../img/mastercard.png" alt="">
                <img src="../img/robokassa-1 (3).png" alt="">
            </div>
        </div>
    </div>
</body>
</html>