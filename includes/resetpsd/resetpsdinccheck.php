<?php
defined("ZHANGXUAN") or die("no hacker.");
$resetpsdincerror = -1; //1:GET数据有错,2数据有错,3TOKEN无效,0可用
if ($resetmod == 1) {
    if (ctype_digit($_GET["userid"]) && checkcode($_GET["token"])) {
        $userid = $_GET["userid"];
        $sql = "SELECT * FROM `users` WHERE `user_id`='$userid'";
        $result = mysqli_query( $dbconnect,$sql);
        $row=  mysqli_fetch_array($result);
        if($row){
            $username=$row['user_name'];
            if($row['user_psd_reset_token']==$_GET['token'] && $row['user_psd_reset_token_used']==0){
              $tokentoshow=$_GET["token"];
              $useremailadd=$row['user_email'];
              $resetpsdincerror=0;
            }else{
                $resetpsdincerror=3;
            }
        }else{
            $resetpsdincerror=2;
        }
    } else {
        $resetpsdincerror = 1;
    }
}

function checkcode($key) {
    if (preg_match("/^[A-Fa-f0-9]+$/u", $key) && strlen($key) == 40)
        return true;
    else
        return false;
}

?>
