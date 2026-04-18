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
        <div><a href=""><img src="img/menu.png" alt=""></div></a>
        <p class="logo">SpeedGear</p>
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
                <div><a href="#bl3"><img src="img/search (1).png" alt=""></a></div>
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
        





        <!--Блок 1-->
        <div class="bl1">
            <p class="zag">Двигайся к мечте </p>
            <p class="zag2"> вместе со SpeedGear</p>
        </div>
        <div class="inf_bl1">
            <div>
                <img src="img/005-list.png" alt="">
                <p>Огромный выбор товаров</p>
            </div>
            <div>
                <img src="img/001-time.png" alt="">
                <p>Быстрое оформление заказа</p>
            </div>
            <div>
                <img src="img/002-product.png" alt="">
                <p>Можно забрать заказ в пунктах выдачи</p>
            </div>
            <div>
                <img src="img/004-placeholder.png" alt="">
                <p>Доставка в любой город России</p>
            </div>
            <div>
                <img src="img/003-commerce-and-shopping.png" alt="">
                <p>Оплата ппри получении</p>
            </div>
        </div>

        <!--Блок 2-->
        <div class="bl2">
            <p class="logo">Популярные товары</p>
                <div class="container_slider">
                    <div class="slider">
                        <dir>
                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/box.jpg" alt="">
                                    <p>Перчатки боксерские Hukk Train</p>
                                </div>
                                <p class="zen">7 990 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/l2.jpg" alt="">
                                    <p>Комплект лыжный женский Nordway Bliss + NNN</p>
                                </div>
                                <p class="zen">7 600 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/l1.jpg" alt="">
                                    <p>Беговые лыжи Madshus Activesonic Combi</p>
                                </div>
                                <p class="zen"> 9 990 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>
                        </dir>

                        <dir>
                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/ball.jpg" alt="">
                                    <p>Мяч футбольный Demix Hybrid IMS</p>
                                </div>
                                <p class="zen">2 900 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/snov_girl.jpg" alt="">
                                    <p>Сноуборд женский Head Anything SMU</p>
                                </div>
                                <p class="zen">39 990 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/snov1.jpg" alt="">
                                    <p>Сноуборд Head Anything LYT</p>
                                </div>
                                <p class="zen">27 990 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>
                        </dir>

                        <dir>
                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/mask.jpg" alt="">
                                    <p>Маска детская Glissade Skip</p>
                                </div>
                                <p class="zen">1 990 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/krep.jpg" alt="">
                                    <p>Крепления горнолыжные Marker MARKER ALPINIST</p>
                                </div>
                                <p class="zen">29 000 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide_img_txt">
                                    <img src="img/tov/kon.jpg" alt="">
                                    <p>Коньки фигурные Graf Ace Special</p>
                                </div>
                                <p class="zen">12 900 ₽</p>
                                <div class="but">
                                    <button class="more">Подробнее</button>
                                    <button class="buy">В корзину</button>
                                </div>
                            </div>
                        </dir>
                        
                    </div>
                <button class="prev_but">&lt</button>
                <button class="next_but">&gt</button>
                </div>
        </div>



        <!--Блок 3-->
        <div class="bl3" id="bl3">
            <div>
                <p class="h1">Нужно что-то конкретное?</p>
                <p class="p">Магазин SpeedGear является официальным поставщиком различных фирм в Москве и служит для вашего удобства. Перейдите в каталог для более точного ознакомления с товарами</p>
            </div>
            <a href="katalog.php"><button>Каталог</button></a>
        </div>

        <!--Блок 4-->
        <div class="bl4">
            <dir>
                <div class="content1">
                    <p class="test1">Товары для <br> футбола</p>
                    <p class="test2">Форма, бутсы, футбольные мячи, гольфы</p>
                    <a href="katalog.php"><button class="button1">Каталог</button></a>
                </div>
                <div class="content2">
                    <p class="test1">Волейбольные <br> товары</p>
                    <p class="test2">Форма, сетки, волейбольные мячи, кроссовки</p>
                    <a href="katalog.php"><button class="button1">Каталог</button></a>
                </div>
            </dir>
            <div class="content3">
                <p class="h1">Мячи и клюшки для гольфа</p>
                <p class="p">Драйверы, вуды, айроны, паттеры, игровые и различные тренировочные мячи, дорожки для минигольфа, маты, сетки, лунки и прочее</p>
                <a href="katalog.php"><button class="button2">Каталог</button></a>
            </div>
        </div>
    </div>


    <!--Блок 5-->
    <div class="bl5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d630.554221637968!2d37.6312160454141!3d55.72306118626505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1703085832619!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="inf">
            <div>
                <p class="logo">Контакты</p>
                <p class="p">+7 960 607-43-21</p>
                <p class="p">+7 901 921-32-11</p>
            </div>
            <div>
                <p class="logo">Наш адрес</p>
                <p class="p">Москва, ул маломосковская д 12</p>
                <p class="p">Москва, 1-й Щипковский пер., 11/13</p>
            </div>
        </div>
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


    <!--Скрипт-->
    <script src="js/script.js"></script>
    <script src="js/script_admin.js"></script>
</body>
</html>