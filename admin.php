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
    <title>Панель администратора</title>
</head>

<body>
    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <!--MAIN-->
    <main>
        <section class="main-catalog">
            <div class="container">
                <!--Навигация по страницам сайта-->
                <div class="main-promotion_title_nav">
                    <nav>
                        <ol>
                            <li class="main-promotion_title_nav_link"><a href="index.php">Главная</a></li>
                            <li class="main-promotion_title_nav_link ml-30px">Панель администратора</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <div class="main-promotion_title">
                        <h1>Панель администратора</h1>
                    </div>
                    <div class="tabs">
                        <nav class="tabs-list column">
                            <button class="tabs-btn tabs_btn_active" data-tabs-path="delivery">
                                Наши клиенты
                            </button>
                            <button class="tabs-btn" data-tabs-path="return">
                                Наши товары
                            </button>
                            <button class="tabs-btn" data-tabs-path="payment">
                                Заказы клиентов
                            </button>
                            <button class="tabs-btn" data-tabs-path="present">
                                Подарки
                            </button>
                            <button class="tabs-btn" data-tabs-path="add_product">
                                Добавить товар
                            </button>
                            <button class="tabs-btn" data-tabs-path="questions">
                                Вопросы клиентов
                            </button>
                            <button class="tabs-btn" data-tabs-path="stock">
                                Склад
                            </button>
                            <button class="tabs-btn" data-tabs-path="settings">
                                Настройки
                            </button>
                        </nav>
                        <!-- Первый раздел "Наши клиенты"-->
                        <div class="tabs-content tabs-content_active mt-88px" data-tabs-target="delivery">
                            <div class="content-delivery">
                                <!--Содержание карточки-->
                                <div class="content-delivery_card">
                                    <div class="content-delivery_card-cdek">
                                        <!--Таблица с клиентами-->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Surname</th>
                                                    <th>Name</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Login</th>
                                                    <th>Image_user</th>
                                                    <th>Rights</th>
                                                    <th>Admin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM `registration`";
                                                $res = $mysqli -> query($sql);
                                                if($res -> num_rows > 0) {
                                                while($resArticle = $res -> fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="td-id"><?= $resArticle['id'] ?></td>
                                                    <td class="td-surname"><?= $resArticle['surname'] ?></td>
                                                    <td class="td-name"><?= $resArticle['name'] ?></td>
                                                    <td class="td-lastname"><?= $resArticle['lastname'] ?></td>
                                                    <td class="td-email"><?= $resArticle['email'] ?></td>
                                                    <td class="td-phone"><?= $resArticle['phone'] ?></td>
                                                    <td class="td-login"><?= $resArticle['login'] ?></td>
                                                    <td class="td-login"><?= $resArticle['image_user'] ?></td>
                                                    <td class="td-rights"><?= $resArticle['rights'] ?></td>
                                                    <td class="edit"><a
                                                            href="update.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Второй раздел "Наши товары"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="return">
                            <div class="content-return">
                                <div class="content_return_card">
                                    <!--Таблица с товарами-->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Age</th>
                                                <th>Name_game</th>
                                                <th>Time</th>
                                                <th>Quantity</th>
                                                <th>Category</th>
                                                <th>Site</th>
                                                <th>Сomplication</th>
                                                <th>Prise</th>
                                                <th>Vendor_code</th>
                                                <th>Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM `catalog`";
                                                $res = $mysqli -> query($sql);
                                                if($res -> num_rows > 0) {
                                                while($resArticle = $res -> fetch_assoc()) {
                                                ?>
                                            <tr>
                                                <td class="td-id"><?= $resArticle['id'] ?></td>
                                                <td class="td-image"><?= $resArticle['image'] ?></td>
                                                <td class="td-age"><?= $resArticle['age'] ?></td>
                                                <td class="td-name_game"><?= $resArticle['name_game'] ?></td>
                                                <td class="td-time"><?= $resArticle['time'] ?></td>
                                                <td class="td-quantity"><?= $resArticle['quantity'] ?></td>
                                                <td class="td-category"><?= $resArticle['category'] ?></td>
                                                <td class="td-site"><?= $resArticle['site'] ?></td>
                                                <td class="td-complication"><?= $resArticle['complication'] ?></td>
                                                <td class="td-price"><?= $resArticle['price'] ?></td>
                                                <td class="td-vendor_code"><?= $resArticle['vendor_code'] ?></td>
                                                <td class="edit"><a
                                                        href="edit_products.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Третий раздел "Заказы клиентов"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="payment">
                            <div class="content-payment">
                                <div class="content-payment_card">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Surname</th>
                                                <th>Name</th>
                                                <th>Lastname</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Address</th>
                                                <th>Name_game</th>
                                                <th>quantity_goods</th>
                                                <th>Price</th>
                                                <th>Status_id</th>
                                                <th>Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--Делаем запрос на объединение таблиц (registration, customer_orders, goods) и выведение зачений в orders-->
                                            <?php
                                                $sql = "SELECT registration.name, registration.surname, registration.lastname, registration.email, registration.phone, customer_orders.id AS customer_orders_id, customer_orders.data, customer_orders.address, goods.name_game, goods.total_price, goods.quantity_goods, orders.id, orders.status_id
                                                FROM `orders`
                                                INNER JOIN `registration` ON orders.user_id = registration.id
                                                INNER JOIN `customer_orders` ON orders.customer_orders_id = customer_orders.id
                                                INNER JOIN `goods` ON orders.goods_id = goods.id";
                                                
                                                $res = $mysqli -> query($sql);
                                                if($res -> num_rows > 0) {
                                                while($resArticle = $res -> fetch_assoc()) {
                                                    ?>
                                            <tr>
                                                <td class="td-id"><?= $resArticle['customer_orders_id'] ?></td>
                                                <td class="td-surname"><?= $resArticle['surname'] ?></td>
                                                <td class="td-name"><?= $resArticle['name'] ?></td>
                                                <td class="td-lastname"><?= $resArticle['lastname'] ?></td>
                                                <td class="td-time"><?= $resArticle['email'] ?></td>
                                                <td class="td-quantity"><?= $resArticle['phone'] ?></td>
                                                <td class="td-category"><?= $resArticle['data'] ?></td>
                                                <td class="td-site"><?= $resArticle['address'] ?></td>
                                                <td class="td-complication"><?= $resArticle['name_game'] ?></td>
                                                <td class="td-price"><?= $resArticle['quantity_goods'] ?></td>
                                                <td class="td-price"><?= $resArticle['total_price'] ?></td>
                                                <td class="td-vendor_code"><?= $resArticle['status_id'] ?></td>
                                                <td class="edit"><a
                                                        href="edit_orders.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!--Четвертый "Заказ на бесплатный квест"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="present">
                            <div class="content-present">
                                <div class="content-present_card">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--Делаем запрос на объединение таблиц (registration, customer_orders, goods) и выведение зачений в orders-->
                                            <?php
                                                $sql = "SELECT * FROM `quest_script`";
                                                $res = $mysqli -> query($sql);
                                                if($res -> num_rows > 0) {
                                                while($resArticle = $res -> fetch_assoc()) {
                                                ?>
                                            <tr class="tr-checkbox <?= $class ?>">
                                                <td class="td-id"><?= $resArticle['id'] ?></td>
                                                <td class="td-email"><?= $resArticle['email'] ?></td>
                                                <td class="edit"><a
                                                        href="edit_quest_script.php?id=<?= $resArticle['id'] ?>">Отправить
                                                        подарок</a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Пятый раздел "Добавить товар"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="add_product">
                            <div class="content-add_product">
                                <div class="content-add_product_card">

                                    <div class="main-registration_left">
                                        <h1>Добавить товар:</h1>
                                        <div>
                                            <form enctype="multipart/form-data" id="add-form"
                                                action="include/add_products.php" method="post">
                                                <div>
                                                    <input class="form_input" type="hidden" id="add-id" name="add-id"
                                                        value="<?php echo $_SESSION['id'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-image">Фото игры:</label>
                                                    <input class="form_input" type="file" id="add-image"
                                                        name="add-image" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-age">Возрастные ограничения:</label>
                                                    <input class="form_input" type="text" id="add-age" name="add-age"
                                                        value="<?php echo $_SESSION['age'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-name_game">Название игры:</label>
                                                    <input class="form_input" type="text" id="add-name_game"
                                                        name="add-name_game"
                                                        value="<?php echo $_SESSION['name_game'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-time">Время игры:</label>
                                                    <input class="form_input" type="text" id="add-time" name="add-time"
                                                        value="<?php echo $_SESSION['time'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-quantity">Количество игроков:</label>
                                                    <input class="form_input" type="text" id="add-quantity"
                                                        name="add-quantity"
                                                        value="<?php echo $_SESSION['quantity'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-category">Категория игры:</label>
                                                    <input class="form_input" type="text" id="add-category"
                                                        name="add-category"
                                                        value="<?php echo $_SESSION['category'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-site">Место для проведения игры:</label>
                                                    <input class="form_input" type="text" id="add-site" name="add-site"
                                                        value="<?php echo $_SESSION['site'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-complication">Сложность:</label>
                                                    <input class="form_input" type="text" id="add-complication"
                                                        name="add-complication"
                                                        value="<?php echo $_SESSION['complication'] ?>" />
                                                </div>

                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-price">Стоимость игры (руб.):</label>
                                                    <input class="form_input" type="text" id="add-price"
                                                        name="add-price" value="<?php echo $_SESSION['price'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-vendor_code">Штрихкод:</label>
                                                    <input class="form_input" type="text" id="add-vendor_code"
                                                        name="add-vendor_code"
                                                        value="<?php echo $_SESSION['vendor_code'] ?>" />
                                                </div>
                                                <div>
                                                    <label class="paument-label"
                                                        style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                                                        for="add-quantity_goods">Количество товаров:</label>
                                                    <input class="form_input" type="text" id="add-quantity_goods"
                                                        name="add-quantity_goods"
                                                        value="<?php echo $_SESSION['quantity_goods'] ?>" />
                                                </div>

                                                <button class=" btn-choose_game" type="submit" id="save-btn">Добавить
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--Правый блок регистрации-->
                                    <div class="main-registration_right">
                                        <img src="css/image/catalog.jpg" alt="каталог" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Шестой "Вопросы от пользователей"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="questions">
                            <div class="content-questions">
                                <div class="content-questions_card">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Question</th>
                                                <th>Admin</th>
                                                <th>Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM `questions_user`";
                                                $res = $mysqli -> query($sql);
                                                if($res -> num_rows > 0) {
                                                while($resArticle = $res -> fetch_assoc()) {
                                                    ?>
                                            <tr class="tr_questions-checkbox <?= $class ?>">
                                                <td class="td-id"><?= $resArticle['id'] ?></td>
                                                <td class="td-name"><?= $resArticle['name'] ?></td>
                                                <td class="td-phone"><?= $resArticle['phone'] ?></td>
                                                <td class="td-question"><?= $resArticle['question'] ?></td>
                                                <td class="td-checkbox">
                                                    <input type="checkbox" name="sent_questions" value="">Позвонил
                                                </td>
                                                <td class="td-checkbox">
                                                    <!--Удаление карточки товара из корзины-->
                                                    <form enctype="multipart/form-data"
                                                        action="include/delete_questions.php" method="get">
                                                        <input type="hidden" name="id" value="<?= $resArticle['id'] ?>">
                                                        <button style="font-size:16px;">Удалить</button>
                                                    </form>
                                                </td>

                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Седьмой раздел " Склад"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="stock">
                            <div class="content-stock">
                                <div class="content-stock">
                                    <h1 style="margin-bottom: 20px; color: #222528; font-size: 30px;font-weight: 400;">
                                        Количество заказанного товара:</h1>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name_game</th>
                                                <th>Quantity_stock</th>
                                                <th>Price</th>
                                                <th>Total_price</th>
                                                <th>Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--Делаем запрос на объединение таблиц `stock` и `catalog`-->
                                            <?php
                                            $sql = "SELECT stock.id, stock.quantity_stock, catalog.name_game, catalog.price, (stock.quantity_stock * catalog.price) AS total_price
                                            FROM `stock`
                                            INNER JOIN `catalog` ON stock.id = catalog.id";
                                    $totalSum = 0;
                                    $res = $mysqli -> query($sql);
                                    if($res -> num_rows > 0) {
                                    while($resArticle = $res -> fetch_assoc()) { 
                                        $totalSum += $resArticle['total_price'];                                   
                                    ?>
                                            <tr>
                                                <td class="td-id">
                                                    <?= $resArticle['id'] ?></td>
                                                <td class="td-name">
                                                    "<?= $resArticle['name_game'] ?>"</td>
                                                <td class="td-quantity_stock" style="color:#ff9c1a;">
                                                    <?= $resArticle['quantity_stock'] ?>
                                                </td>
                                                <td class="td-quantity_stock" style="color:#ff9c1a;">
                                                    <?= $resArticle['price'] ?>
                                                </td>
                                                <td class="td-quantity_stock" style="color:#ff9c1a;">
                                                    <?= $resArticle['total_price'] ?>
                                                </td>
                                                <td class="edit"><a
                                                        href="edit_stock.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php
                                                $sql = "SELECT SUM(quantity_stock) AS total_quantity FROM `stock`";
                                                $result = $mysqli->query($sql);
                                                
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $total_quantity = $row['total_quantity'];
                                                }              
                                                ?>
                                                <td colspan="6" style="font-size:25px;">Итого товаров
                                                    (штук):
                                                    <span style="font-size:25px; color: #ff9c1a;">
                                                        <?= $total_quantity ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="font-size:25px;">Общая сумма
                                                    (рубли):
                                                    <span style="font-size:25px; color: #ff9c1a;">
                                                        <?= $totalSum ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <h1 style="margin-bottom: 20px; color: #222528; font-size: 30px;font-weight: 400;">
                                        Отгруженный клиенту товар:</h1>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name_game</th>
                                                <th>Quantity_goods</th>
                                                <th>Total_price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--Делаем запрос на объединение таблиц orders` и `goods` и выводим данные-->
                                            <?php
                                            $sql = "SELECT orders.id, goods.quantity_goods, goods.name_game, goods.total_price
                                            FROM `orders`
                                            JOIN `goods` ON orders.goods_id = goods.id";
                                    $res = $mysqli -> query($sql);
                                    if($res -> num_rows > 0) {
                                    while($resArticle = $res -> fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td class="td-id">
                                                    <?= $resArticle['id'] ?></td>
                                                <td class="td-name">
                                                    "<?= $resArticle['name_game'] ?>"</td>
                                                <td class="td-quantity_goods" style="color:#ff9c1a;">
                                                    <?= $resArticle['quantity_goods'] ?>
                                                </td>
                                                <td class="td-total_price" style="color:#ff9c1a;">
                                                    <?= $resArticle['total_price'] ?>
                                                </td>

                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Восьмой раздел "Настройки сайта"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="settings">
                            <div class="content-settings">
                                <div class="content-settings">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Address</th>
                                                <th>Tel</th>
                                                <th>Email</th>
                                                <th>Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--Делаем запрос на объединение таблиц `stock` и `catalog`-->
                                            <?php
                                            $sql = "SELECT * FROM `settings`";
                                            $res = $mysqli -> query($sql);
                                            if($res -> num_rows > 0) {
                                            while($resArticle = $res -> fetch_assoc()) {
                                                ?>
                                            <tr>
                                                <td class="td-id">
                                                    <?= $resArticle['id'] ?></td>
                                                <td class="td-address">
                                                    "<?= $resArticle['address'] ?>"</td>
                                                <td class="td-tel" style="color:#ff9c1a;">
                                                    <?= $resArticle['tel'] ?>
                                                </td>
                                                <td class="td-email" style="color:#ff9c1a;">
                                                    <?= $resArticle['email'] ?>
                                                </td>
                                                <td class="edit"><a
                                                        href="edit_settings.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

    <script>
    //Для таблицы "Подарок" (для клиента)
    var checkboxes = document.querySelectorAll(
        'input[type="checkbox"][name="sent"]');
    // Добавляем обработчик события "click" для флажков:
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            // Если флажок выбран, добавляем класс "orange" для всей строки("tr-checkbox"), иначе удаляем класс:
            if (checkbox.checked) {
                checkbox.closest('.tr-checkbox').classList.add(
                    'orange');
            } else {
                checkbox.closest('.tr-checkbox').classList
                    .remove(
                        'orange');
            }
        });
    });
    </script>

    <script>
    //Для таблицы "Вопросы от клиентов"
    var checkboxes = document.querySelectorAll(
        'input[type="checkbox"][name="sent_questions"]');
    // Добавляем обработчик события "click" для флажков:
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            // Если флажок выбран, добавляем класс "orange" для всей строки("tr-checkbox"), иначе удаляем класс:
            if (checkbox.checked) {
                checkbox.closest('.tr_questions-checkbox')
                    .classList
                    .add('orange');
            } else {
                checkbox.closest('.tr_questions-checkbox')
                    .classList
                    .remove('orange');
            }
        });
    });
    </script>

    <script src="js/index.js"></script>

</body>

</html>