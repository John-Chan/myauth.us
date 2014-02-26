<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>战网安全令-在线测试版-<?php
if ($logoutorlogin)
    echo "登出";
else
    echo "登入";
?></title>
        <link rel="stylesheet" href="resources/logincss/footer.css" type="text/css" />
        <link rel="stylesheet" href="resources/logincss/login.css" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
        <script type="text/javascript" src="resources/js/jquery-1.7.1.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
    </head>
    <body>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0abf57ffe072b473a0418ad8c368f7d2' type='text/javascript'%3E%3C/script%3E"));
        </script>
