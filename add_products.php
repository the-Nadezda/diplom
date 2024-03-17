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
    <title>Добавление товара в каталог</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <!--MAIN-->
    <main>
        <div class="container">
            <!--Навигация по страницам сайта-->
            <div class="main-promotion_title_nav padding-30px">
                <nav>
                    <ol>
                        <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                        <li class="main-promotion_title_nav_link ml-30px"><a href="admin.php">Панель администратора</a>
                        </li>
                        <li class="main-promotion_title_nav_link ml-30px">Добавление товара в каталог</li>
                    </ol>
                </nav>
            </div>
            <div class="main-questions_user">
                <?php
                    // Показать ошибку в теге <p>
                    if (isset($_SESSION['message'])) {
                        echo '<h1 class="form_error_message">' . $_SESSION['message'] . '</h1>'; 
                    } 
                    // Удалить ошибку (unset)
                    unset ($_SESSION['message']);
                ?>
            </div>
        </div>
    </main>
    <!--FOOTER-->
    <?php
    include('include/footer.php');
?>
</body>

</html>