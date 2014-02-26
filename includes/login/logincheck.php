<?php
defined("ZHANGXUAN") or die("no hacker.");
session_start();
$logincheck = 0;
$loginerrorid = -1;
if (!$dbconnect) {
    die("数据库连接错误，请联系管理员同志~~");
}
if (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['letters_code'])) {
    $loginerrorid = 2; //验证码输入错误
} else if (isset($_POST['letters_code']) && md5(strtolower($_POST['letters_code'])) != $_SESSION['letters_code']) {
    $loginerrorid = 2;
} else if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']) && isset($_POST['letters_code']) && md5(strtolower($_POST['letters_code'])) == $_SESSION['letters_code']) {
    $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_POST['username'], ENT_QUOTES));
    $password = mysqli_real_escape_string($dbconnect, md5($_POST['password']));
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user' AND `user_pass`='$password'";
    $result = mysqli_query($dbconnect,$sql);
    if (mysqli_num_rows($result) == 0) {
        $logincheck = 0;
        $loginerrorid = 1;
    } else {
        $logincheck = 1;
        $_SESSION['loginuser'] = $user;
        if (isset($_POST['persistLogin']) && $_POST['persistLogin'] == "on") {
            $cookievalue = randstr();
            $sql = "UPDATE `users` SET `user_cookie`='$cookievalue' WHERE `user_name` = '$user' AND `user_pass` =  '$password'";
            mysqli_query( $dbconnect,$sql);
            setcookie("loginname", $user, time() + 30 * 24 * 60 * 60, "/");
            setcookie("loginid", $cookievalue, time() + 30 * 24 * 60 * 60, "/");
        }
    }
    $_SESSION['letters_code'] = rand();
} else if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $logincheck = 1;
} elseif ($_COOKIE['loginname'] != "" && $_COOKIE['loginid'] != "") {
    $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginname'], ENT_QUOTES));
    $cookievalue = mysqli_real_escape_string($dbconnect, $_COOKIE['loginid']);
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user' AND `user_cookie` ='" . $cookievalue . "'";
    $result = mysqli_query($dbconnect,$sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loginuser'] = $_COOKIE['loginname'];
        $logincheck = 1;
    } else {
        setcookie("loginname", "", time() - 3600, "/");
        setcookie("loginid", "", time() - 3600, "/");
        $logincheck = 0;
    }
}

//随机邮件验证码
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
