<?php

defined("ZHANGXUAN") or die("no hacker.");
session_start();
$logincheck = 0;
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    if (!$dbconnect) {
        die("数据库连接错误，请联系管理员同志~~");
    }
    $user = mysqli_real_escape_string($dbconnect,htmlspecialchars($_SESSION['loginuser'], ENT_QUOTES));
    $sql = "DELETE FROM `cookiedata` WHERE `user_name`='$user'";
    @mysqli_query($dbconnect,$sql);
    $logincheck = 1;
}
setcookie("loginname", "", time() - 3600, "/");
setcookie("loginid", "", time() - 3600, "/");
unset($_SESSION['loginuser']);

?>
