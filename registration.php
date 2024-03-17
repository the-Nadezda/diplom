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
    <title>Регистрация</title>
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
                    <h1>Введите Ваши данные:</h1>
                    <form enctype="multipart/form-data" method="post" action="include/registration.php">
                        <!--прописываем в value код для сохранения информации в input-->
                        <div>
                            <input class="form_input" type="text" name="surname" placeholder="Фамилия" id="" required
                                value="<?php echo $_SESSION['surname'] ?>" />
                        </div>
                        <!--прописываем в value код для сохранения информации в input-->
                        <div>
                            <input class="form_input" type="text" name="name" placeholder="Имя" id="" required
                                value="<?php echo $_SESSION['name'] ?>" />
                        </div>
                        <!--прописываем в value код для сохранения информации в input-->
                        <div>
                            <input class="form_input" type="text" name="lastname" placeholder="Отчество" id="" required
                                value="<?php echo $_SESSION['lastname'] ?>" />
                        </div>
                        <!--прописываем в value код для сохранения информации в input-->
                        <div>
                            <input class="form_input" type="email" name="email" placeholder="Email" id="" required
                                value="<?php echo $_SESSION['email'] ?>" />
                        </div>
                        <!--прописываем в value код для сохранения информации в input-->
                        <div>
                            <input class="form_input" type="tel" name="phone"
                                placeholder="Phone (формат:+7900 000 00 00)" id="" required
                                value="<?php echo $_SESSION['phone'] ?>" />
                        </div>
                        <!--прописываем в value код для сохранения информации в input-->
                        <div>
                            <input class="form_input" type="text" name="login" placeholder="Login" id="" required
                                value="<?php echo $_SESSION['login'] ?>" />
                        </div>
                        <!--прописываем в value код для сохранения информации в input-->
                        <div>
                            <input class="form_input" type="password" name="password" placeholder="Password" id=""
                                required />
                        </div>
                        <div>
                            <input class="form_input" type="password" name="repeat_password"
                                placeholder="Repeat at password" id="" required />
                        </div>
                        <div>
                            <input type="text" name="rights" value="user" style="display: none" id="" />
                        </div>
                        <!--Фото-->
                        <div class="mb-36px">
                            <label style="display: block; font-size:23px; margin-bottom: 10px" for="image_user">Добавить
                                фото</label>
                            <input name="image_user" id="image_user" type="file">
                        </div>
                        <input class="btn-choose_game" type="submit" value="Регистрация" />
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
                <!--Правый блок регистрации-->
                <div class="main-registration_right">
                    <img src="css/image/regg.jpg" alt="регистрация" />
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