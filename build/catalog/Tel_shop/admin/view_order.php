<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define('included', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php' >Strona główna</a> \ <a href='view_order.php' >Przegląd zamówień</a>";
    include "include/db_connect.php";
    include "include/functions.php";
    $id     = clear_string($link,$_GET["id"]);
    $action = $_GET["action"];
    if (isset($action)) {
        switch ($action) {
            case 'accept':
                if ($_SESSION['accept_orders'] == '1') {
                    $update = mysqli_query($link, "UPDATE orders SET order_confirmed='yes' WHERE order_id = '$id'");
                } else {
                    $msgerror = 'Brak uprawnień na potwierdzenie zamówień!';
                }
                break;
            case 'delete':
                if ($_SESSION['delete_orders'] == '1') {
                    $delete = mysqli_query($link, "DELETE FROM orders WHERE order_id = '$id'");
                    header("Location: orders.php");
                } else {
                    $msgerror = 'Brak uprawnień na usuwanie zamówień!';
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
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>
  <title>Panel zarządzania - Przegląd zamówień</title>
</head>
<body>
<div id="block-body">
<?php
include "include/block-header.php";
    ?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >Przegląd zamówienia</p>
</div>
<?php
if (isset($msgerror)) {
        echo '<p id="form-error" align="center">' . $msgerror . '</p>';
    }
    if ($_SESSION['view_orders'] == '1') {
        $result = mysqli_query($link, "SELECT * FROM orders WHERE order_id = '$id'");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            do {
                if ($row["order_confirmed"] == 'yes') {
                    $status = '<span class="green">Opracowany</span>';
                } else {
                    $status = '<span class="red">Nie opracowany</span>';
                }
                echo '
  <p class="view-order-link" ><a class="green" href="view_order.php?id=' . $row["order_id"] . '&action=accept" >Potwierdzić zamówienie</a> | <a class="delete" rel="view_order.php?id=' . $row["order_id"] . '&action=delete" >Usunąć zamówienie</a></p>
  <p class="order-datetime" >' . $row["order_datetime"] . '</p>
  <p class="order-number" >zamówienie № ' . $row["order_id"] . ' - ' . $status . '</p>
<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>№</TH>
<TH>Nazwa towaru</TH>
<TH>Cena</TH>
<TH>Ilość</TH>
</TR>
';
                $query_product = mysqli_query($link, "SELECT * FROM buy_products,table_products WHERE buy_products.buy_id_order = '$id' AND table_products.products_id = buy_products.buy_id_product");
                $result_query = mysqli_fetch_array($query_product);
                do {
                    $price       = $price + ($result_query["price"] * $result_query["buy_count_product"]);
                    $index_count = $index_count + 1;
                    echo '
 <TR>
<TD  align="CENTER" >' . $index_count . '</TD>
<TD  align="CENTER" >' . $result_query["title"] . '</TD>
<TD  align="CENTER" >' . $result_query["price"] . ' zł</TD>
<TD  align="CENTER" >' . $result_query["buy_count_product"] . '</TD>
</TR>
';
                } while ($result_query = mysqli_fetch_array($query_product));
                if ($row["order_pay"] == "accepted") {
                    $statpay = '<span class="green">Opłacono</span>';
                } else {
                    $statpay = '<span class="red">Nie opłacono</span>';
                }
                echo '
</TABLE>
<ul id="info-order">
<li>Końcowa cena - <span>' . $price . '</span> zł</li>
<li>Sposób dostawy - <span>' . $row["order_delivery"] . '</span></li>
<li>Status opłaty - ' . $statpay . '</li>
<li>Typ opłaty - <span>' . $row["order_type_pay"] . '</span></li>
<li>Data opłaty - <span>' . $row["order_datetime"] . '</span></li>
</ul>
<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>Imię</TH>
<TH>Nazwisko</TH>
<TH>Adres</TH>
<TH>Kontakt</TH>
<TH>Uwagi</TH>
</TR>
 <TR>
<TD  align="CENTER" >' . $row["order_name"] . '</TD>
<TD  align="CENTER" >' . $row["order_surname"] . '</TD>
<TD  align="CENTER" >' . $row["order_address"] . '</TD>
<TD  align="CENTER" >' . $row["order_phone"] . '</br>' . $row["order_email"] . '</TD>
<TD  align="CENTER" >' . $row["order_note"] . '</TD>
</TR>
</TABLE>
 ';
            } while ($row = mysqli_fetch_array($result));
        }
    } else {
        echo '<p id="form-error" align="center">Brak uprawnień na przegląd tego rozdziału!</p>';
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
