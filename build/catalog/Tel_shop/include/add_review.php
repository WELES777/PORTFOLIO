<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('included', true);
    include "db_connect.php";
    include "../functions/functions.php";

    $id      = clear_string($link, $_POST['id']);
    $name    = iconv("UTF-8", "cp1250", clear_string($link, $_POST['name']));
    $good    = iconv("UTF-8", "cp1250", clear_string($link, $_POST['good']));
    $bad     = iconv("UTF-8", "cp1250", clear_string($link, $_POST['bad']));
    $comment = iconv("UTF-8", "cp1250", clear_string($link, $_POST['comment']));

    mysqli_query($link, "INSERT INTO table_reviews(products_id,name,good_reviews,bad_reviews,comment,date)
						VALUES(
                            '" . $id . "',
                            '" . $name . "',
                            '" . $good . "',
                            '" . $bad . "',
                            '" . $comment . "',
                             NOW()
						)");

    echo 'yes';
}
