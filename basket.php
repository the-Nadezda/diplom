<?php
session_start();
include('include/db_connect.php');

// Проверяем, существует ли уже переменная с количеством товаров в корзине, если нет, то инициализируем её
if (!isset($_SESSION['cart_count'])) {
    $_SESSION['cart_count'] = 0;
}

// Проверяем, была ли отправлена форма добавления товара в корзину
if (isset($_POST['add_to_basket'])) {
    // Увеличиваем счетчик товаров в корзине на 1
    $_SESSION['cart_count']++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Корзина </title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <main>
        <div class="container">
            <!--Навигация по страницам сайта-->
            <div class="main-promotion_title_nav padding-top">
                <nav>
                    <ol>
                        <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                        <li class="main-promotion_title_nav_link ml-30px"><a href="catalog.php">Каталог игр</a></li>
                        <li class="main-promotion_title_nav_link ml-30px">Корзина</li>
                    </ol>
                </nav>
            </div>
            <?php
               // Выводим количество товаров, которые находятся в корзине:
               $sql = "SELECT SUM(quantity_goods) AS quantity_goods_sum FROM `basket`;";
               $res = $mysqli -> query($sql);
               if($res -> num_rows > 0) {
               while($resArticle = $res -> fetch_assoc()) {
               ?>
            <h1 class="basket-title">Товаров в корзине:
                <span><?= $resArticle['quantity_goods_sum'] ?> шт.</span>
            </h1>
            <?php }} ?>
            <div class="basket-card">
                <div class="basket-card_reviews">
                    <!--Левая часть-->
                    <!--Делаем запрос к БД, чтобы карточки товаров выводились из таблицы `basket`уже с новой ценой (total_price)-->
                    <?php
                    $sql = "SELECT *, price * quantity_goods as total_price FROM `basket`";
                    $res = $mysqli->query($sql);
    
                    if ($res->num_rows > 0) {
                        while ($resArticle = $res->fetch_assoc()) {
            // Вычисляем 'total_price' и сохраняем его в переменной (изначальная цена * на количество)
                        $total_price = $resArticle['price'] * $resArticle['quantity_goods'];
            
            // Обновляем столбец 'total_price' в таблице корзины `basket`
                        $update_query = "UPDATE `basket` SET total_price = $total_price WHERE game_id = {$resArticle['game_id']}";
                        $mysqli->query($update_query);
                    ?>
                    <!--карточка товара в корзине-->
                    <div class="basket-card_left">
                        <div class="basket-card_left_img">
                            <img src="<?= $resArticle['image'] ?>" alt="board-game" />
                            <div class="catalog-card_top_image_text">
                                <h3>Возраст: <span><?= $resArticle['age'] ?></span></h3>
                            </div>
                        </div>
                        <div class="basket-card_left_text">
                            <h2>Название игры: "<?= $resArticle['name_game'] ?>"</h2>
                            <p class="mb-16px">Артикул: <span><?= $resArticle['vendor_code'] ?></span></p>
                            <div class="card-top_count">

                                <h1 class="number">Количество (шт.): <?= $resArticle['quantity_goods'] ?></h1>

                                <h1 id="price">Стоимость: <span><?= $resArticle['total_price'] ?></span> ₽</h1>
                            </div>
                        </div>
                        <!--Удаление карточки товара из корзины-->
                        <form enctype="multipart/form-data" action="include/delete.php" method="get">
                            <input type="hidden" name="game_id" value="<?= $resArticle['game_id'] ?>">
                            <button style="font-size:16px;">Удалить из корзины</button>
                        </form>
                    </div>
                    <?php }} ?>
                </div>

                <!--Правая часть_-->
                <!--Делаем запрос к БД, чтобы вывести общую стоимость всех товаров и стоимость с учетом скидки -->
                <?php
                    $sql = "SELECT SUM(total_price) AS total_price_sum, SUM(total_price * 0.9) AS total_price_discounted_sum, SUM(quantity_goods) AS quantity_goods_sum FROM `basket`";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?>
                <div class="basket-card_right">
                    <div class="basket-card_right-top">
                        <div class="basket-card_right-top-price">
                            <h3>Товары: <span>(<?= $resArticle['quantity_goods_sum'] ?>)</span> шт.</h3>
                            <p class="color"><?= $resArticle['total_price_sum'] ?></p>
                        </div>
                        <div class="basket-card_right-top-price">
                            <h3>Скидка на товары:</h3>
                            <p>10%</p>
                        </div>
                        <div class="basket-card_right-top-price mb-36px">
                            <h3>Итого:</h3>
                            <p class="color"><?= $resArticle['total_price_discounted_sum'] ?></p>
                        </div>
                        <button class="btn-choose_game position" onclick="document.location='login.php'">Оформить
                            заказ
                        </button>
                    </div>
                    <div class="basket-card_right-bottom">
                        <img src="css/image/fire.png" alt="fire">
                        <h2>Акция дня: скидка на все товары</h2>
                        <div class="basket-card_right-bottom-discount">
                            <span>10%</span>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </main>
    <!--FOOTER-->
    <?php
    include('include/footer.php');
    ?>
    <script src="js/index.js"></script>
</body>

</html>