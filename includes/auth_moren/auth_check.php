<?php

defined("ZHANGXUAN") or die("no hacker.");
session_start();
$navurladd = SITEHOST . "auth.php";
$user = null;
$user_id = null;
$auth_moren_exist = false;
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_SESSION['loginuser']));
} else if (isset($_COOKIE['loginname']) && isset($_COOKIE['loginid']) && $_COOKIE['loginname'] != "" && $_COOKIE['loginid'] != "") {
    $usertmp =mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginname']));
    $cookievalue = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginid'], ENT_QUOTES)); 
    $sql = "SELECT * FROM `cookiedata` WHERE `user_name`='$usertmp' AND `user_cookie` ='$cookievalue'";
    $result = mysqli_query($dbconnect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $rowtemp = mysqli_fetch_array($result);
        $timedifference = time() - strtotime($rowtemp['login_time']);
        if ($timedifference <= 30 * 24 * 60 * 60) {
            $user = $usertmp;
        }else {
            $sql = "DELETE FROM `cookiedata` WHERE `user_name`='$usertmp' AND `user_cookie` ='$cookievalue'";
            @mysqli_query($dbconnect, $sql);
            setcookie("loginname", "", time() - 3600, "/");
            setcookie("loginid", "", time() - 3600, "/");
            $logincheck = 0;
        }
    }
} else {
    die("错误");
}
if (!is_null($user)) {
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect,$sql);
    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];
}
if (!is_null($user_id)) {
    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_moren`='1'";
    $result = mysqli_query($dbconnect,$sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $auth_moren_exist = true;
    }
}
?>