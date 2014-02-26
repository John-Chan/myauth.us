<?php
defined("ZHANGXUAN") or die("no hacker.");
?>

<script type="text/javascript" src="<?php echo SITEHOST ?>resources/js/ajaxcheck.js.php"></script> 
<div id="wrapper">
    <h1 id="logo"><a href="<?php echo SITEHOST; ?>"><img src="/resources/img/bn-logo.png" alt=""></a></h1>
    <div id="content" class="login">
        <div id="left">
            <h2> 登录 </h2>
            <form id="form" method="post" action="<?php echo SITEHOST ?>login.php">
                <p><label class="label" for="accountName"> 用户名 </label>
                    <input id="accountName" 
                    <?php
                    if ($loginerrorid == 1)
                        echo "class='input input-error' onfocus=\"this.className = 'input';if(document.getElementById('password').className=='input'){document.getElementById('errorspan').removeChild(document.getElementById('emailAddress-message')); }\"";
                    else
                        echo "class='input' ";
                    ?> type="text" value="" name="username" maxlength="32" tabindex="1"/>
                </p>
                <p><label class="label" for="password">
                        密码</label>
                    <input id="password"
                    <?php
                    if ($loginerrorid == 1)
                        echo "class='input input-error' onfocus=\"this.className = 'input';if(document.getElementById('accountName').className=='input'){document.getElementById('errorspan').removeChild(document.getElementById('emailAddress-message')); }\"";
                    else
                        echo "class='input' ";
                    ?>type="password" name="password" maxlength="16" tabindex="2" autocomplete="off"/>
                           <?php
                           if ($loginerrorid == 1) {
                               echo '<div id="errorspan"><span id="emailAddress-message" class="inline-message">用户名或密码输入错误!</span></div>';
                           }
                           ?></p>
                <div class="imgandreloader">
                    <div id="captcha-image"><img id="sec-string" onclick="refreshCaptcha();document.getElementById('letters_code').focus();" src="/includes/check/code.php?rand=<?php echo rand(0, 20); ?>" alt="换一个" title="换一个" class="border-5" /></div>
                    <div id="captcha-reloader">
                        看不清楚？<br />
                        <a href="javascript:void(0);" onclick="refreshCaptcha();document.getElementById('letters_code').focus();">换一个</a>
                        <script type='text/javascript'>
                            //定义的刷新请求
                            function refreshCaptcha()
                            {
                                var img = document.images['sec-string'];
                                img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
                            }
                            jquerycodechecked=false;
                            //<![CDATA[
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
                    </div>
                </div>
                <p><label class="label" for="letters_code">
                        出于安全性考虑，请输入上方图示中的字符。（这并不是您的密码）</label>

                    <input id="letters_code" 
                    <?php
                    if ($loginerrorid == 2)
                        echo "class='input input-error'  onfocus=\"this.className = 'input';document.getElementById('errorspan').removeChild(document.getElementById('emailAddress-message'));\"";
                    else
                        echo "class='input' ";
                    ?>type="text" onblur="if(!jquerycodechecked){checkyanzhenma(this.value);}" style="width:320px;" name="letters_code" maxlength="6" tabindex="2" autocomplete="off"/>&nbsp;&nbsp;<span id="checkyanzhenmaajax"></span>
                           <?php
                           if ($loginerrorid == 2) {
                               echo '<div id="errorspan"><span id="emailAddress-message" class="inline-message">验证码输入错误!</span></div>';
                           }
                           ?>
                </p>


                <p><span id="remember-me"><label for="persistLogin">
                            <input id="persistLogin" type="checkbox" checked="checked" name="persistLogin"/>保持登录状态
                        </label></span> 
                    <button id="creation-submit" class="ui-button button1" type="submit" data-text="正在处理……"><span class="button-left"><span class="button-right">
                                登录
                            </span></span></button>
                </p>
            </form>
            <ul id="help-links">
                <li class="icon-pass"><a href="<?php echo SITEHOST ?>forgetpwd.php">
                        忘记密码？
                    </a></li>
                <li class="icon-secure">
                    了解
                    <a href="<?php echo SITEHOST ?>copyright.php">
                        版权声明及免责条款
                    </a>
                    ！

                </li><li class="icon-signup">

                    还没有账号？
                    <a href="<?php echo SITEHOST ?>register.php">
                        现在就注册！
                    </a></li>
            </ul>
        </div>


        <div id="right">
            <h2>
                需要账号？
            </h2><h3>
                注册战网安全令在线版账号，简单且免费，即可享受随时随地地安全令密码提取系统！
            </h3>

            <a class="ui-button button1" href="<?php echo SITEHOST ?>register.php"><span class="button-left"><span class="button-right">
                        创建一个战网安全令在线版账号
                    </span> </span></a>

        </div>
    </div>
</div>

