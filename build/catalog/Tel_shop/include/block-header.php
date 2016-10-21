<?php
	defined('included') or die('Brak dostępu!');
?>

<div id="block-header">

<div id="header-top-block">

<ul id="header-top-menu">
<li>Wasze miasto - <span>Warszawa</span></li>
<li><a href="o-nas.php">O nas</a></li>
<li><a href="magaziny.php">Nasze sklepy</a></li>
<li><a href="feedback.php">Kontakt</a></li>
</ul>


<?php

if ($_SESSION['auth'] == 'yes_auth')
{
 
 echo '<p id="auth-user-info" align="right"><img src="/images/user.png" />Cześć, '.$_SESSION['auth_name'].'!</p>';   
    
}else{
 
  echo '<p id="reg-auth-title" align="right"><a class="top-auth">Zaloguj</a><a href="registration.php">Rejestracja</a></p>';   
    
}
	
?>


<div id="block-top-auth">

<div class="corner"></div>

<form method="post">


<ul id="input-email-pass">

<h3>Zaloguj</h3>

<p id="message-auth">Nieprawidłowy Login lub Hasło</p>

<li><center><input type="text" id="auth_login" placeholder="Login lub E-mail" /></center></li>
<li><center><input type="password" id="auth_pass" placeholder="Hasło" /><span id="button-pass-show-hide" class="pass-show"></span></center></li>

<ul id="list-auth">
<li><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme">Zapamiętaj mnie</label></li>
<li><a id="remindpass" href="#">nie pamiętasz hasła?</a></li>
</ul>


<p align="right" id="button-auth" ><a>Zaloguj</a></p>

<p align="right" class="auth-loading"><img src="/images/loading.gif" /></p>

</ul>
</form>


<div id="block-remind">
<h3>Przypomnij<br /> hasło</h3>
<p id="message-remind" class="message-remind-success" ></p>
<center><input type="text" id="remind-email" placeholder="Wasz E-mail" /></center>
<p align="right" id="button-remind" ><a>Gotowe</a></p>
<p align="right" class="auth-loading" ><img src="/images/loading.gif" /></p>
<p id="prev-auth">Wstecz</p>
</div>



</div>

</div>

<div id="top-line"></div>

<div id="block-user" >
<div class="corner2"></div>
<ul>
<li><img src="/images/user_info.png" /><a href="profile.php">Profil</a></li>
<li><img src="/images/logout.png" /><a id="logout" >Wyloguj</a></li>
</ul>
</div>



<img id="img-logo" src="/images/logo.png" />

<div id="personal-info">
<p align="right">Skontaktuj się z nami</p>
<h3 align="right">812 258 633</h3>
 <img src="/images/phone-icon.png" />
<p align="right">Godziny otwarcia:</p>
<p align="right">Poniedziałek - Sobota: 8:00 - 21:00</p>
<p align="right">Niedziela: 9:00 - 19:00</p>
 <img src="/images/time-icon.png" />
</div>

<div id="block-search">
<form method="GET" action="search.php?q=" >
<span></span>
<input type="text" id="input-search" name="q" placeholder="Wpisz nazwę produktu" value="<?php echo $search; ?>" />
<input type="submit" id="button-search" value="Wyszukaj" />
</form>

<ul id="result-search">


</ul>

</div>
</div>

<div id="top-menu">
<ul>
<li><img src="/images/shop.png" /><a href="index.php">Strona główna</a></li>
<li><img src="/images/new-32.png" /><a href="view_aystopper.php?go=news">Nowości</a></li>
<li><img src="/images/bestprice-32.png" /><a href="view_aystopper.php?go=leaders">Lider sprzedaż</a></li>
<li><img src="/images/sale-32.png" /><a href="view_aystopper.php?go=sale">Wyprzedaż</a></li>
</ul>
<p align="right" id="block-basket"><img src="/images/cart-icon.png" /><a href="cart.php?action=oneclick" >Koszyk pusty</a></p>
<div id="nav-line"></div>
</div>
