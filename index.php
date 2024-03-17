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

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>ПчелкаШоп</title>
</head>

<body>

    <?php
    // Подключаем файл NAV.PHP
    include('include/header.php');
    ?>
    <!--MAIN-->
    <main>
        <!--Main-top (верхняя часть - картинка)-->
        <div class="main-top">
            <!--Картинка-->
            <div class="main-top_image">
                <img src="css/image/kids.jpg" alt="kids" />
            </div>
            <div class="container">
                <div class="container-main-top">
                    <h1>Квест в коробке – объединяет семью и друзей в поисках разгадки</h1>
                    <p>
                        Подготовка до 10 минут, прохождение 60-90 минут, яркие эмоции -
                        надолго!
                    </p>
                    <form action="catalog.php">
                        <button class="btn-choose_game center">Выбрать игру</button>
                    </form>
                </div>
            </div>
        </div>
        <!--Раздел/секция "Акции"-->
        <section class="main-promotion">
            <div class="container">
                <div class="main-promotion_title">
                    <h3>Новейшие акции</h3>
                    <a href="news.php">Смотреть все акции</a>
                </div>

                <!-- Слайдер -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!--ПЕРВАЯ КАРТОЧКА-->
                        <div class="swiper-slide">
                            <div class="swiper-slide_1">
                                <!--Левая часть карточки-->
                                <div class="swiper-slide_left background-slide_1">
                                    <h2>-15%</h2>
                                </div>
                                <!--Правая часть карточки-->
                                <div class="swiper-slide_rights">
                                    <a class="swiper-slide_rights_title" href="#">Скидка -15% на груп...</a>
                                    <a class="swiper-slide_rights_text" href="#">Получите скидку -15% при <br />
                                        оформлении группового заказа в период с <br />
                                        1 января 2021 г. по 19...</a>
                                </div>
                            </div>
                        </div>
                        <!--ВТОРАЯ КАРТОЧКА-->
                        <div class="swiper-slide">
                            <div class="swiper-slide_1">
                                <!--Левая часть карточки-->
                                <div class="swiper-slide_left background-slide_2">
                                    <h2>-15%</h2>
                                </div>
                                <!--Правая часть карточки-->
                                <div class="swiper-slide_rights">
                                    <a class="swiper-slide_rights_title" href="#">Скидка -15% на груп...</a>
                                    <a class="swiper-slide_rights_text" href="#">Получите скидку -15% при <br />
                                        оформлении группового заказа в период с <br />
                                        1 января 2021 г. по 19...</a>
                                </div>
                            </div>
                        </div>
                        <!--ТРЕТЬЯ КАРТОЧКА-->
                        <div class="swiper-slide">
                            <div class="swiper-slide_1">
                                <!--Левая часть карточки-->
                                <div class="swiper-slide_left background-slide_1">
                                    <h2>-15%</h2>
                                </div>
                                <!--Правая часть карточки-->
                                <div class="swiper-slide_rights">
                                    <a class="swiper-slide_rights_title" href="#">Скидка -15% на груп...</a>
                                    <a class="swiper-slide_rights_text" href="#">Получите скидку -15% при <br />
                                        оформлении группового заказа в период с <br />
                                        1 января 2021 г. по 19...</a>
                                </div>
                            </div>
                        </div>
                        <!--ЧЕТВЕРТАЯ КАРТОЧКА-->
                        <div class="swiper-slide">
                            <div class="swiper-slide_1">
                                <!--Левая часть карточки-->
                                <div class="swiper-slide_left background-slide_2">
                                    <h2>-15%</h2>
                                </div>
                                <!--Правая часть карточки-->
                                <div class="swiper-slide_rights">
                                    <a class="swiper-slide_rights_title" href="#">Скидка -15% на груп...</a>
                                    <a class="swiper-slide_rights_text" href="#">Получите скидку -15% при <br />
                                        оформлении группового заказа в период с <br />
                                        1 января 2021 г. по 19...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Конец Слайдера-->
            </div>
        </section>
        <hr />
        <!--Раздел "Каталог игр"-->
        <section class="main-catalog">
            <div class="container">
                <div class="main-promotion_title">
                    <h1>Каталог игр</h1>
                    <a href="catalog.php">Смотреть все игры</a>
                </div>
                <div class="main-promotion_title">
                    <h3 class="mb-10px">Популярные игры</h3>
                </div>
                <!--Карточки-->
                <div class="catalog">
                    <?php
                    $sql = "SELECT * FROM `catalog` LIMIT 3";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?>
                    <!--Первая карточка-->
                    <div class="catalog-card">
                        <div class="catalog-card_top">
                            <div class="catalog-card_top_image">
                                <img class="mb-20px" src="<?= $resArticle['image'] ?>" alt="board-game" />
                                <div class="catalog-card_top_image_text">
                                    <h3>Возраст: <span><?= $resArticle['age'] ?></span></h3>
                                </div>
                            </div>
                            <div class="catalog-card_title">
                                <a href="#">
                                    <h2>"<?= $resArticle['name_game'] ?>"</h2>
                                </a>
                            </div>
                            <div class="catalog-card_description">
                                <img src="css/image/time.svg" alt="time">
                                <h3>Время игры:</h3>
                                <p><?= $resArticle['time'] ?></p>
                            </div>
                            <div class="catalog-card_description">
                                <img src="css/image/players.svg" alt="number of players">
                                <h3>Количество игроков:</h3>
                                <p><?= $resArticle['quantity'] ?></p>
                            </div>
                            <div class="catalog-card_description">
                                <img src="css/image/ball.svg" alt="ball">
                                <h3>Места:</h3>
                                <p><?= $resArticle['site'] ?></p>
                            </div>
                            <div class="catalog-card_description">
                                <img src="css/image/category.svg" alt="category">
                                <h3>Категория:</h3>
                                <p><?= $resArticle['category'] ?></p>
                            </div>

                            <div class="catalog-card_description mb-16px">
                                <img src="css/image/complexity.svg" alt="complexity">
                                <h3>Сложность:</h3>
                                <p><?= $resArticle['complication'] ?> </p>
                            </div>
                            <h1><?= $resArticle['price'] ?> ₽</h1>
                        </div>
                        <!--Кнопка "Добавить в корзину"-->
                        <!--Кнопку <button> вкладываем внутрь элемента <form> и для формы указываем атрибут action с адресом веб-страницы. Дополнительно можно добавить атрибут target со значением _blank, тогда веб-страница откроется в новой вкладке браузера.-->
                        <form action="#" target="_blank">
                            <button class="btn-add_to_basket hvr-float-shadow center">
                                Добавить в корзину
                            </button>
                        </form>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </section>
        <!--Раздел " Видео"-->
        <section class="main-video">
            <div class="video">
                <iframe width="928" height="522" src="https://www.youtube.com/embed/tP-c4aIGGW4"
                    title='Интересные задания для квестов. Рекомендации от "Квестикс"' frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            </div>
            <img class="main-video_img_boy" src="css/image/boy.png" alt="boy" />
            <img class="main-video_img_cloud" src="css/image/Frame.png" alt="cloud" />
            <img class="main-video_img_boy_1" src="css/image/boy_1.png" alt="boy" />
            <img class="main-video_img_cloud_1" src="css/image/cloud.png" alt="cloud" />
            <img class="main-video_img_children" src="css/image/free-png.ru-71.png" alt="children" />
        </section>
        <!--Раздел/секция "Квест"-->
        <section class="main-quest">
            <div class="container">
                <h1 class="main-quest_title">
                    Квест – возможность подарить <br />
                    детям незабываемые эмоции!
                </h1>
                <!--Блок с карточками-->
                <div class="main-quest-card">
                    <!--Первая карточка-->
                    <div class="main-quest-card_1 mb-36px">
                        <div class="main-quest-card_1-img">
                            <img src="css/image/friends.png" alt="friends" />
                        </div>
                        <div class="main-quest-card_1-text">
                            <h2>Объединяет семью и друзей в поисках одной разгадки!</h2>
                        </div>
                    </div>
                    <!--Вторая карточка-->
                    <div class="main-quest-card_1 mb-36px">
                        <div class="main-quest-card_1-img">
                            <img src="css/image/self-regulation.png" alt="self-regulation" />
                        </div>
                        <div class="main-quest-card_1-text">
                            <h2>Развивает логику и последовательное мышление!</h2>
                        </div>
                    </div>
                    <!--Третья карточка-->
                    <div class="main-quest-card_1">
                        <div class="main-quest-card_1-img">
                            <img src="css/image/baby.png" alt="baby" />
                        </div>
                        <div class="main-quest-card_1-text">
                            <h2>
                                Заменит аниматора на празднике и обеспечит мероприятие на 5+!
                            </h2>
                        </div>
                    </div>
                    <!--Четвертая карточка-->
                    <div class="main-quest-card_1">
                        <div class="main-quest-card_1-img">
                            <img src="css/image/emotions.png" alt="emotions" />
                        </div>
                        <div class="main-quest-card_1-text">
                            <h2>Все необходимое - уже есть в коробке!</h2>
                        </div>
                    </div>
                </div>
                <form action="catalog.php">
                    <button class="btn-choose_game">Выбрать игру</button>
                </form>
            </div>
        </section>
        <hr />
        <!--Раздел/секция "Вопросы"-->
        <section class="main-questions">
            <div class="container">
                <h1 class="main-quest_title mb-87px">Часто задаваемые вопросы</h1>

                <!--Первый вопрос и ответ-->
                <div class="main-question-answer mb-36px">
                    <div class="main-question-answer_1">
                        <button class="btn-answer" onclick="toggleContent(1)">+</button>
                        <h1 class="main-question-answer_title">Что такое игра-квест?</h1>
                    </div>
                    <p class="answer">
                        Квест (от англ. «Quest – поиск») – это интерактивная игра с
                        сюжетной линией, которая заключается в решении различных
                        головоломок и логических заданий.
                    </p>
                </div>
                <!--Второй вопрос и ответ-->
                <div class="main-question-answer mb-36px">
                    <div class="main-question-answer_1">
                        <button class="btn-answer" onclick="toggleContent(2)">+</button>
                        <h1 class="main-question-answer_title">
                            Сколько длится такая игра?
                        </h1>
                    </div>
                    <p class="answer">
                        Чаще всего, квест в реальности длится 60 минут. Но есть и те,
                        которые ограничены 40 минутами или, наоборот, 90. Тут всё зависит,
                        опять же-таки от того, насколько сложный квест и сколько игроков в
                        него могут играть одновременно.
                    </p>
                </div>
                <!--Третий вопрос и ответ-->
                <div class="main-question-answer mb-36px">
                    <div class="main-question-answer_1">
                        <button class="btn-answer" onclick="toggleContent(3)">+</button>
                        <h1 class="main-question-answer_title">А это сложно?</h1>
                    </div>
                    <p class="answer">
                        Вам будут попадаться загадки разного уровня сложности, но вы с
                        легкостью справитесь с ними, используя логику, память и
                        внимательность. А если у вас возникают сложности, мы всегда
                        подскажем, на что обратить внимание.
                    </p>
                </div>
                <!--Четвертый вопрос и ответ-->
                <div class="main-question-answer mb-36px">
                    <div class="main-question-answer_1">
                        <button class="btn-answer" onclick="toggleContent(4)">+</button>
                        <h1 class="main-question-answer_title">
                            Сколько участников требуется?
                        </h1>
                    </div>
                    <p class="answer">
                        Оптимальной считается команда из 4-6 человек. Но в некоторых
                        случаях справиться можно и вдвоем. Главное при прохождении квеста
                        большой командой − правильно распределить усилия, не сбиваться в
                        кучу, а стараться расходиться по всему помещению в поисках
                        загадок.
                    </p>
                </div>
                <!--Пятый вопрос и ответ-->
                <div class="main-question-answer mb-36px">
                    <div class="main-question-answer_1">
                        <button class="btn-answer" onclick="toggleContent(5)">+</button>
                        <h1 class="main-question-answer_title">
                            Почему квесты такие популярные?
                        </h1>
                    </div>
                    <p class="answer">
                        Квесты тренируют интеллект, а иногда и тело, развлекают,
                        объединяют, раскрепощают, снимают стресс после утомительного дня,
                        обеспечивают выброс адреналина и массу эмоций.
                    </p>
                </div>
                <!--Шестой вопрос и ответ-->
                <div class="main-question-answer mb-87px">
                    <div class="main-question-answer_1">
                        <button class="btn-answer" onclick="toggleContent(6)">+</button>
                        <h1 class="main-question-answer_title">
                            Вы поможете подобрать игру?
                        </h1>
                    </div>
                    <p class="answer">
                        Наша команда всегда поможет найти то, что по душе лично Вам!
                    </p>
                </div>
                <!--Форма-->
                <form action="catalog.php">
                    <button class="btn-choose_game">Перейти в каталог</button>
                </form>
            </div>
        </section>
        <hr />
        <section class="main-reviews">
            <div class="container">
                <div class="main-promotion_title">
                    <h1>Отзывы о наших играх</h1>
                    <a href="reviews.php">Смотреть все отзывы</a>
                </div>
                <div class="main-promotion_title">
                    <h3 class="mb-10px">Последние отзывы</h3>
                </div>
                <!--Карточки с отзывами-->
                <div class="main-reviews_card">
                    <!--Первая карточка-->
                    <?php
                    $sql = "SELECT * FROM `reviews` LIMIT 2";
                    $res = $mysqli -> query($sql);
                    if($res -> num_rows > 0) {
                    while($resArticle = $res -> fetch_assoc()) {
                    ?>
                    <div class="reviews-card mr-15px ">
                        <div class="reviews-card_top">
                            <img class="reviews-card_top_img mr-24px" src="<?= $resArticle['photo_user'] ?>"
                                alt="photo_girl" />
                            <div class="reviews-card_top-text">
                                <h2 class="mb-10px"><?= $resArticle['name_user'] ?></h2>
                                <!--Рейтинг-->
                                <div class="reviews-card_top-rating">
                                    <span><?= $resArticle['grade'] ?></span>
                                    <div class="reviews-card_top-rating-img">
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                        <img src="css/image/star3.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-card_bottom">
                            <p>
                                <?= $resArticle['comment_user'] ?>
                            </p>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </section>
        <!-- Кнопка "Есть вопросы?" -->
        <button class="btn-ask" id="myButton">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="38" viewBox="0 0 40 38" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M40 17.4056C40 27.0185 31.045 34.8113 20 34.8113C18.0191 34.814 16.0465 34.5581 14.1325 34.0504C12.6725 34.7864 9.32 36.1988 3.68 37.1188C3.18 37.1984 2.8 36.6812 2.9975 36.2187C3.8825 34.1399 4.6825 31.37 4.9225 28.8436C1.86 25.7852 0 21.7819 0 17.4056C0 7.79276 8.955 0 20 0C31.045 0 40 7.79276 40 17.4056ZM17.985 14.3373C18.2025 14.6456 18.3925 14.9838 18.5525 15.3344C19.6225 17.6916 19.535 21.2448 16.1975 24.5494C15.9938 24.7469 15.7219 24.8595 15.4375 24.8641C15.153 24.8687 14.8776 24.765 14.6675 24.5743C14.5651 24.482 14.4827 24.3698 14.4255 24.2447C14.3683 24.1196 14.3375 23.9841 14.3349 23.8467C14.3323 23.7092 14.3581 23.5727 14.4105 23.4456C14.463 23.3184 14.5411 23.2033 14.64 23.1072C15.6875 22.0728 16.32 21.0409 16.6625 20.0737C15.99 20.484 15.1925 20.7202 14.3375 20.7202C11.9375 20.7202 10 18.8652 10 16.5776C10 14.29 11.94 12.4326 14.335 12.4326C15.0125 12.4326 15.655 12.5818 16.225 12.8454L16.245 12.8553C16.6675 13.0294 17.0625 13.3079 17.4175 13.6609C17.63 13.8673 17.82 14.0936 17.985 14.3373ZM27.5 20.0737C26.8275 20.484 26.03 20.7202 25.175 20.7202C22.78 20.7202 20.8375 18.8652 20.8375 16.5776C20.8375 14.29 22.78 12.4326 25.1725 12.4326C25.85 12.4326 26.4925 12.5818 27.0625 12.8454L27.0825 12.8553C27.5075 13.0294 27.9 13.3079 28.255 13.6609C28.4675 13.8673 28.6575 14.0936 28.8225 14.3373C29.04 14.6456 29.2325 14.9838 29.3925 15.3344C30.4625 17.6916 30.3725 21.2448 27.0375 24.5494C26.8337 24.7476 26.5612 24.8607 26.2762 24.8653C25.9912 24.8699 25.7152 24.7658 25.505 24.5743C25.4026 24.482 25.3202 24.3698 25.263 24.2447C25.2058 24.1196 25.175 23.9841 25.1724 23.8467C25.1698 23.7092 25.1956 23.5727 25.248 23.4456C25.3005 23.3184 25.3786 23.2033 25.4775 23.1072C26.5275 22.0728 27.1575 21.0409 27.5025 20.0737H27.5Z"
                    fill="#f2b236" />
            </svg>
            Есть вопросы?<br />
            Напишите нам
        </button>
        <!--Модальное окно-->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">×</span>
                <form id="questionForm" enctype="multipart/form-data" method="post" action="include/questions.php">
                    <div>
                        <label class="paument-label"
                            style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;" for="name">Ваше
                            имя:</label>
                        <input class="form_input" type="text" id="name" name="name"
                            value="<?php echo $_SESSION['name'] ?>" required />
                    </div>
                    <div>
                        <label class="paument-label"
                            style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;"
                            for="phone">Телефон для связи (формат:+7 900 000 00 00):</label>
                        <input class="form_input" type="tel" id="phone" name="phone"
                            value="<?php echo $_SESSION['phone'] ?>" required />
                    </div>
                    <div>
                        <label class="paument-label"
                            style=" display: block; margin-bottom:10px; font-size:22px; color:#db4e66;" for="text">Ваш
                            вопрос:</label>
                        <textarea name="question" value="<?php echo $_SESSION['question'] ?>" required></textarea>
                    </div>
                    <input class="btn-choose_game" type="submit" value="Отправить" />
                </form>
            </div>
        </div>
    </main>

    <!--FOOTER-->
    <?php
    include('include/footer.php');
    ?>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 30,
    });
    </script>

    <script>
    /* Модальное окно ("Есть вопросы?Напишите нам") */
    // Найти элементы кнопки, модального окна и элемента закрытия
    var btn = document.getElementById("myButton");
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    // При клике на кнопку отобразить модальное окно
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // При клике на элемент закрытия скрыть модальное окно
    span.onclick = function() {
        modal.style.display = "none";
    }

    // При клике вне модального окна скрыть его
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

    <script src="js/index.js"></script>
</body>

</html>