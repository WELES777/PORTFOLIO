<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('included', true);    
include("db_connect.php");
include("../functions/functions.php");

$email = clear_string($link,$_POST["email"]);

if ($email != "")
{
    
   $result = mysqli_query($link, "SELECT email FROM reg_user WHERE email='$email'");
If (mysqli_num_rows($result) > 0)
{
    

    $newpass = fungenpass();
    

    $pass   = md5($newpass);
    $pass   = strrev($pass);
    $pass   = strtolower("9nm2rv8q".$pass."2yo6z");    

$update = mysqli_query ("UPDATE reg_user SET pass='$pass' WHERE email='$email'");

    

   
	         send_mail( 'vasia.wendetta@gmail.com',
			             $email,
						'Nowe hasło dla strony pm_shop.pl',
						'Wasze hasło: '.$newpass);   
   
   echo 'yes';
    
}else
{
    echo 'Nie prawidłowy email!';
}

}
else
{
    echo 'Podaj swój email';
}

}



?>
