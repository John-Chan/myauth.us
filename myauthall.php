<?php
include('includes/config.php');
$topnavvalue="我的安全令";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if($logincheck==0){
    include('includes/page_inc/welcome_inc.php');}
else {
    include('includes/page_inc/myauthall_inc.php');
}
include('includes/page_inc/footer.php');
?>