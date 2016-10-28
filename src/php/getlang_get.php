<?php
require_once("lib/streams.php");
require_once("lib/gettext.php");
// $locale_lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
// $selected_lang = array("pl_PL","en_US");
// $locale_lang = in_array($locale_lang, $selected_lang) ?  $locale_lang : "en_US";
$locale_lang = $_GET['lang'];

$locale_file = new FileReader("locale/$locale_lang/LC_MESSAGES/messages.mo");

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
