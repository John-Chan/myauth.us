<?php
include('includes/config.php');
$topnavvalue="删除安全令";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if($logincheck==0){
    $navurladd=SITEHOST."welcome.php";
    $topnavvalue="WELCOME";
    include('includes/page_inc/welcome_inc.php');}
else {
$navurladd=SITEHOST."myauthall.php";
$topnavvalue="我的安全令";
include('includes/auth_del/auth_del_check.php');
include('includes/auth_del/auth_del_checked.php');
}
include('includes/page_inc/footer.php');
?>