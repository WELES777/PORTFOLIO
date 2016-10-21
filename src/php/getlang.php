<?php
require_once("php/lib/streams.php");
require_once("php/lib/gettext.php");
// $locale_lang = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
// $selected_lang = array("pl_PL","uk_UA");
// if(in_array($locale_lang, $selected_lang))? return true : $locale_lang = "en_US";
// $locale_file = new FileReader("locale/$locale_lang/LC_MESSAGES/messages.mo");
 // $locale_lang = $_GET['lang'];
$locale_lang = "en_US";
$locale_file = new FileReader("php/locale/$locale_lang/LC_MESSAGES/messages.mo");

$locale_fetch = new gettext_reader($locale_file);

function __($text){
	global $locale_fetch;
	return $locale_fetch->translate($text);
}

// For only js catalog translation
//  $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
// switch($lang) {
//     case "de-DE":
//     case "pl_PL":
//     case "ua_UK":
//     case "ru_RU":
//         header("Location: http://www.vasyldemianiuk.com/$lang/index.php");
//         break;
//     default:
//         header("Location: http://www.vasyldemianiuk.com/en-US/index.php");
//         break;
// }
 ?>
