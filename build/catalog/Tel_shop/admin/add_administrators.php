<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define('included', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php' >Strona Główna</a> \ <a href='add_administrators.php' >Dodanie administratora</a>";
    include "include/db_connect.php";
    include "include/functions.php";
    if ($_POST["submit_add"]) {
        if ($_SESSION['auth_admin_login'] == 'admin') {
            $error = array();
            if ($_POST["admin_login"]) {
                $login = clear_string($link,$_POST["admin_login"]);
                $query = mysqli_query($link, "SELECT login FROM reg_admin WHERE login='$login'");
                if (mysqli_num_rows($query) > 0) {
                    $error[] = "Login zajęty!";
                }
            } else {
                $error[] = "Podaj login!";
            }
            if (!$_POST["admin_pass"]) {
                $error[] = "Podaj hasł!";
            }
            if (!$_POST["admin_firstname"]) {
                $error[] = "Podaj imię!";
            }
            if (!$_POST["admin_lastname"]) {
                $error[] = "Podaj stanowisko!";
            }
            if (!$_POST["admin_role"]) {
                $error[] = "Podaj stanowisko!";
            }
            if (!$_POST["admin_email"]) {
                $error[] = "Podaj E-mail!";
            }
            if (count($error)) {
                $_SESSION['message'] = "<p id='form-error'>" . implode('<br />', $error) . "</p>";
            } else {
                $pass = md5(clear_string($link,$_POST["admin_pass"]));
                $pass = strrev($pass);
                $pass = strtolower("mb03foo51" . $pass . "qj2jjdp9");
                mysqli_query($link, "INSERT INTO reg_admin(login,pass,firstname,lastname,role,email,phone,view_orders,accept_orders,delete_orders,add_tovar,edit_tovar,delete_tovar,accept_reviews,delete_reviews,view_clients,delete_clients,add_news,delete_news,add_category,delete_category,view_admin)
                        VALUES(
                            '" . clear_string($link,$_POST["admin_login"]) . "',
                            '" . $pass . "',
                            '" . clear_string($link,$_POST["admin_firstname"]) . "',
                            '" . clear_string($link,$_POST["admin_lastname"]) . "',
                            '" . clear_string($link,$_POST["admin_role"]) . "',
                            '" . clear_string($link,$_POST["admin_email"]) . "',
                            '" . clear_string($link,$_POST["admin_phone"]) . "',
                            '" . $_POST["view_orders"] . "',
                            '" . $_POST["accept_orders"] . "',
                            '" . $_POST["delete_orders"] . "',
                            '" . $_POST["add_tovar"] . "',
                            '" . $_POST["edit_tovar"] . "',
                            '" . $_POST["delete_tovar"] . "',
                            '" . $_POST["accept_reviews"] . "',
                            '" . $_POST["delete_reviews"] . "',
                            '" . $_POST["view_clients"] . "',
                            '" . $_POST["delete_clients"] . "',
                            '" . $_POST["add_news"] . "',
                            '" . $_POST["delete_news"] . "',
                            '" . $_POST["add_category"] . "',
                            '" . $_POST["delete_category"] . "',
                            '" . $_POST["view_admin"] . "'
                        )");
                $_SESSION['message'] = "<p id='form-success'>Użytkownik został dodany!</p>";
            }
        } else {
            $msgerror = 'Brak uprawnień na dodanie administratorów!';
        }
    }
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>
    <title>Panel zarządzania - Klienci</title>
</head>
<body>
<div id="block-body">
<?php
include "include/block-header.php";
    ?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >Dodanie administratora</p>
</div>
<?php
if (isset($msgerror)) {
        echo '<p id="form-error" align="center">' . $msgerror . '</p>';
    }
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
<form method="post" id="form-info" >
<ul id="info-admin">
<li><label>Login</label><input type="text" name="admin_login" /></li>
<li><label>Hasło</label><input type="password" name="admin_pass" /></li>
<li><label>Imię</label><input type="text" name="admin_firstname" /></li>
<li><label>Nazwisko</label><input type="text" name="admin_lastname" /></li>
<li><label>Stanowisko</label><input type="text" name="admin_role" /></li>
<li><label>E-mail</label><input type="text" name="admin_email" /></li>
<li><label>Telefon</label><input type="text" name="admin_phone" /></li>
</ul>
<h3 id="title-privilege" >Uprawnienia</h3>
<p id="link-privilege"><a id="select-all" >Wybrać wszystko</a> | <a id="remove-all" >Usunąć wszystko</a></p>
<div class="block-privilege">
<ul class="privilege">
<li><h3>Zamówienia</h3></li>
<li>
<input type="checkbox" name="view_orders" id="view_orders" value="1" />
<label for="view_orders">Przegląd zamóweń.</label>
</li>
<li>
<input type="checkbox" name="accept_orders" id="accept_orders" value="1" />
<label for="accept_orders">Opracowanie zamówień.</label>
</li>
<li>
<input type="checkbox" name="delete_orders" id="delete_orders" value="1" />
<label for="delete_orders">Usunięcie zamówień.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Towary</h3></li>
<li>
<input type="checkbox" name="add_tovar" id="add_tovar" value="1" />
<label for="add_tovar">Dodanie towarów.</label>
</li>
<li>
<input type="checkbox" name="edit_tovar" id="edit_tovar" value="1" />
<label for="edit_tovar">Redukowanie towarów.</label>
</li>
<li>
<input type="checkbox" name="delete_tovar" id="delete_tovar" value="1" />
<label for="delete_tovar">Usunięcie towarów.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Opinii</h3></li>
<li>
<input type="checkbox" name="accept_reviews" id="accept_reviews" value="1" />
<label for="accept_reviews">Moderowanie opinii.</label>
</li>
<li>
<input type="checkbox" name="delete_reviews" id="delete_reviews" value="1" />
<label for="delete_reviews">Usunięcie opinii.</label>
</li>
</ul>
</div>
<div class="block-privilege">
<ul class="privilege">
<li><h3>Klienci</h3></li>
<li>
<input type="checkbox" name="view_clients" id="view_clients" value="1" />
<label for="view_clients">Przegląd klientów.</label>
</li>
<li>
<input type="checkbox" name="delete_clients" id="delete_clients" value="1" />
<label for="delete_clients">Usunięcie klientów.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Wiadomości</h3></li>
<li>
<input type="checkbox" name="add_news" id="add_news" value="1" />
<label for="add_news">Dodanie wiadomości.</label>
</li>
<li>
<input type="checkbox" name="delete_news" id="delete_news" value="1" />
<label for="delete_news">Usunięcie wiadomości.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Kategorie</h3></li>
<li>
<input type="checkbox" name="add_category" id="add_category" value="1" />
<label for="add_category">Dodanie kategorii.</label>
</li>
<li>
<input type="checkbox" name="delete_category" id="delete_category" value="1" />
<label for="delete_category">Usunięcie kategorii.</label>
</li>
</ul>
</div>
<div class="block-privilege">
<ul class="privilege">
<li><h3>Administratorzy</h3></li>
<li>
<input type="checkbox" name="view_admin" id="view_admin" value="1" />
<label for="view_admin">Przegląd administratorów.</label>
</li>
</ul>
</div>
<p align="right"><input type="submit" id="submit_form" name="submit_add" value="Dodać"/></p>
</form>
</div>
</div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>
