<?php
defined('included') or die('Brak dostępu!');
$result1 = mysqli_query($link, "SELECT * FROM orders WHERE order_confirmed='no'");
$count1  = mysqli_num_rows($result1);
if ($count1 > 0) {$count_str1 = '<p>+' . $count1 . '</p>';} else { $count_str1 = '';}
$result2 = mysqli_query($link, "SELECT * FROM table_reviews WHERE moderat='0'");
$count2  = mysqli_num_rows($result2);
if ($count2 > 0) {$count_str2 = '<p>+' . $count2 . '</p>';} else { $count_str2 = '';}
?>
<div id="block-header">
<div id="block-header1" >
<h3>Telecommunication-SHOP. Panel zarządzania</h3>
<p id="link-nav" ><?php echo $_SESSION['urlpage']; ?></p>
</div>
<div id="block-header2" >
<p align="right"><a href="administrators.php" >Administratorzy</a> | <a href="?logout">Wyloguj</a></p>
<p align="right">Cześć - <span><?php echo $_SESSION['admin_role']; ?></span></p>
</div>
</div>
<div id="left-nav">
<ul>
<li><a href="orders.php">Zamówienia</a><?php echo $count_str1; ?></li>
<li><a href="tovar.php">Towary</a></li>
<li><a href="reviews.php">Komentarze</a><?php echo $count_str2; ?></li>
<li><a href="category.php">Kategorie</a></li>
<li><a href="clients.php">Klienci</a></li>
<li><a href="news.php">Wiadomości</a></li>
</ul>
</div>
