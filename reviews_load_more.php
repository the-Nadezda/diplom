<?php
session_start();
include('include/db_connect.php')
?>

<?php
    $offset = $_GET["offset"]; // Получите значение смещения из запроса AJAX.
    
    //Делаем запрос на объединение таблиц `reviews` и `catalog`
    $sql = "SELECT reviews.*, catalog.name_game, catalog.age 
            FROM `reviews`
            INNER JOIN `catalog` ON reviews.game_title = catalog.id
            LIMIT 3 OFFSET " . $offset;
            
    $res = $mysqli->query($sql);
    if ($res->num_rows > 0) {
        while ($resArticle = $res->fetch_assoc()) {
            // Вывод новых отзывов из БД
            echo '<div class="reviews-block_card">';
            echo '<div class="reviews-block_card-top">';
            echo '<img src="' . $resArticle['photo_user'] . '" alt="фото">';
            echo '<div>';
            echo '<h2>' . $resArticle['name_user'] . '</h2>';
            echo '<h3>название игры: "' . $resArticle['name_game'] . '"</h3>';
            echo '<div class="reviews-card_top-rating">';
            echo '<span>' . $resArticle['grade'] . '</span>';
            echo '<div class="reviews-card_top-rating">';
            echo '<img src="css/image/star3.png" />';
            echo '<img src="css/image/star3.png" />';
            echo '<img src="css/image/star3.png" />';
            echo '<img src="css/image/star3.png" />';
            echo '<img src="css/image/star3.png" />';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="reviews-block_card-bottom">';
            echo '<p>' . $resArticle['comment_user'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
?>