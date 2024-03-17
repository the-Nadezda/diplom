<?php
session_start();
include('include/db_connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Редактирование личных данных клиентов</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <main>
        <div class="container">
            <!--Навигация по страницам сайта-->
            <div class="main-promotion_title_nav">
                <nav>
                    <ol>
                        <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                        <li class="main-promotion_title_nav_link ml-30px"><a href="admin.php">Панель администратора</a>
                        </li>
                        <li class="main-promotion_title_nav_link ml-30px">Редактирование данных клиента</li>
                    </ol>
                </nav>
            </div>

            <div class="main-popular_travel padding-50px">
                <!--Левый блок-->
                <div class="main-registration_left">
                    <h1>Внесите изменения:</h1>
                    <div>
                        <?php
                $id=$_GET['id']; // Получаем id каждого товара
                $sql="SELECT * FROM `registration` WHERE id = $id";
                
                $res=$mysqli->query($sql);
                if ($res->num_rows > 0) 
                    $resArticle = $res->fetch_assoc();
                ?>
                        <form enctype="multipart/form-data" id="edit-form" action="include/admin.php" method="post">
                            <div>
                                <input class="form_input" type="hidden" id="edit-id" name="edit-id"
                                    value="<?= $resArticle['id'] ?>" />
                            </div>
                            <div>
                                <input class="form_input" type="text" id="edit-surname" name="edit-surname"
                                    value="<?= $resArticle['surname'] ?>" />
                            </div>
                            <div>
                                <input class="form_input" type="text" id="edit-name" name="edit-name"
                                    value="<?= $resArticle['name'] ?>" />
                            </div>
                            <!--прописываем в value код для сохранения информации в input-->
                            <div>
                                <input class="form_input" type="text" id="edit-lastname" name="edit-lastname"
                                    value="<?= $resArticle['lastname'] ?>" />
                            </div>
                            <div>
                                <input class="form_input" type="email" id="edit-email" name="edit-email"
                                    value="<?= $resArticle['email'] ?>" />
                            </div>
                            <div>
                                <input class="form_input" type="tel" id="edit-phone" name="edit-phone"
                                    value="<?= $resArticle['phone'] ?>" />
                            </div>
                            <div>
                                <input class="form_input" type="text" id="edit-login" name="edit-login"
                                    value="<?= $resArticle['login'] ?>" />
                            </div>
                            <div>
                                <input class="form_input" type="text" id="edit-rights" name="edit-rights"
                                    value="<?= $resArticle['rights'] ?>" />
                            </div>
                            <button class="btn-choose_game" type="submit" id="save-btn">Сохранить</button>
                        </form>
                        <div class="message">
                            <!--Обработка сообщения-->
                            <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="form_error">' . $_SESSION['message'] . '<p>'; 
                    } 
                    // Удалить ошибку (unset)
                    unset ($_SESSION['message']);
                    ?>
                        </div>

                    </div>
                </div>
                <!--Правый блок регистрации-->
                <div class="main-registration_right">
                    <img src="css/image/updat_user1.jpg" alt="регистрация" />
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