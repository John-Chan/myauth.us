<?php

include('includes/config.php');
$topnavvalue = "账号管理";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if ($logincheck == 0) {
    $navurladd = SITEHOST . "welcome.php";
    $topnavvalue = "WELCOME";
    include('includes/page_inc/welcome_inc.php');
} else {
    $navurladd = SITEHOST . "account.php";
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect,$sql);
    $rowtemp = mysqli_fetch_array($result);
    $user_id = $rowtemp['user_id'];
    $sql="SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
    $result = mysqli_query($dbconnect,$sql);
    $auth_total_all = mysqli_num_rows($result);
    $navurladd = SITEHOST . "account.php";
    include('includes/page_inc/account_inc.php');
}
include('includes/page_inc/footer.php');
?>