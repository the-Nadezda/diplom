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
    <title>Страница регистрации/авторизации</title>
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
            <div class="main-promotion_title_nav">
                <nav>
                    <ol>
                        <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                        <li class="main-promotion_title_nav_link ml-30px">Оформление заказа</li>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="main-popular_travel  padding-70px">
                <!--Левый блок-->
                <div class="main-promotion_left">
                    <h1>Спасибо за Ваш заказ!</h1>
                    <h2 class="mb-16px">Менеджер свяжется с Вами в течение <br> 5 минут.</h2>
                    <h2 class="mb-16px">Если у Вас есть вопросы и ждать нельзя, скорее звоните нам:</h2>
                    <div class="main-promotion_left-tel">
                        <img class="mr-15px" src="css/image/icons8.png" alt="телефон">
                        <h2>8-(900)-500-00-01</h2>
                    </div>
                    <p>Звонок по России бесплатный!</p>
                </div>

                <!--Правый блок-->
                <div class="main-promotion_right">
                    <img src="css/image/present.jpg" alt="подарок" />

                    <div class="main-promotion_right_block">
                        <div class="main-promotion_right_block_top">
                            <img class="mr-15px" src="css/image/kvest.jpg" alt="телефон">
                            <div class="main-promotion_right_text">
                                <h2 class="mb-16px">Получите бесплатно готовый квест для всей семьи "Корова-вирус".</h2>
                                <h2 class="mb-16px">Куда отправить сценарий?</h2>
                            </div>
                        </div>
                        <form action="include/quest_script.php" method="post" enctype="multipart/form-data">
                            <label class="main_promotion_form_label" for="email">Укажите Ваш email:</label>
                            <input class="main_promotion_form_input" type="email" name="email" id="email"
                                value="<?php echo $_SESSION['email'] ?>" required>
                            <button class="main_promotion_form_input_submit" type=" submit">Отправить</button>
                        </form>
                        <!--Обработка ошибок-->
                        <?php
                    // Показать ошибку в теге <p>
                    if (isset($_SESSION['message'])) {
                        echo '<p class="form_error">' . $_SESSION['message'] . '<p>'; 
                    } 
                    // Удалить ошибку (unset)
                    unset ($_SESSION['message']);
                    ?>

                    </div>

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