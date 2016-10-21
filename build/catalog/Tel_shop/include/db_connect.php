<?php
defined('included') or die('Brak dostępu!');
$db_host		= 'localhost';
$db_user		= 'weles_user';
$db_pass		= '1234';
$db_database	= 'db_shop'; 

$link = mysqli_connect($db_host,$db_user,$db_pass);

mysqli_select_db($link, $db_database) or die("Brak połączenia z bazą danych ".mysqli_error($link));

mysqli_set_charset($link , 'utf8' );
?>
