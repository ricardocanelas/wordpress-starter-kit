<?php

#-----------------------------------------------------------------#
# Config PHPMailer on development environment
#-----------------------------------------------------------------#


if(WP_ENV == 'development') {
    add_action('phpmailer_init', 'my_phpmailer_example');
    function my_phpmailer_example( $phpmailer ) {
        $phpmailer->IsSMTP(); // enable SMTP
        $phpmailer->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $phpmailer->SMTPAuth = true;  // authentication enabled
        $phpmailer->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->Port = 465;
        $phpmailer->Username = 'myemail@gmail.com';
        $phpmailer->Password = '**********'; // please, don't change this password. Never ever!
        $phpmailer->From = "myemail@gmail.com";
        $phpmailer->FromName = "Ricardo Canelas (" . WP_ENV . " environment)";
    }
}

