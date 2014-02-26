<?php
include('includes/config.php');
require_once('classes/class.phpmailer.php');//IXWEBHOSTING使用模式1
$topnavvalue = "重置密码";
include('includes/resetpsd/resetpsdmodcheck.php');
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if ($resetmod == 1) {
    include('includes/resetpsd/resetpsdinccheck.php');
    switch ($resetpsdincerror) {
        case 0:
            include('includes/page_inc/resetpwd_inc.php');
            break;
        case 1:
            $jumptxt = "数据错误，请返回重新申请密码重置。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
        case 2:
            $jumptxt = "数据错误，请返回重新申请密码重置。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
        case 3:
            $jumptxt = "令牌已失效，请返回重新申请密码重置。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
    }
}elseif ($resetmod==2) {
    include('includes/resetpsd/resetpsdpostdatacheck.php');
    switch ($resetpsdpostdataerror) {
        case 0:
            $jumptxt = "密码重置成功，即将返回登入页。";
            $jumpurl = SITEHOST . "login.php";
            $navurladd = SITEHOST . "forgetpwd.php";
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
        case 1:
            $jumptxt = "提交数据有误，请返回重新申请密码重置。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
        case 2:
            $jumptxt = "邮箱地址有误，请返回重新申请密码重置。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
        case 3:
            $tokentoshow=$usertoken;
            $useremailadd=$emailadd;
            include('includes/page_inc/resetpwd_inc.php');
            break;
        case 4:
            $jumptxt = "用户不存在，请返回重新申请密码重置。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
        case 5:
            $jumptxt = "令牌失效，请返回重新申请密码重置。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
        default:
            $jumptxt = "未知错误，请联系管理员。即将返回首页。";
            $jumpurl = SITEHOST . "index.php";
            $navurladd = $jumpurl;
            include('includes/resetpsd/resetpsd_incerror_jump.php');
            break;
    }
} else {
    $jumptxt = "数据缺失，请返回重新申请密码重置。";
    $jumpurl = SITEHOST . "forgetpwd.php";
    $navurladd = $jumpurl;
    include('includes/resetpsd/resetpsd_incerror_jump.php');
}
include('includes/page_inc/footer.php');
?>