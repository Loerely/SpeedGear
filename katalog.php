<?php
require_once 'Register/connect.php';
session_start(); // открываем сессию
define('ADMIN', 'admin' );

if(isset($_GET['exit']))
{
    session_destroy();
    header('Location: title.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedGear</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleKatalog.css">
</head>
<body>
    <!--Шапка сайта-->
    <div class="header">
        <div class="logo_menu">
        <div><a href=""><img src="img/menu.png" alt=""></a></div>
        <a class="logo" href="title.php"><p class="logo">SpeedGear</p></a>
        </div>

        <div class="header_div">
            <div class="inf_header">
                <p id="number">+7 960 607-43-21</p>
                <p>Круглосуточно</p>
            </div>


            <div class="but_header1">
                <div><a href=""><img src="img/star.png" alt=""></a></div>
                <div><a href=""><img src="img/compare1.png" alt=""></a></div>
                <div><a href=""><img src="img/shopping-cart.png" alt=""></a></div>
            </div>


            <div class="but_header2">
                <div><a href=""><img src="img/search (1).png" alt=""></a></div>
                <div><input type="button" class="but_reg" onmousedown="vievDiv()"></div>
            </div>
        </div>
    </div>

    <!--Тело сайта-->
    <div class="body">


        <!--Диалоговое окно для входа-->
        <div class="for_dialog">
            <dialog id="dialog1" class="dialog">
            <?if ( !isset ($_SESSION[ 'admin' ])) {?>
                <p>Вы еще не вошли в аккаунт</p>
                <input type="button" value="Войти" onclick="goVh()">
            <?}
            elseif(isset ($_SESSION[ 'admin' ]) && $_SESSION['admin'] === ADMIN){?>
                <p>Добро пожаловать, <?=$_SESSION[ 'admin' ]?></p>
                <input type="button" value="изменить" onclick="vievDiv2()">
                <a href="?exit">Выйти</a>
                <?}
            elseif(isset ($_SESSION[ 'admin' ]) && $_SESSION['admin'] != ADMIN){?>
                <p>Добро пожаловать, <?=$_SESSION[ 'admin' ]?></p>
                <a href="?exit">Выйти</a>
                <?}
            ?>
            </dialog> 
            <!--Диалоговое окно для поправок-->
            <dialog id="dialog2">
                <form method="post">
                    <?
                        if(isset($_REQUEST['pluse'])){
                            $name = $_REQUEST['name'];
                            $price = $_REQUEST['price'];
                            $image = $_REQUEST['image'];
                            mysqli_query($db, "INSERT INTO `cart_item` (`name`, `price`, `image`) 
                            VALUES('" . $name ."', '" . $price ."', '" . $image ."')");
                            echo "<script>alert(\"Добавление товара успешно.\");</script>";
                        }?>
                    <p>Название товара</p>
                    <input type="text" name="name">
                    <p>Цена товара</p>
                    <input type="text" name="price">
                    <p>Путь к фото(из папки img/tov)</p>
                    <input type="text" name="image">
                    <input type="submit" value="добавить" name="pluse">
                    <!--INSERT INTO `cart_item` (`id`, `name`, `price`, `image`) VALUES (NULL, '1', '1', NULL);-->
                </form>
            </dialog>
        </div>


         <!--Каталог-->
        <?
            $query = "SELECT * FROM cart_item";
            $result = mysqli_query($db, $query);
        ?>
        <form class="form" action="id?= <?=$row['id']?>" method="get">
        <?
            while($row = mysqli_fetch_array($result)){?>
                <div class="div_tov">
                    <div class="for_img"><img class="img" src="<?=$row['image']?>" alt="не вышло"></div>
                    <p class="p_price"><?=$row['price']?></p>
                    <p class="p_name"><?=$row['name']?></p>
                    <div class="for_button">
                        <a href=""><input type="button" value="подробнее" onclick="ClickBut"></a>
                        <a href=""><input type="button" value="В корзину" onclick="ClickBut"></a>
                    </div>
                </div>
            <?
            }
        ?>
    </form>
    </div>

<!--Подвал сайта-->
<div class="bottom">
    <div class="inf">
        <p class="logo">SpeedGear</p>
        <p class="p">Самый удобный в Москве <br> магазин спортивных товаров</p>
    </div>
    <div class="social">
        <img src="img/001-facebook.png" alt="">
        <img src="img/002-twitter.png" alt="">
        <img src="img/003-vk.png" alt="">
        <img src="img/004-youtube.png" alt="">
        <img src="img/005-instagram.png" alt="">
    </div>
    <div class="inf_bottom">
        <div class="sw">
            <p>+7 960 607-43-21</p>
            <p>г. Москва, ул Ленина, дом 2</p>
        </div>
        <div class="opl">
            <img src="img/visa.png" alt="">
            <img src="img/mastercard.png" alt="">
            <img src="img/robokassa-1 (3).png" alt="">
        </div>
    </div>
</div>
<script src="js/script_admin.js"></script>
</body>
</html>
