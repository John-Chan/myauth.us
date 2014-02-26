<?php
include('includes/config.php');
require_once('classes/class.phpmailer.php');//IXWEBHOSTING使用模式1
include('includes/html_toubu/html_toubu_register.php');
$topnavvalue = "账号创建";
include('includes/register/registercheck.php');
include('includes/page_inc/header_normal.php');
$error_html_code[1] = "验证码输入错误。";
$error_html_code[2] = "用户名已存在。";
$error_html_code[3] = "邮箱格式错误。";
$error_html_code[4] = "内容输入错误。";
$error_html_code[5] = "用户名存在非法字符，用户名仅允许使用中文、数字、字母、下划线。";
if ($logincheck == 1 && $registersuccesslogin == 0) {//已经登入了，还注册你麻痹
    include('includes/register/register_error_allreadylogin.php');
} else if ($registercheck == 1) {
    include('includes/register/register_checked.php'); //注册完成后
} else {
    include('includes/register/register_inc.php');
}
include('includes/page_inc/footer.php');
?>
