<?php
defined("ZHANGXUAN") or die("no hacker.");
$mailcheckerrorid=-1;//已经确认了1,错误2
if(isset($_GET["userid"])&&!empty($_GET["userid"])&&isset($_GET["checkcode"])&&!empty($_GET["checkcode"])){
    if(ctype_digit($_GET["userid"])&&  checkcode($_GET["checkcode"])){
        $userid=$_GET['userid'];
        $checkcode=$_GET["checkcode"];
        $sql="SELECT * FROM `users` WHERE `user_id`='$userid'";
        $result = mysqli_query( $dbconnect,$sql);
        if($row=mysqli_fetch_array($result)){
            if($row['user_email_checked']==0){
                if($checkcode==$row['user_email_checkid']){
                    $sql="UPDATE `users` SET `user_email_checked`=1 WHERE `user_id`='$userid'";
                    @mysqli_query( $dbconnect,$sql);
                    $mailcheckerrorid=0;
                }else{
                    $mailcheckerrorid=2;
                }
            }else{
                $mailcheckerrorid=1;//已经确认了
            }
        }else{
            $mailcheckerrorid=2;//没这个人
        }
    }else{
    $mailcheckerrorid=2;//没这个人
}
}else {$mailcheckerrorid=2;}//没这个人

function checkcode($key) {
    if (preg_match("/^[A-Fa-f0-9]+$/u", $key) && strlen($key) == 40)
        return true;
    else
        return false;
}
?>
