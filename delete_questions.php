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
    <title>Спасибо за вопрос</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <!--MAIN-->
    <main>
        <div class="container">

            <div class="main-questions_user">
                <h1>Клиент успешно удален!</h1>
                <img src="css/image/photo.jpg" alt="картинка Спасибо" />
            </div>
        </div>
    </main>
    <!--FOOTER-->
    <?php
    include('include/footer.php');
?>
</body>

</html>