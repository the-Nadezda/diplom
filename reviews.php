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
    <title>Отзывы</title>
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
                            <li class="main-promotion_title_nav_link ml-30px">Отзывы</li>
                        </ol>
                    </nav>
                </div>
                <div class="main-promotion_title">
                    <h1>Отзывы</h1>
                </div>
                <h2 class="reviews-title">Чтобы Ваш отзыв появился в списке, оставьте его к конкретному товару</h2>
                <!--Раздел  отзывами клиентов-->
                <div class="reviews-block">

                    <!--Делаем запрос на объединение таблиц `reviews` и `catalog`. Выводим пока 3 отзыва из БД-->
                    <?php
                    $sql = "SELECT reviews.*, catalog.name_game, catalog.age 
                    FROM `reviews`
                    INNER JOIN `catalog` ON reviews.game_title = catalog.id
                    LIMIT 3";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?> <div class="reviews-block_card">
                        <div class="reviews-block_card-top">
                            <img src="<?= $resArticle['photo_user'] ?>" alt="фото">
                            <div>
                                <h2><?= $resArticle['name_user'] ?></h2>
                                <h3>Название игры: "<?= $resArticle['name_game'] ?>"</h3>
                                <!--Рейтинг-->
                                <div class="reviews-card_top-rating">
                                    <span><?= $resArticle['grade'] ?></span>
                                    <div class="reviews-card_top-rating">
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-block_card-bottom">
                            <p><?= $resArticle['comment_user'] ?></p>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <button class="reviews-btn" id="reviews-btn">Загрузить еще</button>
            </div>
        </section>
    </main>

    <!--FOOTER-->
    <?php
    include('include/footer.php');
    ?>

    <script>
    var offset = 3; // Количество загруженных отзывов
    document.getElementById("reviews-btn").addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "reviews_load_more.php?offset=" + offset, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                document.querySelector(".reviews-block").innerHTML += response;
                offset += 3; // 
            }
        };
        xhr.send();
    });
    </script>
</body>

</html>