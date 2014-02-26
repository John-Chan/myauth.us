<?php

include('includes/config.php');
$topnavvalue = "重置密码校验";
include('includes/findpsd/findpsd_check.php');
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if ($findpsdbymailerrorid != 0) {
    $navurladd = SITEHOST . "findpwdmail.php";
    switch ($findpsdbymailerrorid) {
        case -1:
            $jumptxt = "未知错误，请不要这么变态。即将转到主页。";
            $jumpurl = SITEHOST;
            break;
        case 1:
            $jumptxt = "您的密钥已经过期，请返回重试。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            break;
        case 2:
            $jumptxt = "您的密钥错误，请返回重试。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            break;
        case 3:
            $jumptxt = "您的信息有误，请返回重试。";
            $jumpurl = SITEHOST . "forgetpwd.php";
            break;
    }
    include('includes/findpsd/findpds_error.php');
} else {
    header("Location: " . SITEHOST . "resetpwd.php?userid=$userid&token=$newtoken");
}
include('includes/page_inc/footer.php');
?>