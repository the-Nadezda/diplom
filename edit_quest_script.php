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
    <title>Подарок клиенту</title>
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
                        <li class="main-promotion_title_nav_link ml-30px">Отправить подарок клиенту</li>
                    </ol>
                </nav>
            </div>

            <div class="main-popular_travel padding-50px">
                <!--Левый блок-->
                <div class="main-registration_left">
                    <h1>Отправить подарок:</h1>
                    <div>
                        <?php
                $id=$_GET['id']; // Получаем id каждого товара
                $sql="SELECT * FROM `quest_script` WHERE id = '$id'";
                
                $res=$mysqli->query($sql);
                if ($res->num_rows > 0) 
                    $resArticle = $res->fetch_assoc();
                ?>
                        <form enctype="multipart/form-data" id="edit-form" action="include/edit_quest_script.php"
                            method="post">
                            <div>
                                <input class="form_input" type="hidden" id="edit-id" name="edit-id"
                                    value="<?= $resArticle['id'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-file">Выбрать сценарий:</label>
                                <input class="form_input" type="file" id="edit-file" name="edit-file" />
                            </div>

                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-email">Email клиента:</label>
                                <input class="form_input" type="email" id="edit-email" name="edit-email"
                                    value="<?= $resArticle['email'] ?>" />
                            </div>

                            <button class=" btn-choose_game" type="submit" id="save-btn">Отправить</button>
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
                    <img src="css/image/edit_products.jpg" alt="регистрация" />
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