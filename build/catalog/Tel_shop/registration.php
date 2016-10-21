<?php
define('included', true);
include "include/db_connect.php";
include "functions/functions.php";
session_start();
include "include/auth_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="/js/shop-script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>

    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
	<script type="text/javascript">
	//----- fix-------
	var matched, browser;

	jQuery.uaMatch = function( ua ) {
		ua = ua.toLowerCase();

		var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
		/(webkit)[ \/]([\w.]+)/.exec( ua ) ||
		/(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
		/(msie) ([\w.]+)/.exec( ua ) ||
		ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
		[];

		return {
			browser: match[ 1 ] || "",
			version: match[ 2 ] || "0"
		};
	};

	matched = jQuery.uaMatch( navigator.userAgent );
	browser = {};

	if ( matched.browser ) {
		browser[ matched.browser ] = true;
		browser.version = matched.version;
	}

if ( browser.chrome ) {
	browser.webkit = true;
} else if ( browser.webkit ) {
	browser.safari = true;
}

jQuery.browser = browser;
//-------------------
$(document).ready(function() {	
	$('#form_reg').validate(
	{	

		rules:{
			"reg_login":{
				required:true,
				minlength:5,
				maxlength:15,
				remote: {
					type: "POST",    
					url: "/reg/check_login.php"
				}
			},
			"reg_pass":{
				required:true,
				minlength:7,
				maxlength:15
			},
			"reg_surname":{
				required:true,
				minlength:3,
				maxlength:15
			},
			"reg_name":{
				required:true,
				minlength:3,
				maxlength:15
			},


			"reg_email":{
				required:true,
				email:true
			},
			"reg_phone":{
				required:true
			},
			"reg_address":{
				required:true
			},
			"reg_captcha":{
				required:true,
				remote: {
					type: "post",    
					url: "/reg/check_captcha.php"

				}

			}
		},



					messages:{
						"reg_login":{
							required:"Login zajęty!",
                            minlength:"Od 5 do 15 symboli!",
                            maxlength:"Od 5 do 15 symboli!",
                            remote: "Login zajęty!"
						},
						"reg_pass":{
							required:"Podaj hasło!",
                            minlength:"Od 7 do 15 symboli!",
                            maxlength:"Od 7 do 15 symboli!"
						},
						"reg_surname":{
							required:"Podaj nazwisko!",
                            minlength:"Od 3 do 15 symboli!",
                            maxlength:"Od 3 do 15 symboli!"
						},
						"reg_name":{
							required:"Podaj imię!",
                            minlength:"Od 3 do 15 symboli!",
                            maxlength:"Od 3 do 15 symboli!"
						},

						"reg_email":{
						    required:"Podaj swój E-mail",
							email:"Email nie jest prawidłowy"
						},
						"reg_phone":{
							required:"Podaj numer telefonu!"
						},
						"reg_address":{
							required:"Masz podać adres dostawy!"
						},
						"reg_captcha":{
							required:"Podaj kod ze zdjęcia!",
                            remote: "Wpisany kod nie jest prawidłowy!"
						}
					},

	submitHandler: function(form){
	$(form).ajaxSubmit({
	success: function(data) {

        if (data == 'true')
    {
       $("#block-form-registration").fadeOut(300,function() {

        $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Jesteś pomyślnie zarejestrowany!");
        $("#form_submit").hide();

       });

    }
    else
    {
       $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
    }
		}
			});
			}
			});
    });

</script>

    <title>Rejestracja</title>
</head>
<body>

<div id="block-body">
<?php
include "include/block-header.php";
?>
<div id="block-right">
<?php
include "include/block-category.php";
include "include/block-parameter.php";
include "include/block-news.php";
?>
</div>
<div id="block-content">

<h2 class="h2-title">Rejestracja</h2>
<form method="post" id="form_reg" action="/reg/handler_reg.php">
<p id="reg_message"></p>
<div id="block-form-registration">
<ul id="form-registration">

<li>
<label>Login</label>
<span class="star" >*</span>
<input type="text" name="reg_login" id="reg_login" />
</li>

<li>
<label>Hasło</label>
<span class="star" >*</span>
<input type="text" name="reg_pass" id="reg_pass" />
<span id="genpass">Zgenerować</span>
</li>

<li>
<label>Nazwisko</label>
<span class="star" >*</span>
<input type="text" name="reg_surname" id="reg_surname" />
</li>

<li>
<label>Imię</label>
<span class="star" >*</span>
<input type="text" name="reg_name" id="reg_name" />
</li>

<li>
<label>E-mail</label>
<span class="star" >*</span>
<input type="text" name="reg_email" id="reg_email" />
</li>

<li>
<label>Telefon</label>
<span class="star" >*</span>
<input type="text" name="reg_phone" id="reg_phone" />
</li>

<li>
<label>Adres dostawy</label>
<span class="star" >*</span>
<input type="text" name="reg_address" id="reg_address" />
</li>

<li>
<div id="block-captcha">

<img src="/reg/reg_captcha.php" />
<input type="text" name="reg_captcha" id="reg_captcha" />

<p id="reloadcaptcha">Aktualizować</p>
</div>
</li>

</ul>
</div>

<p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Rejestracja" /></p>

</form>

</div>

<?php
include "include/block-footer.php";
?>
</div>

</body>
</html>
