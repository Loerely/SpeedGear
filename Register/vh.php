<?php
    session_start();
    require_once 'connect.php';
    if(isset($_REQUEST['doGo'])){
        if(!$_REQUEST['email']){
            $error = 'Введите логин';
        }
        if(!$_REQUEST['psw']){
            $error = 'Введите пароль';
        }
    }
    if(!$error){
        $login = $_REQUEST['email'];
        $psw = $_REQUEST['psw'];
        if($result = mysqli_query($db, "SELECT `psw`, `id` FROM `users` WHERE `login` = '" . $login ."' ")){
            while($row = mysqli_fetch_assoc($result)){
                if($row['id']){
                    if($psw == $row['psw']){
                        header('Location: ../title.php');
                    }
                    else{
                        echo "<script>alert(\"Пароль не совпадает.\");</script>";
                    }
                }
                else{
                    echo "<script>alert(\"Вы не ввели логин.\");</script>";
                }
            }
        }
    }


    //сессия
define('ADMIN', 'admin' );
if ( ! empty( $_POST['email']))
{
    if( $_POST['email'] === ADMIN )
    {
    $_SESSION [ 'admin' ] = ADMIN ;
    }
    elseif($_POST['email'] != ADMIN)
    {
        $_SESSION [ 'admin' ] = $_POST['email'] ;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
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
        <form action="" method="post">
            <div class="container container1">
                <h1>Вход</h1>
                <p>Пожалуйста, введите данные в форму регистрации</p>

                <hr>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Введите Email" name="email" required>

                <label for="psw"><b>Пароль</b></label>
                <input type="password" placeholder="Введите пароль" name="psw" required>

                <hr>
                <input type="submit" value="Войти" name="doGo" class="registerbtn">
            </div>

            <div class="container container2 signin">
                <p>У вас нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>.</p>
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