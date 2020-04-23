<?php

    require_once("MailSender.php");

    if(isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["message"])){
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        if(!empty($name) && !empty($lastname) && !empty($message) && !empty($_POST["email"]) && !empty($mail)){
            $sender = MailSender::getInstance();
            $sender->send($name . " " . $lastname, $mail, $message);
            header("location:" . $_SERVER['HTTP_REFERER']);
        }
    }   

    echo "<html>\n" . 
            "\t<head>\n" . 
                "\t\t<style>\n" . 
                    "\t\t\tbody{\n" . 
                        "\t\t\t\tbackground-color: #262626;\n" . 
                    "\t\t\t}\n" . 
                "\t\t</style>\n" . 
            "\t</head>\n" . 
            "\t<body>\n" . 
                "\t\t<h1 align='center' style='color: #F9F871; margin-top: 45vh;'>Error al enviar el mensaje :(</h1>\n" . 
            "\t\t</body>\n" . 
        "</html>";

?>