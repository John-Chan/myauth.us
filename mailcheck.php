<?php
include('includes/config.php');
$topnavvalue="邮件地址确认";
include('includes/html_toubu/html_toubu.php');
include('includes/mailaddcheck/mail_check.php');
include('includes/page_inc/header_normal.php');
$topnavvalue="账号";
$navurladd=SITEHOST."account.php";
if($logincheck==0){//没登入
    switch ($mailcheckerrorid)
{
case 0:
  $jumptxt="邮件地址确认成功，即将转到登入页面。";
  $jumpurl=SITEHOST."login.php";
  break;  
case 1:
  $jumptxt="该账号邮件地址已经确认，无需重复确认，即将转到登入页面。";
  $jumpurl=SITEHOST."login.php";
  break;
case 2:
  $jumptxt="密钥错误，邮件地址确认失败，即将转到主页。";
  $jumpurl=SITEHOST."index.php";
  break;
case -1:
  $jumptxt="未知错误，即将转到主页。";
  $jumpurl=SITEHOST."index.php";
  break;
}
}else{
      switch ($mailcheckerrorid)
{
case 0:
  $jumptxt="邮件地址确认成功，即将转到主页。";
  break;  
case 1:
  $jumptxt="该账号邮件地址已经确认，无需重复确认，即将转到主页。";
  break;
case 2:
  $jumptxt="密钥错误，邮件地址确认失败，即将转到主页。";
  break;
case -1:
  $jumptxt="未知错误，即将转到主页。";
  break;
}
  $jumpurl=SITEHOST."index.php";
}
include('includes/mailaddcheck/mailchecked.php');
include('includes/page_inc/footer.php');
?>