<?php
session_start();
require 'header.php';
require 'global.php';
    //ITL CPANEL EMAIL CREATOR
    //CC-BY MAARTEN EYSKENS
    //All used code snipsets used where under public domain

$key= secure($_GET['id']);
$sql= "SELECT * FROM `confirm` WHERE `confid`='$key'";
$sql= mysql_query($sql);
$sql= mysql_fetch_array($sql);
    if (empty($sql)){
    echo 'invalid key';
    $fp = fopen('hacktries.txt', 'a+');
       fwrite($fp, "$uip \n");
    include ('footer.php');
    exit;
    }
@require 'api.php' ;
$ip = 'localhost';
$xmlapi = new xmlapi($ip);
$xmlapi->password_auth($cpuser,$cppass);
$xmlapi->set_output('json');
$euser=$sql['user'];
$epass=$sql['pass'];
$uemail=$sql['email'];
$xmlapi = new xmlapi($ip);

//set port number. cpanel client class allow you to access WHM as well using WHM port.
$xmlapi->set_port($port);                        

// authorization with password. Not as secure as hash.
$xmlapi->password_auth($cpuser, $cppass);   

// cpanel email addpop function Parameters
$call = array(domain=>$emaildomain, email=>$euser,password=>$epass, quota=>$quota);


//output to error file  set to 1 to see
$xmlapi->set_debug(0);      
error_log.

// making call to cpanel api
$result = $xmlapi->api2_query($cpuser, "Email", "addpop", 
$call);
    if ($result){
    echo $lang['done'];
    mysql_query("DELETE FROM `confirm` WHERE `confid`='$key'");
    mysql_query("INSERT INTO `email`.`emails` (`user`, `ip`, `email`) VALUES ('$euser', '$uip', '$uemail');");
    }else{
    echo $lang['error2'];
    }
     

