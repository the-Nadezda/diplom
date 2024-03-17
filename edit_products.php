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
    <title>Редактирование карточки товаров</title>
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
                        <li class="main-promotion_title_nav_link ml-30px">Редактирование карточки товаров</li>
                    </ol>
                </nav>
            </div>

            <div class="main-popular_travel padding-50px">
                <!--Левый блок-->
                <div class="main-registration_left">
                    <h1>Изменить карточку товара:</h1>
                    <div>
                        <?php
                $id=$_GET['id']; // Получаем id каждого товара
                $sql="SELECT * FROM `catalog` WHERE id = $id";
                
                $res=$mysqli->query($sql);
                if ($res->num_rows > 0) 
                    $resArticle = $res->fetch_assoc();
                ?>
                        <form enctype="multipart/form-data" id="edit-form" action="include/edit_products.php"
                            method="post">
                            <div>
                                <input class="form_input" type="hidden" id="edit-id" name="edit-id"
                                    value="<?= $resArticle['id'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-image">Фото игры:</label>
                                <input class="form_input" type="file" id="edit-image" name="edit-image" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-age">Возрастные ограничения:</label>
                                <input class="form_input" type="text" id="edit-age" name="edit-age"
                                    value="<?= $resArticle['age'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-name_game">Название игры:</label>
                                <input class="form_input" type="text" id="edit-name_game" name="edit-name_game"
                                    value="<?= $resArticle['name_game'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-time">Время игры:</label>
                                <input class="form_input" type="text" id="edit-time" name="edit-time"
                                    value="<?= $resArticle['time'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-quantity">Количество игроков:</label>
                                <input class="form_input" type="text" id="edit-quantity" name="edit-quantity"
                                    value="<?= $resArticle['quantity'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-category">Категория игры:</label>
                                <input class="form_input" type="text" id="edit-category" name="edit-category"
                                    value="<?= $resArticle['category'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-site">Место для проведения игры:</label>
                                <input class="form_input" type="text" id="edit-site" name="edit-site"
                                    value="<?= $resArticle['site'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-complication">Сложность:</label>
                                <input class="form_input" type="text" id="edit-complication" name="edit-complication"
                                    value="<?= $resArticle['complication'] ?>" />
                            </div>

                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-price">Стоимость игры (руб.):</label>
                                <input class="form_input" type="text" id="edit-price" name="edit-price"
                                    value="<?= $resArticle['price'] ?>" />
                            </div>
                            <div>
                                <label class="paument-label"
                                    style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                    for="edit-vendor_code">Штрихкод:</label>
                                <input class="form_input" type="text" id="edit-vendor_code" name="edit-vendor_code"
                                    value="<?= $resArticle['vendor_code'] ?>" />
                            </div>

                            <button class=" btn-choose_game" type="submit" id="save-btn">Сохранить</button>
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