<?php

    require_once("MailSender.php");
    $sender = MailSender::getInstance();
    $sender->send($_POST["name"] . " " . $_POST["lastname"], $_POST["email"], $_POST["message"]);
    header("location:/html/contact.html");

?>