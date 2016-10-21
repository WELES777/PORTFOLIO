<?php
session_start();
define('included', true);
include "include/db_connect.php";
include "include/functions.php";
if ($_POST["submit_enter"]) {
    $login = clear_string($link, $_POST["input_login"]);
    $pass  = clear_string($link, $_POST["input_pass"]);
    if ($login && $pass) {
        // $pass = md5($pass);
        // $pass = strrev($pass);
        // $pass = strtolower("mb03foo51" . $pass . "qj2jjdp9");
        $result = mysqli_query($link, "SELECT * FROM reg_admin WHERE login = '$login' AND pass = '$pass'");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['auth_admin']       = 'yes_auth';
            $_SESSION['auth_admin_login'] = $row["login"];
            $_SESSION['admin_role'] = $row["role"];
            $_SESSION['accept_orders'] = $row["accept_orders"];
            $_SESSION['delete_orders'] = $row["delete_orders"];
            $_SESSION['view_orders']   = $row["view_orders"];
            $_SESSION['delete_tovar'] = $row["delete_tovar"];
            $_SESSION['add_tovar']    = $row["add_tovar"];
            $_SESSION['edit_tovar']   = $row["edit_tovar"];
            $_SESSION['accept_reviews'] = $row["accept_reviews"];
            $_SESSION['delete_reviews'] = $row["delete_reviews"];
            $_SESSION['view_clients']   = $row["view_clients"];
            $_SESSION['delete_clients'] = $row["delete_clients"];
            $_SESSION['add_news']    = $row["add_news"];
            $_SESSION['delete_news'] = $row["delete_news"];
            $_SESSION['add_category']    = $row["add_category"];
            $_SESSION['delete_category'] = $row["delete_category"];
            $_SESSION['view_admin'] = $row["view_admin"];
            header("Location: index.php");
        } else {
            $msgerror = "Login, e-mail lub hasło są nieprawidłowe.";
        }
    } else {
        $msgerror = "Uzupełnij wszystkie pola!";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
  <title>Panel zarządzania - Wejście</title>
</head>
<body>
<div id="block-pass-login" >
<?php
if ($msgerror) {
    echo '<p id="msgerror" >' . $msgerror . '</p>';
}
?>
<form method="post" >
<ul id="pass-login">
<li><label>Login</label><input type="text" name="input_login" /></li>
<li><label>Hasło</label><input type="password" name="input_pass" /></li>
</ul>
<p align="right"><input type="submit" name="submit_enter" id="submit_enter" value="Zaloguj" /></p>
</form>
</div>
</body>
</html>
