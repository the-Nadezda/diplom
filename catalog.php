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
    <title>Каталог</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <main>
        <section class="main-catalog">
            <div class="container">
                <!--Навигация по страницам сайта-->
                <div class="main-promotion_title_nav">
                    <nav>
                        <ol>
                            <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                            <li class="main-promotion_title_nav_link ml-30px">Каталог игр</li>
                        </ol>
                    </nav>
                </div>
                <div class="main-promotion_title">
                    <h1>Каталог игр</h1>
                </div>
                <!-- раздел "КАТАЛОГ"-->
                <div class="catalog-block">
                    <!--Фильтр каталога-->
                    <div class="catalog-left">
                        <h2>Фильтр</h2>
                        <div class="catalog-filter">
                            <form сlass="catalog-form_filter" method="get" action="catalog.php">
                                <h3 class="catalog-form_filter_title">Цена:</h3>
                                <hr class=" mb-16px">
                                <label>
                                    <input type="checkbox" name="price[]" value="4000₽" />
                                    до 4000 рублей
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="price[]" value="2000₽" />
                                    до 2000 рублей
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="price[]" value="6000₽" />
                                    до 6000 рублей
                                </label>
                                <h3 class=" catalog-form_filter_title mt-15px">Возраст:</h3>
                                <hr class=" mb-16px">
                                <label>
                                    <input type="checkbox" name="age[]" value="6+" />
                                    от 6 лет
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="age[]" value="8+" />
                                    от 8 лет
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="age[]" value="12+" />
                                    от 12 лет
                                </label>
                                <h3 class="catalog-form_filter_title mt-15px">Сложность:</h3>
                                <hr class=" mb-16px">
                                <label>
                                    <input type="checkbox" name="complication[]" value="простая" />
                                    простая
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="complication[]" value="средняя" />
                                    средняя
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="complication[]" value="усложненная" />
                                    усложненная
                                </label>
                                <h3 class=" catalog-form_filter_title mt-15px">Категория:</h3>
                                <hr class=" mb-16px">
                                <label>
                                    <input type="checkbox" name="category[]" value="для праздника" />
                                    для прадника
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="category[]" value="развивающие" />
                                    развивающие
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="category[]" value="в дорогу" />
                                    в дорогу
                                </label>
                                <h3 class="catalog-form_filter_title mt-15px">Количество игроков:</h3>
                                <hr class=" mb-16px">
                                <label>
                                    <input type="checkbox" name="quantity[]" value="до 6 чел." />
                                    до 6 чел.
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="quantity[]" value="до 12 чел." />
                                    до 12 чел.
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="quantity[]" value="до 3 чел." />
                                    до 3 чел.
                                </label>
                                <div>
                                    <button type="submit" class="btn-choose_game mt-15px">Найти</button>
                                    <button type="reset" class="btn-reset"
                                        onclick="location.href='catalog.php?reset=true'">X
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class=" catalog-right">
                        <div class="catalog">
                            <?php                           
                            
// Получение значений параметров фильтрации из URL
$ageFilter = $_GET['age'];
$quantityFilter = $_GET['quantity'];
$categoryFilter = $_GET['category'];
$complicationFilter = $_GET['complication'];
$priceFilter = $_GET['price'];

// подготовка sql-запроса с условиями фильтрации
$sql = "SELECT * FROM `catalog` WHERE 1=1";
if (!empty($ageFilter)) {
    $ageFilter = implode("','", $ageFilter); // преобразуем массив в строку для использования в SQL запросе
    $sql .= " AND age IN ('$ageFilter')";
}
if (!empty($quantityFilter)) {
    $quantityFilter = implode("','", $quantityFilter); // преобразуем массив в строку для использования в SQL запросе
    $sql .= " AND quantity IN ('$quantityFilter')";
}
if (!empty($categoryFilter)) {
    $categoryFilter = implode("','", $categoryFilter); // преобразуем массив в строку для использования в SQL запросе
    $sql .= " AND category IN ('$categoryFilter')";
}

if (!empty($priceFilter)) {
    // Получаем цифровое значение цены для сравнения.функцию intval для преобразования значения цены в число. Затем мы проверяем, есть ли выбранное значение цены, и если есть, добавляем условие price <= $maxPrice к SQL-запросу.
    $maxPrice = intval($priceFilter[0]);
    $sql .= " AND price <= $maxPrice";
}

if (!empty($complicationFilter)) {
    $complicationFilter = implode("','", $complicationFilter); // преобразуем массив в строку для использования в SQL запросе
    $sql .= " AND complication IN ('$complicationFilter')";
}

// Выполнение SQL-запроса
$res = $mysqli->query($sql);

// Вывод отфильтрованных карточек
if ($res->num_rows > 0) {
    while ($resArticle = $res->fetch_assoc()) {
        ?>
                            <!--Первая карточка-->
                            <div class="catalog-games mb-36px">
                                <div class=" catalog-card_top">
                                    <div class="catalog-games-card_top_image">
                                        <img src="<?= $resArticle['image'] ?>" alt="board-game" />
                                        <div class="catalog-card_top_image_text">
                                            <h3>Возраст: <span><?= $resArticle['age'] ?></span></h3>
                                        </div>
                                    </div>
                                    <div class="catalog-games-card_title">
                                        <a href="page-product.php?id=<?= $resArticle['id'] ?>">
                                            <h2>"<?= $resArticle['name_game'] ?>"</h2>
                                        </a>
                                    </div>
                                    <div class="catalog-card_description">
                                        <img src="css/image/time.svg" alt="time">
                                        <h3>Время игры:</h3>
                                        <p><?= $resArticle['time'] ?></p>
                                    </div>
                                    <div class="catalog-card_description">
                                        <img src="css/image/players.svg" alt="number of players">
                                        <h3>Кол-во игроков:</h3>
                                        <p><?= $resArticle['quantity'] ?></p>
                                    </div>
                                    <div class="catalog-card_description">
                                        <img src="css/image/ball.svg" alt="ball">
                                        <h3>Места:</h3>
                                        <p><?= $resArticle['site'] ?></p>
                                    </div>
                                    <div class="catalog-card_description">
                                        <img src="css/image/category.svg" alt="category">
                                        <h3>Категория:</h3>
                                        <p><?= $resArticle['category'] ?></p>
                                    </div>
                                    <div class="catalog-card_description mb-16px">
                                        <img src="css/image/complexity.svg" alt="complexity">
                                        <h3>Сложность:</h3>
                                        <p><?= $resArticle['complication'] ?> </p>
                                    </div>
                                    <h1><?= $resArticle['price'] ?> ₽</h1>
                                </div>
                                <!--Кнопка "Добавить в корзину"-->
                                <!--Кнопку <button> вкладываем внутрь элемента <form> и для формы указываем атрибут action с адресом веб-страницы. Дополнительно можно добавить атрибут target со значением _blank, тогда веб-страница откроется в новой вкладке браузера.-->

                                <a href="page-product.php?id=<?= $resArticle['id'] ?>"
                                    class="btn-add_to_basket hvr-float-shadow">
                                    Подробнее о товаре
                                </a>
                            </div>
                            <?php }
} else {
    echo "Нет результата";
}
// Закрытие соединения с базой данных
$mysqli->close();
?>
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
</body>

</html>