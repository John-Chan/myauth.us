<?php
include('includes/config.php');
require_once('classes/class.phpmailer.php');//IXWEBHOSTING使用模式1
$topnavvalue = "修改邮箱";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if ($logincheck == 0) {
    $navurladd = SITEHOST . "welcome.php";
    $topnavvalue = "WELCOME";
    include('includes/page_inc/welcome_inc.php');
} else {
    include('includes/changemail/changemail_check.php');
    if($changemailadderrorid==0||$changemailadderrorid==7){
            $navurladd=SITEHOST."changemailadd.php";
        switch ($changemailadderrorid) {
            case 0:
                $jumptxt="邮箱更改成功，即将跳转到账号页面";
                $jstxt1="<h3>一封确认邮件已经发送到你的邮箱，请点击邮件中的链接确认邮箱</h3><br><h4>";
                $jstxt2="</h4>";
                $jumpurl=SITEHOST."account.php";
                break;
            case 7:
                $jumptxt="邮箱更改失败，向新邮箱地址发送邮件失败，请返回重试。<br>";
                $jstxt1="<h3>";
                $jstxt2="</h3>";
                $jumpurl=SITEHOST."changemailadd.php";
                break;
        }
    include('includes/changemail/changemail_checked.php');
    }else{
        $error_html_code[1] = "验证码输入错误。";
        $error_html_code[2] = "内容输入错误。";
        $error_html_code[3] = "没登入啊少年，不要这么变态啊。";
        $error_html_code[4] = "验证信息错误。";
        $error_html_code[5] = "邮箱格式错误。";
        $error_html_code[6] = "您的当前邮箱与欲更改的新邮箱地址相同。";
        include('includes/page_inc/changemail_inc.php');
    }
}
include('includes/page_inc/footer.php');
?>