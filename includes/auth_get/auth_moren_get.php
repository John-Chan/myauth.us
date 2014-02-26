<?php

session_start();
include('../config.php');
include('../../classes/Authenticator.php');
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $user = mysqli_real_escape_string($dbconnect,htmlspecialchars($_SESSION['loginuser']));
} else if (isset($_COOKIE['loginname']) && isset($_COOKIE['loginid']) && $_COOKIE['loginname'] != "" && $_COOKIE['loginid'] != "") {
    $usertmp = mysqli_real_escape_string($dbconnect,htmlspecialchars($_COOKIE['loginname']));
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user' AND `user_cookie` ='" . mysqli_real_escape_string($dbconnect,htmlspecialchars($_COOKIE['loginid'])) . "'";
    $result = mysqli_query($dbconnect,$sql);
    if (mysqli_num_rows($result) > 0) {
        $user = $usertmp;
    }
} else {
    die("");
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
}

if (SSLMODE == 0) {
    if ($row) {
        $time = date('Y-m-d H:i:s');
        if (strtotime($time) - strtotime($row['last_sync']) > 86400) {
            $auth = Authenticator::factory($row['serial'], $row['secret']);
            $sql = "UPDATE `authdata` SET `sync`=\"" . $auth->getsync() . "\" ,`last_sync`=\"$time\" WHERE `user_id`=\"$user_id\" AND `auth_moren`=\"1\"";
            mysqli_query($dbconnect,$sql);
        } else {
            $auth = Authenticator::factory($row['serial'], $row['secret'], $row['sync']);
        }
//显示数据
        header('Content-type: text/json');
        $wait = $auth->sleeptime() / 1000;
        $arr = array('code' => $auth->code(), 'time' => $wait);
        echo json_encode($arr);
    } else {
        header('Content-type: text/json');
        $wait = 0;
        $arr = array('code' => "@@@@@@", 'time' => $wait);
        echo json_encode($arr);
    }
} else {
    if ($row) {
    $auth = Authenticator::factory($row['serial'], $row['secret']);
    header('Content-type: text/json');
    $wait = $auth->sleeptime() / 1000;
    $arr = array('code' => $auth->code(), 'time' => $wait);
    echo json_encode($arr);
    }
    else{
        header('Content-type: text/json');
        $wait = 0;
        $arr = array('code' => "@@@@@@", 'time' => $wait);
        echo json_encode($arr);
    }
}
?>
