<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define('included', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php' >Strona główna</a> \ <a href='category.php' >Kategorie</a>";
    include "include/db_connect.php";
    include "include/functions.php";
    if ($_POST["submit_cat"]) {
        if ($_SESSION['add_category'] == '1') {
            $error = array();
            if (!$_POST["cat_type"]) {
                $error[] = "Podaj typ otwaru!";
            }
            if (!$_POST["cat_model"]) {
                $error[] = "Podaj nazwę kategorii!";
            }
            if (count($error)) {
                $_SESSION['message'] = "<p id='form-error'>" . implode('<br />', $error) . "</p>";
            } else {
                $cat_type  = clear_string($link,$_POST["cat_type"]);
                $cat_model = clear_string($link,$_POST["cat_model"]);
                mysqli_query($link, "INSERT INTO category(type,model)
            VALUES(
                            '" . $cat_type . "',
                            '" . $cat_model . "'
            )");
                $_SESSION['message'] = "<p id='form-success'>Kategoria została dodana!</p>";
            }
        } else {
            $msgerror = 'Brak uprawnień na dodanie kategorii!';
        }
    }
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  <title>Panel zarządzania - Kategorie</title>
</head>
<body>
<div id="block-body">
<?php
include "include/block-header.php";
    ?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >Kategorii</p>
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
<form method="post">
<ul id="cat_products">
<li>
<label>Kategorie</label>
<div>
<?php
if ($_SESSION['delete_category'] == '1') {
        echo '<a class="delete-cat">Usunąć</a>';
    }
    ?>
</div>
<select name="cat_type" id="cat_type" size="10">
<?php
$result = mysqli_query($link, "SELECT * FROM category ORDER BY type DESC");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        do {
            echo '
       <option value="' . $row["id"] . '" >' . $row["type"] . ' - ' . $row["model"] . '</option>
    ';
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
</select>
</li>
<li>
<label>Typ towaru</label>
<input type="text" name="cat_type" />
</li>
<li>
<label>Model</label>
<input type="text" name="cat_model" />
</li>
</ul>
<p align="right"><input type="submit" name="submit_cat" id="submit_form" /></p>
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
