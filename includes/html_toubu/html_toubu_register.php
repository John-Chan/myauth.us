<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>战网安全令-在线版-Beta测试版-注册</title>
        <link rel="stylesheet" href="resources/css/articles.css" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
        <link rel="stylesheet" href="resources/css/header.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/body.css" type="text/css" />
        <link rel="stylesheet" href="resources/registercss/register.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/footer.css" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
        <script type="text/javascript" src="resources/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="resources/js/class-inheritance.js"></script>
        <script type="text/javascript" src="resources/js/inputs.js"></script>
        <script type="text/javascript" src="resources/js/streamlined-creation.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            $(function() {
                var inputs = new Inputs('#creation');
                var creation = new Creation('#creation');
            });
            jquerycodechecked=false;
            $(document).ready(function(){
                $("#letters_code").keyup(function(){
                    if($("#letters_code")[0].value.length==6){
                        checkyanzhenma($("#letters_code")[0].value);
                        jquerycodechecked=true;
                    }else{
                        jquerycodechecked=false;
                        document.getElementById('checkyanzhenmaajax').innerHTML = "";
                    }
                });
            });
            //]]>
        </script>
    </head>
    <body>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0abf57ffe072b473a0418ad8c368f7d2' type='text/javascript'%3E%3C/script%3E"));
        </script>
