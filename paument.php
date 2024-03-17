<?php
session_start();
include('include/db_connect.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <title>Оформление заказа</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <!--MAIN-->
    <main>
        <section class="main-catalog">
            <div class="container">
                <!--Навигация по страницам сайта-->
                <div class="main-promotion_title_nav">
                    <nav>
                        <ol>
                            <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                            <li class="main-promotion_title_nav_link ml-30px"><a href="catalog.php">Каталог игр</a></li>
                            <li class="main-promotion_title_nav_link ml-30px"><a href="basket.php">Корзина</a></li>
                            <li class="main-promotion_title_nav_link ml-30px"><a
                                    href="promotion.php">Регистрация/Авторизация</a>
                            </li>
                            <li class="main-promotion_title_nav_link ml-30px">Оформление заказа</li>
                        </ol>
                    </nav>
                </div>
                <h3 class="paument-title">Если у вас возникли сложности с оформлением заказа — будем рады принять его по
                    телефону 8 (900) 500-00-01</h3>
                <div class="main-promotion_title">
                    <h1>Оформление заказа:</h1>
                </div>
                <div class="paument-block">
                    <div class="paument-block_left">
                        <!--Форма-->
                        <?php
                $id=$_GET['id']; // Получаем id каждого товара
                $sql="SELECT * FROM `registration` WHERE id = $id";              
                $res=$mysqli->query($sql);
                if ($res->num_rows > 0) 
                    $resArticle = $res->fetch_assoc();
                ?>
                        <div class="paument-block_left-form">
                            <div class="flex mb-48px">
                                <div class="mb-16px">
                                    <label class="paument-label" for="surname"
                                        style="display: block; margin-bottom: 10px;">Фамилия</label>
                                    <input class="form-paument" name="surname" type="text" id="surname"
                                        placeholder="Иванов" required value="<?= $resArticle['surname'] ?>">
                                </div>
                                <div>
                                    <label class="paument-label" for="name"
                                        style="display: block; margin-bottom: 10px;">Имя</label>
                                    <input class="form-paument" name="user_name" type="text" id="user_name"
                                        placeholder="Иван" required value="<?= $resArticle['name'] ?>">
                                </div>
                                <div>
                                    <label class="paument-label" for="lastname"
                                        style="display: block; margin-bottom: 10px;">Отчество</label>
                                    <input class="form-paument" name="lastname" type="text" id="lastname"
                                        placeholder="Иванович" required value="<?= $resArticle['lastname'] ?>">
                                </div>
                                <div class="mb-16px">
                                    <label class="paument-label" for="tel"
                                        style="display: block; margin-bottom: 10px;">Номер телефона</label>
                                    <input class="form-paument" name="tel" type="tel" id="tel" placeholder="+7 "
                                        required value="<?= $resArticle['phone'] ?>">
                                </div>
                                <div>
                                    <label class="paument-label" for="email"
                                        style="display: block; margin-bottom: 10px;">E-mail*</label>
                                    <input class="form-paument" name="email" type="email" id="email"
                                        placeholder="Адрес эл. почты для чека" required
                                        value="<?= $resArticle['email'] ?>">
                                </div>

                            </div>
                        </div>

                        <form class="qty-input" enctype="multipart/form-data" action="include/paument.php"
                            method="POST">
                            <div class="paument-block_left-form">
                                <div class="flex mb-48px">
                                    <div class="mb-16px">
                                        <label class="paument-label" for="address"
                                            style="display: block; margin-bottom: 10px;">Адрес доставки</label>
                                        <input class="form-paument" name="address" type="text" id="address"
                                            placeholder="Город, улица, дом, корпус, квартира" required
                                            value="<?php echo $_SESSION['address'] ?>">
                                    </div>
                                    <div>
                                        <label class="paument-label" for="country"
                                            style="display: block; margin-bottom: 10px;">Страна</label>
                                        <input class="form-paument" name="country" type="text" id="country"
                                            placeholder="Pocсия" required value="<?php echo $_SESSION['country'] ?>">
                                    </div>
                                    <div>
                                        <label class="paument-label" for="postcode"
                                            style="display: block; margin-bottom: 10px;">Почтовый индекс</label>
                                        <input class="form-paument" name="postcode" type="text" id="postcode"
                                            placeholder="160000" required value="<?php echo $_SESSION['postcode'] ?>">
                                    </div>
                                    <div>
                                        <label class="paument-label" for="data"
                                            style="display: block; margin-bottom: 10px;">Дата оформления заказа</label>
                                        <input class="form-paument" name="data" type="date" id="data" required
                                            value="<?php echo $_SESSION['data'] ?>">
                                    </div>
                                </div>
                            </div>
                            <!--Доставка-->
                            <div class="delivery">
                                <h2>Доставка</h2>

                                <div style="font-size: 20px;">
                                    <input name="delivery" type="radio" value="post_office">
                                    Почта России до отделения
                                    <span>(350) ₽</span>
                                </div>

                                <div style="font-size: 20px;">
                                    <input name="delivery" type="radio" value="sdek"> СДЭК до
                                    двери/склада
                                    <span>(450) ₽</span>
                                </div>

                                <div style="font-size: 20px;">
                                    <input name="delivery" type="radio" value="courier" checked> Курьером
                                    <span>(650) ₽</span>
                                </div>
                            </div>
                            <!--Способ оплаты-->
                            <div class="goods mb-20px">
                                <h2>Способ оплаты</h2>
                                <div class="goods_payment-method mb-16px">
                                    <input name="payment" type="radio" value="Картой на сайте">
                                    <p style="font-size: 20px;">Картой на сайте</p>
                                </div>
                                <div class="goods_payment-method">
                                    <input name="payment" type="radio" value="Наличная/безналичная оплата получении">
                                    <p style="font-size: 20px;">Наличная/безналичная оплата при получении
                                    </p>
                                </div>
                                <img src=" css/image/payment.png" alt="payment">
                            </div>
                            <input type="hidden" name="registration_id" value="<?= $resArticle['id'] ?>">
                            <button class="btn-choose_game" type="submit">Далее</button>
                        </form>
                        <p class="paument-block_left_text">Нажимая «Далее», вы соглашаетесь с
                            условиями
                            использования онлайн-магазина “ПчелкаШоп”. С подробными условиями доставки можно
                            ознакомиться на странице о доставке
                        </p>

                    </div>

                </div>
            </div>
        </section>
    </main>
    <!--FOOTER-->
    <?php
    include('include/footer.php');
    ?>
</body>

</html>