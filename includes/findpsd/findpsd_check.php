<?php
defined("ZHANGXUAN") or die("no hacker.");
session_start();
$findpsdbymailerrorid=-1;//1密钥过期，2密钥错误，3信息不完整
if(isset($_GET['userid']) && !empty($_GET['userid']) && isset($_GET['pwdcheckid'])&&!empty($_GET['pwdcheckid'])){
    echo "AA";
    if(ctype_digit($_GET["userid"])  &&  checkcode($_GET["pwdcheckid"])){
        $userid=$_GET['userid'];
        $checkcode=$_GET["pwdcheckid"];
        $sql="SELECT * FROM `users` WHERE `user_id`='$userid'";
        $result = mysqli_query($dbconnect,$sql);
        $rowmailpsd=mysqli_fetch_array($result);
        if($rowmailpsd['user_email_find_mode']==1){
            if($rowmailpsd['user_email_find_code']==$checkcode){
                $newtoken=  randstr();
                $newtokenA=  randstr();
                $sql="UPDATE `users` SET `user_psd_reset_token`='$newtoken',`user_email_find_code`='$newtokenA',`user_email_find_mode`=0,`user_psd_reset_token_used`= '0' WHERE `user_id`='$userid'";
                @mysqli_query($dbconnect,$sql);
                $findpsdbymailerrorid=0;
            }else{$findpsdbymailerrorid=2;}
        }else{
            $findpsdbymailerrorid=1;
        }
    }
}else{
    $findpsdbymailerrorid=3;
}


function checkcode($key) {
    if (preg_match("/^[A-Fa-f0-9]+$/u", $key) && strlen($key) == 40)
        return true;
    else
        return false;
}


function randstr($len = 40) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
// characters to build the password from
    mt_srand((double) microtime() * 1000000 * getmypid());
// seed the random number generater (must be done)
    $password = '';
    while (strlen($password) < $len)
        $password.=substr($chars, (mt_rand() % strlen($chars)), 1);
    return sha1(md5($password));
}
?>
