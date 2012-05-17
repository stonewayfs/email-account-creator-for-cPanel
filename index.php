<?php
session_start();
include ('header.php');

    //ITL CPANEL EMAIL CREATOR
    //CC-BY MAARTEN EYSKENS
    //All used code snipsets used where under public domain
include('global.php');
require_once('recaptchalib.php');
$resp = null;
$error = null;
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);
$user=secure($_POST['user']);
$uemail=secure($_POST['email']);
$sql="SELECT * FROM `emails` WHERE `user`='$user'";
$sql2="SELECT * FROM `emails` WHERE `email`='$uemail'";
$sql=mysql_query($sql);
$sql=mysql_fetch_array($sql);
$sql2=mysql_query($sql2);
$sql2=mysql_fetch_array($sql2);
        if ($resp->is_valid) {
                          if (empty($_POST['name'])){
                          echo $lang['entername'];
                          }elseif(empty($_POST['email'])){
                          echo $lang['enteremail'];
                          }elseif(empty($_POST['user'])){
                          echo $lang['enteruser'];
                          }elseif(empty($_POST['pass1'])){
                          echo $lang['enterpass'];
                          }elseif(empty($_POST['pass2'])){
                          echo $lang['enterpass2'];
                          }elseif($_POST['pass1'] != $_POST['pass2']){
                          echo $lang['nopassmatch'];
                          }elseif(!empty($sql)){
                          echo $lang['userinuse'];
                          }elseif(!empty($sql1)){
                          echo $lang['emailinuse'];
                          }else{
                              $_SESSION['name']=secure($_POST['name']);
                              $_SESSION['email']=secure($_POST['email']);
                              $_SESSION['user']=secure($_POST['user']);
                              $_SESSION['pass']=secure($_POST['pass1']);
                              ?>
                              <script type="text/javascript">
<!--
    window.location = "./confirm.php"
//-->
</script>
                              <?php
                              echo '<a href="confirm.php">Click here if you were not redirected</a>';
                              exit;
                          }
        } else {
            
                $error = $resp->error;
                
        }
}
?>

<form action="index.php" method="post">
    <input name="name" placeholder="<?php echo $lang['fullname']; ?>" value="<?php echo $_POST['name']; ?>"/><br>
    <input name="email" placeholder="<?php echo $lang['email']; ?>" value="<?php echo $_POST['email']; ?>"/><br>
    <input name="user" placeholder="<?php echo $lang['username']; ?>" value="<?php echo $_POST['user']; ?>"/>@<?php echo $emaildomain; ?><br>
    <input type="password" name="pass1" placeholder="<?php echo $lang['password']; ?>" value="<?php echo $_POST['pass1']; ?>"/><br>
    <input type="password" name="pass2" placeholder="<?php echo $lang['confpass']; ?>" value="<?php echo $_POST['pass2']; ?>"/><br>
    <?php echo recaptcha_get_html($publickey, $error); ?><br>
    <input type="submit" name="go" value="<?php echo $lang['next']; ?>" />
</form>
<?php
include ('footer.php');
?>
