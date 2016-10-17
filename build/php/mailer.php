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
   
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
            http_response_code(400);
            echo __("Oops! There was a problem with your submission. Please complete the form and try again.");
            exit;
        }

     
        $recipient = "vasia.wendetta@gmail.com";

        $subject = "New contact from $name";

        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        $email_headers = "From: $name <$email>";

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