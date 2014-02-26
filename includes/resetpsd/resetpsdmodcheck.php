<?php
defined("ZHANGXUAN") or die("no hacker.");
$resetmod = -1; //1开始输入，2确认中
if (isset($_GET['userid']) && !empty($_GET['userid']) && isset($_GET['token']) && !empty($_GET['token'])) {
    $resetmod = 1;
} else {
    if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['user_token']) && !empty($_POST['user_token']) && isset($_POST['oldPassword']) && !empty($_POST['oldPassword']) && isset($_POST['newPassword']) && !empty($_POST['newPassword']) && isset($_POST['newPasswordVerify']) && !empty($_POST['newPasswordVerify'])) {
        $resetmod = 2;
    } else {
        $resetmod = 0;
    }
}
?>