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
    <title>Ошибка</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <!--MAIN-->
    <main>
        <div class="container">

            <div class="main-error">
                <img class="error_image" src="css/image/error.png" alt="ошибка загрузки" />
                <h1>Тут ничего нет!</h1>
                <p>Попробуйте вернуться назад или поищите что-нибудь другое.<br>Код ошибки: 404</p>
                <p>Перейти в
                    <a style="color: #db4e66; font-weight: 500;" href="catalog.php">Каталог игр</a>
                </p>
            </div>
        </div>
    </main>
    <!--FOOTER-->
    <?php
    include('include/footer.php');
?>
</body>

</html>