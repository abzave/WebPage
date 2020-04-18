<?php

    class MailSender{

        private $header;
        private $toMail;
        private $subject; 
        private static $instance;

        private function __construct(){
            $this->header = "MIME-Version: 1.0\r\n" . 
                            "Content-type: text/html; charset=iso-8859-1\r\n";
            $this->toMail = "your_email";
            $this->subject = "Correo de ";
        }

        public static function getInstance(){
            if(!MailSender::$instance){
                MailSender::$instance = new MailSender();
            }
            return MailSender::$instance;
        }

        public function send($name, $from, $content){
            $finalHeader = $this->header . "From: $name < $from >\r\n";
            $finalSubject = $this->subject . "$name ($from)";
            mail($this->toMail, $finalSubject, $content, $finalHeader);
        }

    }

?>