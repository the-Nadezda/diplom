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
                    <div class="product-cards mb-64px">
                        <!--Правая часть блока-->
                        <div class="paument-block_right">
                            <h2>Выбранные товары:</h2>

                            <?php
    $id = $_GET['id']; // получаем id пользователя из таблицы `customer_orders`
    $sql = "SELECT * FROM `customer_orders` WHERE id = $id";
    $res = $mysqli->query($sql);
    if ($res->num_rows > 0) {
        $resArticle = $res->fetch_assoc();
    }
    ?>
                            <?php                 
    //Создадим SQL-запрос для выборки всех данных из таблицы `basket`:
    //$user_id = $id;
    $customer_orders_id = $id; // создаем новую переменную $user_id = $id (пользователя)
    $sql = "SELECT * FROM `basket`";
    $res = $mysqli -> query($sql);
    if($res -> num_rows > 0) {
    while($resArticle = $res -> fetch_assoc()) {
    ?>
                            <!--Внутри цикла добавляем SQL-запрос для вставки (копирования) данных в таблицу
        `goods` (товары)-->
                            <?php
    $sql_insert = "INSERT INTO `goods` (`image`, `name_game`, `age`,`quantity_goods`, `vendor_code`, `price`, `total_price`, `customer_orders_id`) VALUES ('" . $resArticle['image'] . "', '" . $resArticle['name_game'] . "', '" . $resArticle['age'] . "', '" . $resArticle['quantity_goods'] . "', '" . $resArticle['vendor_code'] . "', '" . $resArticle['price'] . "', '" . $resArticle['total_price'] . "', '$customer_orders_id')";
    if ($mysqli->query($sql_insert) === TRUE) {
        echo "";
    } else {
        echo "Ошибка при копировании данных: " . $mysqli->error;
    }    
                       
 // Очистка таблицы "basket" (после копирования всех значений в `goods`)  
   $sql_delete = "DELETE FROM `basket`";
   if ($mysqli->query($sql_delete) === true) {
// Успешная очистка таблицы
  echo "";
 } else {
// Ошибка при очистке таблицы
 echo "Ошибка при удалении данных: " . $mysqli->error;
 }                        
 ?>
                            <?php }} ?>

                            <?php  

                        $id = $_GET['id'];                   
                        $sql = "SELECT * FROM `goods` WHERE customer_orders_id = $id";
                        $res = $mysqli -> query($sql);
                        if($res -> num_rows > 0) {
                        while($resArticle = $res -> fetch_assoc()) {
                        ?>
                            <div class="paument-block_right_card">
                                <img src="<?= $resArticle['image'] ?>" alt="фото квеста" />
                                <div class="paument-block_right_card-title">
                                    <h3>
                                        “<?= $resArticle['name_game'] ?>,
                                        <span><?= $resArticle['age'] ?></span>
                                    </h3>
                                    <p>Артикул товара: <span><?= $resArticle['vendor_code'] ?></span></p>
                                    <p>Количество товара:<span style="color: #db4e66;">
                                            <?= $resArticle['quantity_goods'] ?></span>
                                        (шт.)
                                    </p>
                                    <p>Стоимость: <span style="color: #db4e66;"><?= $resArticle['total_price'] ?></span>
                                        руб.</p>
                                </div>
                                <!--Удаление карточки товара на стадии оформления заказа-->
                                <form enctype="multipart/form-data" action="include/delete_goods.php" method="get">
                                    <input type="hidden" name="id" value="<?= $resArticle['id'] ?>">
                                    <input type="hidden" name="customer_orders_id"
                                        value="<?= $resArticle['customer_orders_id'] ?>">
                                    <button style="font-size: 18px;">Удалить товар</button>
                                </form>
                            </div>
                            <?php }} ?>
                        </div>

                        <?php
                        $id = $_GET['id']; // получаем id каждого товара

                        // Запрос для объединения таблиц и выборки данных о заказе и связанных с ним товарами
                        $sql = "SELECT customer_orders.id AS order_id, customer_orders.registration_id, goods.id AS
                        goods_id, goods.image, goods.name_game, goods.age, goods.vendor_code, goods.quantity_goods,
                        goods.total_price, goods.price
                        FROM customer_orders
                        INNER JOIN goods ON customer_orders.id = goods.customer_orders_id
                        WHERE customer_orders.id = $id";

                        $res = $mysqli->query($sql);
                        if ($res->num_rows > 0) {
                        $orderData = $res->fetch_assoc();
                        ?>

                        <form enctype="multipart/form-data" action="include/orders.php" method="post">
                            <!-- вывод данных о заказе -->
                            <input type="hidden" name="order_id" value="<?= $orderData['order_id'] ?>">
                            <input type="hidden" name="user_id" value="<?= $orderData['registration_id'] ?>">
                            <!-- вывод данных о товарах -->
                            <input type="hidden" name="goods_id" value=" <?= $orderData['goods_id'] ?>">

                            <?php
                            $res->data_seek(0); 
                            // перемещаем указатель результата на начало
                            while ($resArticle = $res->fetch_assoc()) {
                                ?>
                            <input class="input_goods_id" type="checkbox" name="goods_id[]"
                                value="<?= $resArticle['goods_id'] ?>">
                            <?php } ?>Нажимая «Оформить», Вы даете согласие на обработку персональных данных.
                            <button class="btn-choose_game" type="submit">Оформить</button>

                        </form>
                        <?php
} else {
    // Вывод сообщения о возможной ошибке, если заказ не найден
    echo "Заказ не найден";
}
                        ?>
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