<?php

function chinesetime($timevalue) {
    $text = substr($timevalue, 0, 4) . "年" . substr($timevalue, 5, 2) . "月" . substr($timevalue, 8, 2) . "日" . substr($timevalue, 11, 2) . "时" . substr($timevalue, 14, 2) . "分" . substr($timevalue, 17, 2) . "秒";
    return $text;
}

session_start();
include('../config.php');
include('../../classes/Authenticator.php');
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_SESSION['loginuser']));
} else if (isset($_COOKIE['loginname']) && isset($_COOKIE['loginid']) && $_COOKIE['loginname'] != "" && $_COOKIE['loginid'] != "") {
    $usertmp = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginname']));
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
    die("");
}
if (!is_null($user)) {
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect, $sql);
    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];
}
if (isset($_GET['authid']) && !empty($_GET['authid']) && ctype_digit($_GET['authid'])) {
    $authid = $_GET['authid'];
}
if (!is_null($user_id) && !is_null($authid)) {
    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_id`='$authid'";
    $result = mysqli_query($dbconnect, $sql);
    $row = mysqli_fetch_array($result);
}
header('Content-type: text/json');
if ($row) {
    if ($row['auth_moren'] == 1) {
        $sendbackauthid = $row['auth_id'];
        $sql = "DELETE FROM `authdata` WHERE `user_id`=$user_id AND `auth_id`=$authid";
        mysqli_query($dbconnect, $sql);
        $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_moren`=0";
        $result = mysqli_query($dbconnect, $sql);
        $rowa = mysqli_fetch_array($result);
        if ($rowa) {
            $newauthmorenid = $rowa['auth_id'];
            $sql = "UPDATE `authdata` SET `auth_moren`= 1 WHERE `user_id`='$user_id' AND `auth_id` = '$newauthmorenid' AND `auth_moren`=0";
            mysqli_query($dbconnect, $sql);
            $arr = array('oldmorendeleted' => 1, 'newmorenid' => $newauthmorenid, 'deleteauid' => $sendbackauthid, 'result' => 1, 'sql' => $sql);
            echo json_encode($arr);
        } else {
            $arr = array('oldmorendeleted' => 1, 'newmorenid' => -1, 'deleteauid' => $sendbackauthid, 'result' => 1, 'sql' => $sql);
            echo json_encode($arr);
        }
    } else {
        $sql = "DELETE FROM `authdata` WHERE `user_id`=$user_id AND `auth_id`=$authid";
        mysqli_query($dbconnect, $sql);
        $arr = array('oldmorendeleted' => 0, 'newmorenid' => -1, 'deleteauid' => $sendbackauthid, 'result' => 1, 'sql' => $sql);
        echo json_encode($arr);
    }
} else {
    $arr = array('oldmorendeleted' => 0, 'newmorenid' => -1, 'deleteauid' => -1, 'result' => 0, 'sql' => $sql);
    echo json_encode($arr);
}
?>
