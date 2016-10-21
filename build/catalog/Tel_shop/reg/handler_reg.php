<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    define('included', true);
    include "../include/db_connect.php";
    include "../functions/functions.php";

    $error = array();

    $login   = iconv("UTF-8", "cp1250", strtolower(clear_string($link, $_POST['reg_login'])));
    $pass    = iconv("UTF-8", "cp1250", strtolower(clear_string($link, $_POST['reg_pass'])));
    $surname = iconv("UTF-8", "cp1250", clear_string($link, $_POST['reg_surname']));

    $name  = iconv("UTF-8", "cp1250", clear_string($link, $_POST['reg_name']));
    $email = iconv("UTF-8", "cp1250", clear_string($link, $_POST['reg_email']));

    $phone   = iconv("UTF-8", "cp1250", clear_string($link, $_POST['reg_phone']));
    $address = iconv("UTF-8", "cp1250", clear_string($link, $_POST['reg_address']));

    if (strlen($login) < 5 or strlen($login) > 15) {
        $error[] = "Login ma być od 5 do 15 symboli!";
    } else {
        $result = mysqli_query($link, "SELECT login FROM reg_user WHERE login = '$login'");
        if (mysqli_num_rows($result) > 0) {
            $error[] = "Login zajęty!";
        }

    }

    if (strlen($pass) < 7 or strlen($pass) > 15) {
        $error[] = "Podaj hasło od 7 do 15 symboli!";
    }

    if (strlen($surname) < 3 or strlen($surname) > 20) {
        $error[] = "Podaj hasło od 3 do 20 symboli!";
    }

    if (strlen($name) < 3 or strlen($name) > 15) {
        $error[] = "Podaj imię od 3 do 15 symboli !";
    }

    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim($email))) {
        $error[] = "Podja prawidłowy email!";
    }

    if (!$phone) {
        $error[] = "Podaj numer telefonu!";
    }

    if (!$address) {
        $error[] = "Podaj aders dostawy!";
    }

    if ($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha'])) {
        $error[] = "Nie prawidłowy kod ze zdjęcia!";
    }

    unset($_SESSION['img_captcha']);

    if (count($error)) {

        echo implode('<br />', $error);

    } else {
        $pass = md5($pass);
        $pass = strrev($pass);
        $pass = "9nm2rv8q" . $pass . "2yo6z";

        $ip = $_SERVER['REMOTE_ADDR'];

        mysqli_query($link, "   INSERT INTO reg_user(login,pass,surname,name,email,phone,address,datetime,ip)
                        VALUES(

                            '" . $login . "',
                            '" . $pass . "',
                            '" . $surname . "',
                            '" . $name . "',
                            '" . $email . "',
                            '" . $phone . "',
                            '" . $address . "',
                            NOW(),
                            '" . $ip . "'
                        )");

        echo 'true';
    }

}
