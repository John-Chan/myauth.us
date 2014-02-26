<?php
include('includes/config.php');
require_once('classes/class.phpmailer.php');//IXWEBHOSTING使用模式1
$topnavvalue = "无法登入？";
include('includes/html_toubu/html_toubu.php');
include('includes/forgetpwd/forgetpsd_check.php');
include('includes/page_inc/header_normal.php');
if($pwdfinderrorid==0){
include('includes/forgetpwd/forgetpsd_checked.php');
}else{
$error_html_code[1] = "验证码输入错误。";
$error_html_code[2] = "用户不存在。";
$error_html_code[3] = "输入的信息不正确。";
$error_html_code[4] = "输入的信息不完整。";
$error_html_code[5] = "用户名存在非法字符，用户名仅允许使用中文、数字、字母、下划线。";
$error_html_code[6] = "信息已确认，邮件发送失败，请检查邮箱地址或联系管理员";
include('includes/page_inc/forgetpwd_inc.php');}
include('includes/page_inc/footer.php');
?>