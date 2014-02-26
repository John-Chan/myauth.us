<?php

defined("ZHANGXUAN") or die("no hacker.");
session_start();
$logincheck = 0;
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    if (!$dbconnect) {
        die("数据库连接错误，请联系管理员同志~~");
    }
    $user = mysqli_real_escape_string($dbconnect,htmlspecialchars($_SESSION['loginuser'], ENT_QUOTES));
    $user_cookie = randstr(40);
    $sql = "UPDATE `users` SET `user_cookie`='$user_cookie' WHERE `user_name` = '$user'";
    mysqli_query($dbconnect,$sql);
    $logincheck = 1;
}
setcookie("loginname", "", time() - 3600, "/");
setcookie("loginid", "", time() - 3600, "/");
unset($_SESSION['loginuser']);

function randstr($len = 6) {
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
