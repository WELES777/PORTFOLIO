<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define('included', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php' >Strona główna</a> \ <a href='edit_administrators.php' >Zmiana administratora</a>";
    include "include/db_connect.php";
    include "include/functions.php";
    $id = clear_string($link,$_GET["id"]);
    if ($_POST["submit_edit"]) {
        if ($_SESSION['auth_admin_login'] == 'admin') {
            $error = array();
            if (!$_POST["admin_login"]) {
                $error[] = "Podaj login!";
            }
            if ($_POST["admin_pass"]) {
                $pass = md5(clear_string($link,$_POST["admin_pass"]));
                $pass = strrev($pass);
                $pass = "pass='" . strtolower("mb03foo51" . $pass . "qj2jjdp9") . "',";
            }
            if (!$_POST["admin_firstname"]) {
                $error[] = "Podaj imię!";
            }
            if (!$_POST["admin_lastname"]) {
                $error[] = "Podaj nazwisko!";
            }
            if (!$_POST["admin_role"]) {
                $error[] = "Podaj nazwe stanowiska!";
            }
            if (!$_POST["admin_email"]) {
                $error[] = "Podaj E-mail!";
            }
            if (count($error)) {
                $_SESSION['message'] = "<p id='form-error'>" . implode('<br />', $error) . "</p>";
            } else {
                $querynew = "login='{$_POST["admin_login"]}',$pass firstname='{$_POST["admin_firstname"]}', lastname='{$_POST["admin_lastname"]}',role='{$_POST["admin_role"]}',email='{$_POST["admin_email"]}',phone='{$_POST["admin_phone"]}',view_orders='{$_POST["view_orders"]}',accept_orders='{$_POST["accept_orders"]}',delete_orders='{$_POST["delete_orders"]}',add_tovar='{$_POST["add_tovar"]}',edit_tovar='{$_POST["edit_tovar"]}',delete_tovar='{$_POST["delete_tovar"]}',accept_reviews='{$_POST["accept_reviews"]}',delete_reviews='{$_POST["delete_reviews"]}',view_clients='{$_POST["view_clients"]}',delete_clients='{$_POST["delete_clients"]}',add_news='{$_POST["add_news"]}',delete_news='{$_POST["delete_news"]}',add_category='{$_POST["add_category"]}',delete_category='{$_POST["delete_category"]}',view_admin='{$_POST["view_admin"]}'";
                $update = mysqli_query($link, "UPDATE reg_admin SET $querynew WHERE id = '$id'");
                $_SESSION['message'] = "<p id='form-success'>Użytkownik został zmieniony!</p>";
            }
        } else {
            $msgerror = 'Brak uprawnień do zmiany administratorów!';
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
  <title>Panel zarządzania - Zmiana Administratora</title>
</head>
<body>
<div id="block-body">
<?php
include "include/block-header.php";
    ?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >Zmiana Administratora</p>
</div>
<?php
if (isset($msgerror)) {
        echo '<p id="form-error" align="center">' . $msgerror . '</p>';
    }
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    $result = mysqli_query($link, "SELECT * FROM reg_admin WHERE id='$id'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        do {
            if ($row["view_orders"] == "1") {
                $view_orders = "checked";
            }
            if ($row["accept_orders"] == "1") {
                $accept_orders = "checked";
            }
            if ($row["delete_orders"] == "1") {
                $delete_orders = "checked";
            }
            if ($row["add_tovar"] == "1") {
                $add_tovar = "checked";
            }
            if ($row["edit_tovar"] == "1") {
                $edit_tovar = "checked";
            }
            if ($row["delete_tovar"] == "1") {
                $delete_tovar = "checked";
            }
            if ($row["accept_reviews"] == "1") {
                $accept_reviews = "checked";
            }
            if ($row["delete_reviews"] == "1") {
                $delete_reviews = "checked";
            }
            if ($row["view_clients"] == "1") {
                $view_clients = "checked";
            }
            if ($row["delete_clients"] == "1") {
                $delete_clients = "checked";
            }
            if ($row["add_news"] == "1") {
                $add_news = "checked";
            }
            if ($row["delete_news"] == "1") {
                $delete_news = "checked";
            }
            if ($row["view_admin"] == "1") {
                $view_admin = "checked";
            }
            if ($row["add_category"] == "1") {
                $add_category = "checked";
            }
            if ($row["delete_category"] == "1") {
                $delete_category = "checked";
            }
            echo '
<form method="post" id="form-info" >
<ul id="info-admin">
<li><label>Login</label><input type="text" name="admin_login" value="' . $row["login"] . '" /></li>
<li><label>Hasło</label><input type="password" name="admin_pass"  /></li>
<li><label>Imię</label><input type="text" name="admin_firstname" value="' . $row["name"] . '" /></li>
<li><label>Nazwisko</label><input type="text" name="admin_lastname" value="' . $row["surname"] . '" /></li>
<li><label>Stanowisko</label><input type="text" name="admin_role" value="' . $row["role"] . '" /></li>
<li><label>E-mail</label><input type="text" name="admin_email" value="' . $row["email"] . '" /></li>
<li><label>Telefon</label><input type="text" name="admin_phone" value="' . $row["phone"] . '" /></li>
</ul>
<h3 id="title-privilege" >Uprawnienia</h3>
<p id="link-privilege"><a id="select-all" >Wybrać wszystko</a> | <a id="remove-all" >Usunąć wszystko</a></p>
<div class="block-privilege">
<ul class="privilege">
<li><h3>Zamówienia</h3></li>
<li>
<input type="checkbox" name="view_orders" id="view_orders" value="1" ' . $view_orders . ' />
<label for="view_orders">Przegląd zamówień.</label>
</li>
<li>
<input type="checkbox" name="accept_orders" id="accept_orders" value="1" ' . $accept_orders . ' />
<label for="accept_orders">Opracowanie zamówień.</label>
</li>
<li>
<input type="checkbox" name="delete_orders" id="delete_orders" value="1" ' . $delete_orders . ' />
<label for="delete_orders">Usuwanie zamówień.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Towary</h3></li>
<li>
<input type="checkbox" name="add_tovar" id="add_tovar" value="1" ' . $add_tovar . ' />
<label for="add_tovar">Dodać towar.</label>
</li>
<li>
<input type="checkbox" name="edit_tovar" id="edit_tovar" value="1" ' . $edit_tovar . ' />
<label for="edit_tovar">Zmienić towar.</label>
</li>
<li>
<input type="checkbox" name="delete_tovar" id="delete_tovar" value="1" ' . $delete_tovar . ' />
<label for="delete_tovar">Usunąć towar.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Opinie</h3></li>
<li>
<input type="checkbox" name="accept_reviews" id="accept_reviews" value="1" ' . $accept_reviews . ' />
<label for="accept_reviews">Moderacja komentarzy.</label>
</li>
<li>
<input type="checkbox" name="delete_reviews" id="delete_reviews" value="1" ' . $delete_reviews . ' />
<label for="delete_reviews">Usuwanie opinii.</label>
</li>
</ul>
</div>
<div class="block-privilege">
<ul class="privilege">
<li><h3>Klienci</h3></li>
<li>
<input type="checkbox" name="view_clients" id="view_clients" value="1" ' . $view_clients . ' />
<label for="view_clients">Przegląd klientów.</label>
</li>
<li>
<input type="checkbox" name="delete_clients" id="delete_clients" value="1" ' . $delete_clients . ' />
<label for="delete_clients">Usuwanie klientów.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Wiadomości</h3></li>
<li>
<input type="checkbox" name="add_news" id="add_news" value="1" ' . $add_news . ' />
<label for="add_news">Dodawanie wiadomości.</label>
</li>
<li>
<input type="checkbox" name="delete_news" id="delete_news" value="1" ' . $delete_news . ' />
<label for="delete_news">Usuwanie wiadomości.</label>
</li>
</ul>
<ul class="privilege">
<li><h3>Kategorie</h3></li>
<li>
<input type="checkbox" name="add_category" id="add_category" value="1" ' . $add_category . ' />
<label for="add_category">Dodawanie kategorii.</label>
</li>
<li>
<input type="checkbox" name="delete_category" id="delete_category" value="1" ' . $delete_category . ' />
<label for="delete_category">Usuwanie kategorii.</label>
</li>
</ul>
</div>
<div class="block-privilege">
<ul class="privilege">
<li><h3>Administratorzy</h3></li>
<li>
<input type="checkbox" name="view_admin" id="view_admin" value="1" ' . $view_admin . ' />
<label for="view_admin">Przegląd listy administratorów.</label>
</li>
</ul>
</div>
<p align="right"><input type="submit" id="submit_form" name="submit_edit" value="Zapisać"/></p>
</form>
';
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</div>
</div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>
