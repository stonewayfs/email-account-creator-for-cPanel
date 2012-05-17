<?php
    //CC-BY Maarten Eyskens
    if (!defined('THIS')) {
    echo "Sorry, you can't hack us this way";
    exit;
}
    
    //edit your settings here
    
    
    $host='localhost'; //your MySQL host
    $user='user'; //your MySQL user
    $pass='pass'; //your MySQL password
    $db='db'; //your MySQL database
    $name='name'; //your site name
    $emaildomain='imstr.tk'; //your email domain without @
    $cpuser='cpuser'; //your cPanel username
    $cppass='cppass';//your cPanel password
    $port =2083; //cPanel port
    $ip = "127.0.0.1";  // should be server IP address or 127.0.0.1 if local server
    $url='http://example.com/register/'; //the register url
    $publickey = "6LdpYdESAAAAAJwa9bJYaCrMqLB_jp1z6TvhyMcR"; //ReCaptcha public key
    $privatekey = "6LdpYdESAAAAAKeXLBJf7gRGLIu14lZXOyILDao2"; //ReCaptcha private key
    $subject = "Confirm your $name email address"; //confirm email subject
    $quota =500; //inbox quota in MB
    
    
    