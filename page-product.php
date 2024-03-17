<?php
session_start();
include('include/db_connect.php');

$arrChartData[] = array();
 
$sql = "SELECT `name_user`, `game_title`, `grade`, `comment_user`, `photo_user` FROM `reviews` ";
$res = $mysqli->query($sql) or trigger_error($mysqli->error."[$sql]");
while($row = $res->fetch_assoc())
{
    $arrChartData[] = $row;
}
 
foreach ( $arrChartData as $i=>$array )
{
    if ( $i>0)
    {
    $array['name_user'].$array['game_title'].$array['grade'].$array['comment_user'].$array['photo_user'].'<br>';
    }
};

$currentRating = $resArticle['grade'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/page-product.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Страница товара</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <main>
        <section class="card-product">
            <div class="container">
                <!--Навигация по страницам сайта-->
                <div class="main-promotion_title_nav">
                    <nav>
                        <ol>
                            <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                            <li class="main-promotion_title_nav_link ml-30px"><a href="catalog.php">Каталог игр</a></li>
                            <li class="main-promotion_title_nav_link ml-30px">Подробнее о товаре</li>
                        </ol>
                    </nav>
                </div>
                <!--Блок с описанием товара-->
                <?php
                $id=$_GET['id']; // Получаем id каждого товара
                $sql="SELECT * FROM `catalog` WHERE id = $id";
                
                $res=$mysqli->query($sql);
                if ($res->num_rows > 0) 
                    $resArticle = $res->fetch_assoc();
                ?>

                <div class="card-top">
                    <!--Левая часть блока с картинкой-->
                    <div class="card-top_left mr-40px">
                        <img class="" src="<?= $resArticle['image'] ?>" alt=" board-game" />
                        <div class="catalog-card_top_image_text">
                            <h3>Возраст: <span>
                                    <?=$resArticle['age'] ?></span>
                            </h3>
                        </div>
                        <!--Слайдер-->
                        <div class=" swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?= $resArticle['image'] ?>" alt="game" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= $resArticle['image'] ?>" alt="game" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= $resArticle['image'] ?>" alt="game" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= $resArticle['image'] ?>" alt="game" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= $resArticle['image'] ?>" alt="game" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?= $resArticle['image'] ?>" alt="game" />
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <!--Конец слайдера-->
                    </div>
                    <!--Правая часть блока с текстом-->
                    <div class="card-top_right">
                        <h2>"
                            <?= $resArticle['name_game'] ?>
                            "</h2>
                        <hr class="mb-25px" />
                        <div class="reviews-card_top-rating mb-36px">
                            <span>5</span>
                            <div class="reviews-card_top-rating-img">
                                <img src="css/image/star3.png" />
                                <img src="css/image/star3.png" />
                                <img src="css/image/star3.png" />
                                <img src="css/image/star3.png" />
                                <img src="css/image/star3.png" />
                            </div>
                        </div>
                        <div class="catalog-card_description">
                            <img src="css/image/time.svg" alt="time" />
                            <h3>Время игры:</h3>
                            <p><?= $resArticle['time'] ?></p>
                        </div>
                        <div class="catalog-card_description">
                            <img src="css/image/players.svg" alt="number of players" />
                            <h3>Кол-во игроков:</h3>
                            <p><?= $resArticle['quantity'] ?></p>
                        </div>
                        <div class="catalog-card_description">
                            <img src="css/image/ball.svg" alt="ball" />
                            <h3>Места:</h3>
                            <p><?= $resArticle['site'] ?></p>
                        </div>
                        <div class="catalog-card_description">
                            <img src="css/image/category.svg" alt="category" />
                            <h3>Категория:</h3>
                            <p><?= $resArticle['category'] ?></p>
                        </div>
                        <div class="catalog-card_description">
                            <img src="css/image/complexity.svg" alt="complexity" />
                            <h3>Сложность:</h3>
                            <p><?= $resArticle['complication'] ?></p>
                        </div>
                        <!--Артикул-->
                        <div class="card-top_right_vendor-code">
                            <h3>Артикул:</h3> <span><?= $resArticle['vendor_code'] ?></span>
                        </div>
                        <!--Стоимость товара-->
                        <div class="card-top_count">
                            <h1 id="price">Цена товара (за 1 шт.):<span class="price">
                                    <?= $resArticle['price'] ?></span><span>
                                    ₽</span>
                            </h1>
                        </div>

                        <!--Цена товара из счетчика-->
                        <div class=" product__buy pr-0">
                            <div class="product__buy-container">
                                <h3 class="product__price">Новая стоимость:
                                    <span class="subtotal__price"> <?= $resArticle['price'] ?></span> ₽
                                </h3>
                            </div>
                        </div>

                        <!--Добавили к form action, чтобы в корзину подтягивалась карточка по id-->
                        <form class="qty-input" enctype="multipart/form-data" action="include/basket.php" method="POST">
                            <input type="hidden" name="game_id" value="<?= $resArticle['id'] ?>">
                            <input type="hidden" name="image" value="<?= $resArticle['image'] ?>">
                            <input type="hidden" name="age" value="<?= $resArticle['age'] ?>">
                            <input type="hidden" name="price" value="<?= $resArticle['price'] ?>">
                            <input type="hidden" name="vendor_code" value="<?= $resArticle['vendor_code'] ?>">
                            <input type="hidden" name="name_game" value="<?= $resArticle['name_game'] ?>">
                            <!--Счетчик товара-->
                            <h3 class="price_count">Укажите количество:</h3>
                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                            <input class="product-qty input" id="quantity-input" type="number" name="quantity_goods"
                                min="1" max="10" value="1">
                            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            <div>
                                <button class="btn-add_to_basket hvr-float-shadow" name="add_to_basket"
                                    onclick="addToBasket()">
                                    Добавить в корзину </button>
                            </div>
                        </form>
                    </div>
                </div>

                <h1 class="card-product_title">Информация о товаре</h1>
                <!--Нижний блок (отзывы о товаре)-->
                <div class="card-top-bottom">
                    <div class="tabs">
                        <nav class="tabs-list">
                            <button class="tabs-btn" data-tabs-path="description">
                                Описание
                            </button>
                            <button class="tabs-btn" data-tabs-path="details">
                                Детали
                            </button>
                            <button class="tabs-btn tabs_btn_active" data-tabs-path="reviews">
                                Отзывы
                            </button>
                            <button class="tabs-btn" data-tabs-path="question">
                                Вопрос-ответ
                            </button>
                        </nav>
                        <hr class="mb-36px" />
                        <!-- Первый раздел "Отзывы"-->
                        <div class="tabs-content tabs-content_active" data-tabs-target="reviews">

                            <!--Обработка отзывов: отзыв соответствует определенному товару-->
                            <?php
    $game_title=$_GET['id']; // получите значение по id
    
    $sql = "SELECT * FROM `reviews` WHERE game_title = $game_title";
    $res = $mysqli -> query($sql);
    if($res -> num_rows > 0) {
    while($resArticle = $res -> fetch_assoc()) {
    ?>
                            <div class="content-reviews">
                                <!--Содержание карточки-->
                                <div class="card-review_top">
                                    <img class="card-review_top-img mr-24px" src="<?= $resArticle['photo_user'] ?>"
                                        alt="photo girl" />
                                    <!--правая часть-->
                                    <div class="card-review_right">
                                        <h2><?= $resArticle['name_user'] ?></h2>

                                        <!--Рейтинг-->
                                        <div class="reviews-card_top-rating mb-36px">
                                            <span><?= $resArticle['grade'] ?></span>
                                            <div class="reviews-card_top-rating-img">
                                                <img src="css/image/star3.png" />
                                                <img src="css/image/star3.png" />
                                                <img src="css/image/star3.png" />
                                                <img src="css/image/star3.png" />
                                                <img src="css/image/star3.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><?= $resArticle['comment_user'] ?></p>
                            </div>
                            <?php }}  ?>
                        </div>

                        <!-- Второй раздел "Описание"-->
                        <div class="tabs-content tabs-content" data-tabs-target="description">
                            <?php
                    $game_id=$_GET['id']; // получите значение по id
                    
                    $sql = "SELECT * FROM `game_information` WHERE catalog_id = $game_id";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?>
                            <div class="content-reviews">
                                <!--Содержание карточки-->
                                <h2 class="content-reviews_description"><?= $resArticle['description'] ?>
                                </h2>
                            </div>
                            <?php }}  ?>
                        </div>
                        <!-- Третий раздел "Детали"-->
                        <div class="tabs-content tabs-content" data-tabs-target="details">
                            <?php
                    $game_id=$_GET['id']; // получите значение по id
                    
                    $sql = "SELECT * FROM `game_information` WHERE catalog_id = $game_id";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?>
                            <div class="content-reviews">
                                <!--Содержание карточки-->
                                <h2 class="content-reviews_description"><?= $resArticle['details'] ?></h2>
                            </div>
                            <?php }}  ?>
                        </div>
                        <!-- Четвертый раздел "Вопрос-Ответ"-->
                        <div class="tabs-content tabs-content" data-tabs-target="question">
                            <?php
                    $game_id=$_GET['id']; // получите значение по id
                    
                    $sql = "SELECT * FROM `game_information` WHERE catalog_id = $game_id";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?>
                            <div class="content-reviews">
                                <!--Содержание карточки-->
                                <h2 class="content-reviews_description_title">Вопрос:
                                    <span class="content-reviews_description"><?= $resArticle['question'] ?></span>
                                </h2>
                                <br>
                                <h2 class=" content-reviews_description_title">Ответ:<span
                                        class="content-reviews_description"><?= $resArticle['answer'] ?></span>
                                </h2>

                            </div>
                            <?php }}  ?>
                        </div>
                        <button class="btn-reviews ml-34px mt-40px" id="btn-reviews">Оставить отзыв</button>
                        <dialog class="reviews-modal" id="reviews-modal">
                            <form enctype="multipart/form-data" method="post" action="include/page-product.php"
                                id="reviewForm">
                                <div class="reviews-modal_top">
                                    <h2 class="reviews-modal_top_title">Оставить отзыв</h2>
                                    <button class="btn-close">X</button>
                                </div>

                                <div class="form-top_input mb-36px">
                                    <label class="mb-16px" for="image_user">Ваше фото</label>
                                    <input name="image_user" id="image_user" type="file">
                                </div>

                                <div class="form-top">
                                    <div class="form-top_input">
                                        <label for="name">Имя</label>
                                        <input class="form-input" type="text" name="name_user" id="name" required
                                            value="<?php echo $_SESSION['name_user'] ?>" />
                                    </div>
                                    <div class="form-top_input mb-36px">
                                        <label for="game">Название игры</label>
                                        <select name="game_title" id="game" class="form-input">
                                            <option value="">-- Выберите игру --</option>
                                            <option value="1">
                                                Сказочное королевство
                                            </option>
                                            <option value="2">
                                                Пиратский квест</option>
                                            <option value="3">В поисках потерянного друга
                                            </option>
                                            <option value="4">Кто украл единорога</option>
                                            <option value="5">Тайны старого цирка</option>
                                            <option value="6">Вкусное приключение</option>
                                            <option value="7">Бюро находок</option>
                                            <option value="8">Миссия Печеньки</option>
                                            <option value="9">Карта сокровищ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-top_input mb-36px">
                                    <label for="number">Оцените игру</label>
                                    <input class="input-grade" type="number" name="grade" placeholder="5" id="number"
                                        min="1" max="5" required value="<?php echo $_SESSION['grade'] ?>" />
                                    <h2>По пятибалльной шкале</h2>
                                </div>
                                <div class="form-top_input">
                                    <label class="mb-16px" for="comment">Ваш отзыв</label>
                                    <textarea name="comment_user" id="comment"
                                        required><?php echo $_SESSION['comment_user'] ?></textarea>
                                </div>
                                <button class="btn-reviewss" type="submit"
                                    style="font-size:18px; margin-top:20px;">Отправить
                                    отзыв</button>
                            </form>
                            <?php
                    // Показать ошибку в теге <p>
            if (isset($_SESSION['messag'])) { echo '
            <p class="form_error">' . $_SESSION['messag'] . '</p>
            <p>
              '; } // Удалить ошибку (unset) unset ($_SESSION['message']); ?>
                            <!--КОНЕЦ Обработка ошибок-->

                            <?php ?>
                            </p>
                        </dialog>


                    </div>

                </div>
        </section>
    </main>
    <!--FOOTER-->
    <?php
    include('include/footer.php');
    ?>

    <!-- Swiper JS -->
    <script src=" https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 5,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
    <script src="js/index.js"></script>


</body>

</html>