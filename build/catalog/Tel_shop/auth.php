<?php
session_start();

$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
$user = json_decode($s, true);
                  
   if (strlen($user['network']) > 0 )
   {
     $_SESSION['auth_user'] = 'Autoryzowany!';
   }else
   {
     $_SESSION['auth_user'] = 'Nie autoryzowany!';
   }                 
                	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />

<style type="text/css">
#block-body{
    margin: 25px auto;
    width: 800px;
    height: 500px;
    border: 1px solid #BEBEBE;
}
</style>
    <title></title>
</head>
<body>
<div id="block-body">
<p><?php echo $_SESSION['auth_user']; ?></p>
<p>Imię -  <?php echo $user['first_name']; ?></p>
<p>Nazwisko -  <?php echo $user['last_name']; ?></p>
<p>Ресурс - <?php echo $user['network']; ?></p>

<script src="//ulogin.ru/js/ulogin.js"></script>
<div id="uLogin" data-ulogin="display=panel;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2Fdemo.shop-training.ru/auth.php"></div>
</div>
</body>
</html>
