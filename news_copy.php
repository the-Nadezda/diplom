<?php
session_start();
include('include/db_connect.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <title>Новости и акции</title>
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
                            <li class="main-promotion_title_nav_link ml-30px">Акции и новости</li>
                        </ol>
                    </nav>
                </div>
                <div class="main-promotion_title">
                    <h1>Акции и новости</h1>
                </div>
                <div class="block-news-promotion">
                    <!--Левая часть-->
                    <div class="block-news-promotion_left">
                        <h2>Фильтр</h2>
                        <div class="catalog-filter">
                            <form сlass="catalog-form_filter" method="get" action="news.php">
                                <h3>Категория:</h3>
                                <hr class=" mb-16px">
                                <label>
                                    <input type="checkbox" name="category[]" value="Акции" />
                                    Акции и спец.предложения
                                </label>
                                <br />
                                <label>
                                    <input type="checkbox" name="category[]" value="Новости" />
                                    Новости
                                </label>
                                <br />
                                <div>
                                    <button type="submit" class="btn-choose_game mt-35px">Найти</button>
                                    <button type="reset" class="btn-reset"
                                        onclick="location.href='news.php?reset=true'">Очистить
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Правая часть-->
                    <div class="block-news-promotion_right">
                        <h2>Февраль-март 2024</h2>
                        <!--Блок с карточками акций и новостей-->
                        <div class="block-news-promotion_right_card">
                            <!--Карточка акции/новости-->
                            <?php
                            // Получение значений параметров фильтрации из URL
                            $categoryFilter = $_GET['category'];
                            // подготовка sql-запроса с условиями фильтрации
                            $sql = "SELECT * FROM `promotion_news` WHERE 1=1";
                            if (!empty($categoryFilter)) {
                                $categoryFilter = implode("','", $categoryFilter); // преобразуем массив в строку для использования в SQL запросе
                                $sql .= " AND category IN ('$categoryFilter')";
                            }
                            // Выполнение SQL-запроса
                            $res = $mysqli->query($sql);
                            // Вывод отфильтрованных карточек
                            if ($res->num_rows > 0) {
                                while ($resArticle = $res->fetch_assoc()) {
                                    ?>
                            <div class="block-news-promotion_card">
                                <!--Верхняя часть карточки-->
                                <div class="block-news-promotion_card-top">
                                    <div class="swiper-slide_left background-slide_2">
                                        <h2><?= $resArticle['advertising'] ?></h2>
                                    </div>
                                    <div class="swiper-slide_rightss">
                                        <h2 class=""><?= $resArticle['title'] ?></h2>
                                        <p><?= $resArticle['data'] ?></p>
                                    </div>
                                </div>
                                <div class="block-news-promotion_card-bottom">
                                    <p><?= $resArticle['text'] ?></p>
                                </div>
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