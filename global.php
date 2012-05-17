<?php
    //CC-BY Maarten Eyskens
    define('THIS', 'emailcreator');
    echo 'sorry test is closed';
    exit;
    include ('config.php');
    include ('lang.php');
    $connect = mysql_connect($host, $user, $pass) or die("Could not connect to server, error: ".mysql_error());
    mysql_select_db($db, $connect) or die("Could not connect to database, error: ".mysql_error());
    function secure($string = ''){
        return mysql_real_escape_string(stripslashes(trim(htmlspecialchars($string))));
        }
        function easyarray($query) {
        $sql=mysql_query($query);
        $array=mysql_fetch_array($sql);
        return $array;
        }
    $uip=$_SERVER['REMOTE_ADDR'];