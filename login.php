<!--  код в файле login.php  проверяет данные, которые ввел пользователь-->
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
    <title>Авторизация</title>

</head>

<body>

    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>

    <!--MAIN-->
    <main>
        <div class="container">
            <div class="main-popular_travel padding-50px">
                <!--Левый блок регистрации-->
                <div class="main-registration_left">
                    <?php
                    // Показать ошибку в теге <p>
                    if (isset($_SESSION['message'])) {
                        echo '<p class="form_error">' . $_SESSION['message'] . '<p>'; 
                    } 
                    // Удалить ошибку (unset)
                    unset ($_SESSION['message']);
                    ?>
                    <!--КОНЕЦ Обработка ошибок-->
                    <h1 class="mt-40px">Войти в личный кабинет:</h1>
                    <form class="mb-64px" enctype="multipart/form-data" method="post" action="include/login.php">
                        <div><input class="form_input" type="email" name="email" placeholder="Email" id="" required>
                        </div>
                        <div><input class="form_input" type="password" name="password" placeholder="Пароль" id=""
                                required>
                        </div>
                        <div><input type="text" name="rights" value="user" style="display: none;" id=""></div>
                        <button class="btn-choose_game" type="submit" value="Авторизация">Войти</button>
                    </form>
                    <a href="registration.php">Регистрация</a>
                </div>

                <!--Правый блок регистрации-->
                <div class=" main-registration_right">
                    <img src="css/image/password.jpg" alt="password">
                </div>
            </div>
        </div>
    </main>


    <!--FOOTER-->
    <?php
    include('include/footer.php');
?>


</body>

</html>