<?php
session_start();
include ('header.php');
include ('global.php');
    if (empty($_SESSION['email'])){
       echo 'You should not be here!'; 
       $fp = fopen('hacktries.txt', 'a+');
       fwrite($fp, "$uip \n");
       include ('footer.php');
       exit;
        }
$to=$_SESSION['email'];
$uname=$_SESSION['name'];
$user=$_SESSION['user'];
$pass=$_SESSION['pass'];
    while ($num=rand(0,10000000000)){
$confid=md5($num);
$sql="SELECT * FROM `confirm` WHERE `confid`='$confid'";
$sql=mysql_query($sql);
$sql=mysql_fetch_array($sql);
        if (empty($sql)){
        mysql_query("INSERT INTO `confirm` (`id`, `name`, `user`, `pass`, `email`, `confid`) VALUES (NULL, '$uname', '$user', '$pass', '$to', '$confid');");
        break;
        }
    }
    $body = "Hello $uname \n You have singed up for a $name email address \n If it was not you please ignore this email. \n If it was you please click on the link below: \n $url/email.php?id=$confid ";;
 if (mail($to, $subject, $body)) {
   echo $lang['emailsent'];
  } else {
   echo $lang['error1'];
  }
$_SESSION['email']="";
$_SESSION['name']="";
$_SESSION['user']="";
$_SESSION['pass']="";
include ('footer.php');
?>

    
    

     
