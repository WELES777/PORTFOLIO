<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define('included', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php' >Strona główna</a> \ <a href='news.php' >Wiadomości</a>";
    include "include/db_connect.php";
    include "include/functions.php";
    if ($_POST["submit_news"]) {
        if ($_SESSION['add_news'] == '1') {
            if ($_POST["news_title"] == "" || $_POST["news_text"] == "") {
                $message = "<p id='form-error' >Wypełnij wszystkie pola!</p>";
            } else {
                mysqli_query($link, "INSERT INTO news(title,text,date)
            VALUES(
                            '" . $_POST["news_title"] . "',
                            '" . $_POST["news_text"] . "',
              NOW()
                )");
                $message = "<p id='form-success' >Wiadomość została dodana!</p>";
            }
        } else {
            $msgerror = 'Brak uprawnień na dodanie wiadomości!';
        }
    }
    $id     = clear_string($link, $_GET["id"]);
    $action = $_GET["action"];
    if (isset($action)) {
        switch ($action) {
            case 'delete':
                if ($_SESSION['delete_news'] == '1') {
                    $delete = mysqli_query($link, "DELETE FROM news WHERE id = '$id'");
                } else {
                    $msgerror = 'Brak uprawnień na usunięcie wiadomości!';
                }
                break;
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
    <link href="fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>
    <script type="text/javascript" src="fancybox/jquery.fancybox.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".news").fancybox({
        'scrolling' : 'no',
        'padding' : 25,
        'centerOnScroll' :true
        });
});
</script>
  <title>Panel zarządzania - Wiadomości</title>
</head>
<body>
<div id="block-body">
<?php
include "include/block-header.php";
    $all_count    = mysqli_query($link, "SELECT * FROM news");
    $result_count = mysqli_num_rows($all_count);
    ?>
<div id="block-content">
<div id="block-parameters">
<p id="count-client" >Wszystkich wiadomości - <strong><?php echo $result_count; ?></strong></p>
<p align="right" id="add-style"><a class="news" href="#news" >Dodać wiadomość</a></p>
</div>
<?php
if (isset($msgerror)) {
        echo '<p id="form-error" align="center">' . $msgerror . '</p>';
    }
    if ($message != "") {
        echo $message;
    }
    $result = mysqli_query($link, "SELECT * FROM news ORDER BY id DESC");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        do {
            echo '
<div class="block-news">
<h3>' . $row["title"] . '</h3>
<span>' . $row["date"] . '</span>
<p>' . $row["text"] . '</p>
<p class="links-actions" align="right" ><a class="delete" rel="news.php?id=' . $row["id"] . '&action=delete" >Usunąć</a></p>
</div>
    ';
        } while ($row = mysqli_fetch_array($result));
    }
    ?>
<div id="news">
<form method="post">
<div id="block-input">
 <label>Nagłówek </label><input type="text" name="news_title" />
 <label>Wiadomość </label><textarea name="news_text" ></textarea>
</div>
<p align="right">
<input type="submit" name="submit_news" id="submit_news" value="Dodać" />
</p>
</form>
</div>
</div>
</div>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>
