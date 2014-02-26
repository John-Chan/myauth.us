<?php
include('includes/config.php');
$topnavvalue="令牌";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if($logincheck==0){
    $navurladd=SITEHOST."welcome.php";
    $topnavvalue="WELCOME";
    include('includes/page_inc/welcome_inc.php');}
else {
if($autherrid==0)
include('includes/page_inc/normal_auth_inc.php');
else
include('includes/normal_auth_error/normal_auth_error.php');
}
include('includes/page_inc/footer.php');
?>