<?php
include('includes/config.php');
$topnavvalue="默认安全令";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if($logincheck==0){
    $navurladd=SITEHOST."welcome.php";
    $topnavvalue="WELCOME";
    include('includes/page_inc/welcome_inc.php');}
else {{
    include('includes/auth_moren/auth_check.php');

    if ($auth_moren_exist) {
        $topnavvalue = "默认安全令";
        $navurladd = SITEHOST . "auth.php";
        include('includes/page_inc/auth_inc.php');
    } else {
        $topnavvalue = "添加安全令";
        include('includes/page_inc/addauth_inc.php');
    }
}}
include('includes/page_inc/footer.php');
?>