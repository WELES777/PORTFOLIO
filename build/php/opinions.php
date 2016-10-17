<?php
require_once("lib/streams.php");
require_once("lib/gettext.php");

 $locale_lang = $_GET['lang'];

$locale_file = new FileReader("locale/$locale_lang/LC_MESSAGES/messages_.mo");
$locale_fetch = new gettext_reader($locale_file);
    function __($text){
    global $locale_fetch;
    return $locale_fetch->translate($text);
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        $fname = strip_tags(trim($_POST["fname"]));
                $fname = str_replace(array("\r","\n"),array(" "," "),$fname);
        $position = strip_tags(trim($_POST["position"]));
				$position = str_replace(array("\r","\n"),array(" "," "),$position);
        
        $opinion = trim($_POST["opinion"]);

        
        if (empty($opinion) ) {
       
            http_response_code(400);
           echo __("Oops! There was a problem with your submission. Please complete the form and try again.");
            exit;
        }

     
        $recipient = "vasia.wendetta@gmail.com";

        $subject = "New opinion from $fname";

        $email_content = "Name: $fname\n";
        $email_content = "Position: $position\n";
        $email_content .= "Opinion:\n$opinion\n";
        $email_headers = "From: $fname";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
             echo __("Thank You! Your message has been sent.");
        } else {
            http_response_code(500);
           echo __("Oops! Something went wrong and we couldn't send your message.");
        }

    } else {
        http_response_code(403);
       echo __("There was a problem with your submission, please try again.");
    }

?>