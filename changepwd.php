<?php
require_once('classes/class.phpmailer.php');//IXWEBHOSTING使用模式1
include('includes/config.php');
$topnavvalue = "修改密码";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if ($logincheck == 0) {
    $navurladd = SITEHOST . "welcome.php";
    $topnavvalue = "WELCOME";
    include('includes/page_inc/welcome_inc.php');
} else {
    include('includes/changepsd/changepsd_check.php');
    if ($changepsderrorid == 0) {
        $navurladd = SITEHOST . "changepsd.php";
        $jumptxt = "密码修改成功，已向注册邮箱发送提示邮件，即将跳转到我的账号。";
        $jumpurl = SITEHOST . "account.php";
        include('includes/changepsd/changepsd_checked.php');
    } else {
        $error_html_code[1] = "验证码输入错误。";
        $error_html_code[2] = "内容输入错误。";
        $error_html_code[3] = "没登入啊少年，不要这么变态啊。";
        $error_html_code[4] = "两次输入的密码不一致。";
        include('includes/page_inc/changepsd_inc.php');
    }
}
include('includes/page_inc/footer.php');
?>