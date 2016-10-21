<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define('included', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php' >Strona główna</a> \ <a href='orders.php' >Zamówienia</a>";
    include "include/db_connect.php";
    include "include/functions.php";
    $sort = $_GET["sort"];
    switch ($sort) {
        case 'all-orders':
            $sort      = "order_id DESC";
            $sort_name = 'Od A do Z';
            break;
        case 'confirmed':
            $sort      = "order_confirmed = 'yes' DESC";
            $sort_name = 'Opracowane';
            break;
        case 'no-confirmed':
            $sort      = "order_confirmed = 'no' DESC";
            $sort_name = 'Nie opracowane';
            break;
        default:
            $sort      = "order_id DESC";
            $sort_name = 'Od A do Z';
            break;
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
  <title>Panel zarządzania - Zamówienia</title>
</head>
<body>
<div id="block-body">
<?php
include "include/block-header.php";
    $all_count        = mysqli_query($link, "SELECT * FROM orders");
    $all_count_result = mysqli_num_rows($all_count);
    $buy_count        = mysqli_query($link, "SELECT * FROM orders WHERE order_confirmed = 'yes'");
    $buy_count_result = mysqli_num_rows($buy_count);
    $no_buy_count        = mysqli_query($link, "SELECT * FROM orders WHERE order_confirmed = 'no'");
    $no_buy_count_result = mysqli_num_rows($no_buy_count);
    ?>
<div id="block-content">
<div id="block-parameters">
<ul id="options-list">
<li>Sortować</li>
<li><a id="select-links" href="#"><?echo $sort_name; ?></a>
<ul id="list-links-sort">
<li><a href="orders.php?sort=all-orders">Od A do Z</a></li>
<li><a href="orders.php?sort=confirmed">Opracowane</a></li>
<li><a href="orders.php?sort=no-confirmed">Nie opracowane</a></li>
</ul>
</li>
</ul>
</div>
<div id="block-info">
<ul id="review-info-count">
<li>Wszystkich zamówień - <strong><?echo $all_count_result; ?></strong></li>
<li>Opracowane - <strong><?echo $buy_count_result; ?></strong></li>
<li>Nie opracowane - <strong><?echo $no_buy_count_result; ?></strong></li>
</ul>
</div>
<?php
$result = mysqli_query($link, "SELECT * FROM orders ORDER BY $sort");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        do {
            if ($row["order_confirmed"] == 'yes') {
                $status = '<span class="green">Opracowany</span>';
            } else {
                $status = '<span class="red">Nie opracowany</span>';
            }
            echo '
 <div class="block-order">
  <p class="order-datetime" >' . $row["order_datetime"] . '</p>
  <p class="order-number" >zamówienie № ' . $row["order_id"] . ' - ' . $status . '</p>
  <p class="order-link" ><a class="green" href="view_order.php?id=' . $row["order_id"] . '" >Szczegóły</a></p>
 </div>
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
