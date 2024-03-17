<?php
session_start();
include('include/db_connect.php');

if (isset($_SESSION['registration'])) {
    $id = $_SESSION['registration']['id'];
    // Здесь вы можете использовать переменную $id для выполнения дополнительных действий, связанных с пользователем
} else {
    header('location: login.php'); // Если пользователь не авторизован, перенаправляем его на страницу входа
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <title>Личный кабинет</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <!--Main-->
    <main>
        <section class="main-catalog">
            <div class="container">
                <!--Навигация по страницам сайта-->
                <div class="main-promotion_title_nav">
                    <nav>
                        <ol>
                            <li class="main-promotion_title_nav_link">
                                <a href="index.php">Главная</a>
                            </li>
                            <li class="main-promotion_title_nav_link ml-30px">
                                Личный кабинет
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="main-promotion_title">
                    <h1>Личный кабинет</h1>
                </div>

                <div class="personal_block">
                    <!--Левая часть блока-->
                    <div class="personal_block-left">
                        <h1>Настройки</h1>
                        <?php
                $id=$_GET['id']; // Получаем id каждого товара
                $sql="SELECT * FROM `registration` WHERE id = $id";              
                $res=$mysqli->query($sql);
                if ($res->num_rows > 0) 
                    $resArticle = $res->fetch_assoc();
                ?>
                        <div class="personal-data">
                            <!--Фотография клиента-->
                            <div class="personal-data_name mb-16px">
                                <h3>Фотография</h3>
                                <div class="mb-64px">
                                    <img class="personal-data_name_image" src="<?= $resArticle['image_user'] ?>"
                                        alt="фотография пользователя">
                                </div>
                                <button class="button-edit" disabled>Редактировать</button>
                            </div>
                            <!--Персональные данные-->
                            <div class="personal-data_name mb-16px">
                                <h3>Личные данные</h3>
                                <div class="mb-16px">
                                    <label class="paument-label" for="surname"
                                        style="display: block; margin-bottom: 10px">Фамилия</label>
                                    <input class="form-paument" type="text" id="surname" placeholder="Иванов"
                                        value="<?= $resArticle['surname'] ?>" required />
                                </div>
                                <div class="mb-16px">
                                    <label class="paument-label" for="name"
                                        style="display: block; margin-bottom: 10px">Имя</label>
                                    <input class="form-paument" type="text" id="name" placeholder="Иван"
                                        value="<?= $resArticle['name'] ?>" required />
                                </div>
                                <div class="mb-16px">
                                    <label class="paument-label" for="lastname"
                                        style="display: block; margin-bottom: 10px">Отчество</label>
                                    <input class="form-paument" type="text" id="lastname" placeholder="Иванович"
                                        value="<?= $resArticle['lastname'] ?>" required />
                                </div>
                                <div class="mb-16px">
                                    <label class="paument-label" for="tel"
                                        style="display: block; margin-bottom: 10px">Номер телефона</label>
                                    <input class="form-paument" type="tel" id="tel" placeholder="+7 - "
                                        value="<?= $resArticle['phone'] ?>" required />
                                </div>
                                <div class="mb-16px">
                                    <label class="paument-label" for="email"
                                        style="display: block; margin-bottom: 10px">E-mail</label>
                                    <input class="form-paument" type="email" id="email"
                                        placeholder="Адрес эл. почты для чека" value="<?= $resArticle['email'] ?>"
                                        required />
                                </div>
                                <div class="mb-16px">
                                    <label class="paument-label" for="login"
                                        style="display: block; margin-bottom: 10px">Логин</label>
                                    <input class="form-paument" type="login" id="login" placeholder="Логин"
                                        value="<?= $resArticle['login'] ?>" required />
                                </div>
                                <div class="mb-64px">
                                    <label class="paument-label" for="pass"
                                        style="display: block; margin-bottom: 10px">Пароль</label>
                                    <input class="form-paument" type="password" id="pass" placeholder="Пароль"
                                        value="<?= $resArticle['password'] ?>" required />
                                </div>

                                <button class="button-edit" disabled>Редактировать</button>
                            </div>

                            <!--Адрес доставки-->
                            <div class="personal-data_name mb-16px">
                                <h3>Адрес доставки</h3>
                                <div class="mb-16px">
                                    <label class="paument-label" for="country"
                                        style="display: block; margin-bottom: 10px">Страна</label>
                                    <input class="form-paument" type="text" id="country" placeholder="Pocсия"
                                        required />
                                </div>
                                <div class="mb-16px">
                                    <label class="paument-label" for="address"
                                        style="display: block; margin-bottom: 10px">Адрес доставки</label>
                                    <input class="form-paument" type="text" id="address"
                                        placeholder="Город, улица, дом, корпус, квартира" required />
                                </div>
                                <div class="mb-64px">
                                    <label class="paument-label" for="index"
                                        style="display: block; margin-bottom: 10px">Почтовый индекс</label>
                                    <input class="form-paument" type="text" id="index" placeholder="160000" required />
                                </div>
                                <button class="button-edit" disabled>Редактировать</button>
                            </div>

                        </div>
                    </div>

                    <!--Правая часть блока-->
                    <div class="personal_block-right">
                        <h1>Накопительная скидка</h1>
                        <div class="personal_block-right-top">
                            <!--Карточка с акциями-->
                            <div class="personal_block-right-top-card">
                                <div class="personal_block-right-top-card_img">
                                    <img src="css/image/fire.png" alt="fire" />
                                    <h2>Акция дня: скидка на все товары</h2>
                                    <div class="basket-card_right-bottom-discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                            </div>
                            <!--Карточка с тратами/уровнями-->
                            <div class="personal_block-right-top-card_right">
                                <?php
                                // Получение id клиента
                                $user_id = $_GET['id'];
                                // Запрос для получения общей стоимости всех товаров у клиента
                              $sql ="SELECT SUM(goods.total_price) AS total_price
                                        FROM `orders`
                                        INNER JOIN `goods` ON orders.goods_id = goods.id
                                        WHERE orders.user_id = $user_id";
                                        
                                        $result = $mysqli->query($sql);                                     
                                // Проверка наличия результатов
                                        if ($result->num_rows > 0) {
                                // Получение общей стоимости всех товаров
                                $row = $result->fetch_assoc();
                                $total_price = $row['total_price'];
                                // Вывод информации
                                echo '<div class="personal_block-right-top-card_right_1 mb-36px">';
                                echo '<h3>вы потратили:</h3>';
                                echo '<p><span>' . $total_price . '</span> РУБ.</p>';
                                echo '</div>';
                            }
                            ?>
                                <div class="personal_block-right-top-card_right_2">
                                    <h3>До следующего уровня:</h3>
                                    <p><span>7000</span> PУБ.</p>
                                </div>
                            </div>
                        </div>
                        <p class="personal_block-right_text">
                            При регистрации на нашем сайте вы получаете возможность
                            участвовать в накопительной программе. За каждые потраченные
                            2500 рублей вы получаете 1% скидки для последующих заказов.<br />Максимальный
                            размер накопительной скидки 15%. При оформлении новых заказов
                            скидка предоставляется автоматически.
                        </p>

                        <h1 class="personal_block-right_title">Выбранные товары:</h1>
                        <!--Отображение выбранных клиентом товаров-->
                        <div class="product-cards mb-64px">
                            <?php
                    $sql = "SELECT * FROM `basket`";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?>
                            <div class="product-cards_orders mb-16px">
                                <img src="<?= $resArticle['image'] ?>" alt="game" />
                                <div class="product-cards_orders-right">
                                    <h2>Игра
                                        “<?= $resArticle['name_game'] ?>”,<span> <?= $resArticle['age'] ?></span>
                                    </h2>
                                    <div class="product-cards_orders-right_bottom">
                                        <div>
                                            <p>Количество</p>
                                            <span><?= $resArticle['quantity_goods'] ?></span>
                                        </div>
                                        <div>
                                            <p>Артикул</p>
                                            <span><?= $resArticle['vendor_code'] ?></span>
                                        </div>
                                        <div>
                                            <p>Стоимость</p>
                                            <p><span><?= $resArticle['total_price'] ?></span>P</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>

                            <?php
                $id=$_GET['id']; // Получаем id 
                $sql="SELECT * FROM `registration` WHERE id = $id";              
                $res=$mysqli->query($sql);
                if ($res->num_rows > 0) 
                    $resArticle = $res->fetch_assoc();
                ?>
                            <a href="paument.php?id=<?= $resArticle['id'] ?>"
                                class="btn-add_to_basket hvr-float-shadow">
                                Перейти к оформлению
                            </a>
                        </div>
                        <!--История заказов клиента-->
                        <h1 class="personal_block-right_title">История заказов:</h1>
                        <!--Отображение ИСТОРИИ заказов клиента-->
                        <div class="product-cards">
                            <?php
                          $userId = $_GET['id'];
                          
                          //Делаем запрос на объединение таблиц:
                          
                          $sql = "SELECT registration.name, registration.surname, registration.lastname, registration.email, registration.phone, customer_orders.data, customer_orders.address, goods.name_game, goods.total_price, goods.image, goods.quantity_goods, status.status_orders, orders.id, orders.status_id
                          FROM `orders`
                          INNER JOIN `registration` ON orders.user_id = registration.id
                          INNER JOIN `customer_orders` ON orders.customer_orders_id = customer_orders.id
                          INNER JOIN `goods` ON orders.goods_id = goods.id
                          INNER JOIN `status` ON orders.status_id = status.id
                          WHERE registration.id = $userId";
                          
                          $res = $mysqli->query($sql);
                          if ($res->num_rows > 0) {
                            while ($resArticle = $res->fetch_assoc()) {
                                ?>
                            <div class="product-cards_orders">
                                <img src="<?= $resArticle['image'] ?>" alt="game" />
                                <div class="product-cards_orders-right">
                                    <h2>Игра “<?= $resArticle['name_game'] ?>”</h2>
                                    <div class="product-cards_orders-right_bottom">
                                        <div>
                                            <p>Количество</p>
                                            <span><?= $resArticle['quantity_goods'] ?></span>
                                        </div>
                                        <div>
                                            <p>Стоимость</p>
                                            <p><span><?= $resArticle['total_price'] ?> </span>P</p>
                                        </div>
                                        <div>
                                            <p>Дата оформления:</p>
                                            <p><?= $resArticle['data'] ?></p>
                                        </div>
                                    </div>
                                    <h2>Статус заказа: <span
                                            style="color: #db4e66;"><?= $resArticle['status_orders'] ?></span>
                                    </h2>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--FOOTER-->
    <?php
    include('include/footer.php');
    ?>

    <script src="js/index.js"></script>
</body>

</html>