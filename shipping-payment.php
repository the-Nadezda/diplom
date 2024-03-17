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
    <link rel="stylesheet" href="css/shipping-payment.css" />
    <title>Доставка и оплата</title>
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
                            <li class="main-promotion_title_nav_link ml-30px">Доставка и оплата</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <div class="main-promotion_title">
                        <h1>Доставка и оплата</h1>
                    </div>
                    <div class="tabs">
                        <nav class="tabs-list">
                            <button class="tabs-btn tabs_btn_active" data-tabs-path="delivery">
                                Доставка
                            </button>
                            <button class="tabs-btn" data-tabs-path="return">
                                Возврат
                            </button>
                            <button class="tabs-btn" data-tabs-path="payment">
                                Оплата
                            </button>
                        </nav>
                        <!-- Первый раздел "Доставка"-->
                        <div class="tabs-content tabs-content_active mt-88px" data-tabs-target="delivery">
                            <div class="content-delivery">
                                <!--Содержание карточки-->
                                <div class="content-delivery_card">

                                    <h1>Как получить товар?</h1>

                                    <div class="content-delivery_card-top">
                                        <div class="content-delivery_card-top_1">
                                            <h1>1</h1>
                                            <p>Заказать на сайте с доставкой Почтой России</p>
                                        </div>
                                        <div class="content-delivery_card-top_1">
                                            <h1>2</h1>
                                            <p>
                                                Заказать на сайте с доставкой Сдэк до двери или до
                                                склада
                                            </p>
                                        </div>
                                        <div class="content-delivery_card-top_1">
                                            <h1>3</h1>
                                            <p>Курьерская доставка по вашему городу</p>
                                        </div>
                                    </div>
                                    <!--Раздел про доставку Почтой России-->
                                    <div class="content-delivery_card-post_office">
                                        <h1>1. Заказать на сайте с доставкой Почтой России</h1>
                                        <p>
                                            Заказ товара осуществляется на нашем сайте либо по
                                            телефону: 8(800)500-00-00.<br />
                                            После оформления заказа с Вами свяжется наш оператор для
                                            подтверждения заказа и сверки данных.<br />
                                            Примечание: при покупке по телефону заказ подтверждается
                                            устно с оператором.
                                        </p>
                                        <h3>Стоимость доставки</h3>
                                        <div class="delivery_post_office">
                                            <div class="delivery_post_office_1 mr-15px">
                                                <h3>Заказ до 4.000 ₽</h3>
                                                <hr class="delivery_post_office_1_hr" />
                                                <p>350 ₽</p>
                                            </div>
                                            <div class="delivery_post_office_1">
                                                <h3>Заказ от 4.000 ₽</h3>
                                                <hr class="delivery_post_office_1_hr" />
                                                <p>Бесплатно</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Раздел про доставку Сдэк-->
                                    <div class="content-delivery_card-cdek">
                                        <h1>
                                            2. Заказать на сайте с доставкой Сдэк до двери или до
                                            склада
                                        </h1>
                                        <p>
                                            Доставка осуществляется по России с 9:00 до 18:00 в
                                            рабочие дни и субботу.
                                        </p>
                                        <!--Таблица-->
                                        <table class="table-cdek">
                                            <thead>
                                                <tr>
                                                    <th>Округ</th>
                                                    <th>Стоимость</th>
                                                    <th>Срок доставки</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="district">
                                                        Центральный федеральный округ, Северо-западный
                                                        федеральный округ, Южный федеральный округ,
                                                        Приволжский федеральный округ
                                                    </td>
                                                    <td class="price">300 ₽</td>
                                                    <td class="time">2-6 дней</td>
                                                </tr>
                                                <tr>
                                                    <td class="district">
                                                        Уральский федеральный округ, Сибирский федеральный
                                                        округ
                                                    </td>
                                                    <td class="price">700 ₽</td>
                                                    <td class="time">3-8 дней</td>
                                                </tr>
                                                <tr>
                                                    <td class="district">
                                                        г. Екатеринбург, Красноярск, Томск, Новосибирск
                                                    </td>
                                                    <td class="price">450 ₽</td>
                                                    <td class="time">10-14 дней</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="district">
                                                        Доставка службой Сдэк <span> до двери</span>
                                                    </td>
                                                    <td colspan="2" class="time">
                                                        +150 ₽ к базовому тарифу до пункта выдачи заказов
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <p>
                                            Если вы заказываете к определенной дате, не
                                            вписывающиеся в данные сроки, уточните у менеджера,
                                            возможно, доставку получится ускорить.
                                        </p>
                                    </div>
                                    <!--Раздел про доставку курьером-->
                                    <div class="content-delivery_card-courier">
                                        <h1>3.Наша курьерская доставка</h1>
                                        <p>
                                            Рабочие дни и суббота с 9:00 до 19:00 ч. Время прибытия
                                            курьера согласовывается с менеджером.<br />
                                            <span>Стоимость: бесплатная для заказов от 500₽. </span>
                                        </p>
                                        <h3>
                                            Доставка в другие страны обсуждается индивидуально с
                                            менеджером.
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Второй раздел "Возврат"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="return">
                            <div class="content-return">
                                <div class="content_return_card">
                                    <p class="mb-36px">
                                        Товары, реализуемые в нашем интернет-магазине,
                                        соответствуют всем требованиям и имеют все необходимые
                                        <span><a href="#">документы и сертификаты.</a></span>
                                    </p>
                                    <div class="content_return_card_text">
                                        <p>
                                            Обращаем внимание, что в момент доставки, вам необходимо
                                            внимательно осмотреть товар в присутствии курьера или
                                            сотрудника Пункта выдачи, убедиться в отсутствии
                                            механических повреждений и в соответствии заказываемой
                                            продукции! Из-за различий в настройках цветопередачи
                                            устройств оттенки могут отличаться от представленных на
                                            сайте.
                                        </p>
                                    </div>
                                    <p class="mb-48px">
                                        Помните, расписываясь в документах при получении заказа,
                                        вы подтверждаете, что забираете верный товар в целости и
                                        сохранности, и не имеете претензий к курьерской
                                        службе/пункту выдачи и магазину.
                                    </p>
                                    <p class="mb-36px">
                                        Вы имеете право отказаться от покупки без объяснения
                                        причин как после оформления заказа, так и во время
                                        доставки. Сообщите нам об отказе по телефону<span>
                                            8(800)500-00-00</span>
                                        или email – <span>pchelkashop.ru@mail.ru</span>.
                                    </p>
                                    <p>
                                        Обмен товара надлежащего качества проводится, если
                                        указанный товар не был в употреблении, сохранены его
                                        товарный вид, потребительские свойства, пломбы, фабричные
                                        ярлыки, не нарушена целостность упаковки, а также имеется
                                        товарный чек или кассовый чек либо иной подтверждающий
                                        оплату указанного товара документ.<br />
                                        В случае возврата товара уплаченная сумма возвращается за
                                        вычетом стоимости доставки после обратного получения нами
                                        товара и проведения экспертизы, в случае возврата товара с
                                        браком.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--Третий раздел "Оплата"-->
                        <div class="tabs-content tabs-content mt-88px" data-tabs-target="payment">
                            <div class="content-payment">
                                <div class="content-payment_card">

                                    <h1>1. Картой на сайте</h1>
                                    <p class="mb-48px">
                                        В нашем интернет-магазине Вы можете приобретать товар по
                                        банковской карте, оплатив заказ через сайт.
                                    </p>
                                    <h1>2. Наличная/безналичная оплата курьеру</h1>
                                    <p class="mb-48px">
                                        Оплата наличными/безналичным способом осуществляется при
                                        выдаче заказа курьером или в службе доставки.
                                    </p>
                                    <h2>
                                        Банковские карты, принимаемые в нашем инетренет-магазине
                                    </h2>
                                    <img src="css/image/paument-1.png" alt="paument" />
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
    <script src="js/index.js"></script>
</body>

</html>