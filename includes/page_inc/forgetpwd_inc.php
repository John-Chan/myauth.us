<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<link rel="stylesheet" href="../../resources/css/forgetpsd.css" type="text/css" />
<script type="text/javascript" src="<?php echo SITEHOST ?>resources/js/forgetpwd_ajaxcheck.js.php"></script> 
<script type="text/javascript" src="../../resources/js/class-inheritance.js"></script>
<script type="text/javascript" src="../../resources/js/inputs.js"></script>
<script type="text/javascript" src="../../resources/js/streamlined-creation.js"></script>
<script type="text/javascript" src="../../resources/js/validation.js"></script>

<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
            <?php
            if ($pwdfinderrorid > 0 && $error_html_code[$pwdfinderrorid] != null)
                echo '<div class="alert error closeable border-4 glow-shadow"><div class="alert-inner"><div class="alert-message"><p class="title"><strong><a name="form-errors"> </a>发生下列错误：</strong></p><ul><li>' . $error_html_code[$pwdfinderrorid] . '</li></ul></div></div></div>';
            ?>
            <div id="page-header">
                <h2 class="subcategory">
                    重置您的密码
                </h2> 
                <h3 class="headline"> 账号注册信息确认 </h3>
            </div>
            <p>
                请在下方输入您的注册信息以便重置您遗忘的密码。
            </p>
            <form id="support-form" class="login-support-form" novalidate="novalidate" action="<?php echo SITEHOST;?>forgetpwd.php" method="post">
                <div class="input-row input-row-text">
                    <span class="input-left">
                        <label for="firstName">
                            <span class="label-text">
                                注册用户名：
                            </span>
                            <span class="input-required">*</span>
                        </label>
                    </span><!--
                    --><span class="input-right">
                        <span class="input-text input-text-medium">
                            <input name="firstName" id="firstName" class="medium border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" type="text">
                            <span class="inline-message " id="firstName-message">&nbsp;</span>
                        </span>
                    </span>
                </div>

                <div class="input-row input-row-text">
                    <span class="input-left">
                        <label for="email">
                            <span class="label-text">
                                注册邮箱：
                            </span>
                            <span class="input-required">*</span>
                        </label>
                    </span><!--
                    --><span class="input-right">
                        <span class="input-text input-text-medium">
                            <input name="email" id="email" class="medium border-5 glow-shadow-2" autocomplete="off" maxlength="320" tabindex="1" required="required" type="text">
                            <span class="inline-message " id="email-message">&nbsp;</span>
                        </span>
                    </span>
                </div><input type="hidden" value="PASSWORD_RESET" name="requestType"/>


                <div class="input-row input-row-select">
                    <span class="input-left">
                        <label for="question1">
                            <span class="label-text">
                                安全问题及答案：
                            </span>
                            <span class="input-required">*</span>
                        </label>
                    </span><!--
                    --><span class="input-right">
                        <span class="input-select input-select-small">
                            <select name="question1" id="question1" class="small border-5 glow-shadow-2" tabindex="1" required="required">
                                <option value="" selected="selected">您注册时选择的安全问题</option>
                                <option value="81">您出生的城市是哪里?</option>
                                <option value="82">您手机的型号是什么?</option>
                                <option value="83">您就读的第一所小学名称是?</option>
                                <option value="84">您的初恋情人叫什么名字?</option>
                                <option value="85">您驾照的末四位是什么?</option>
                                <option value="86">您母亲的姓名叫什么?</option>
                                <option value="87">您母亲的生日是哪一天?</option>
                                <option value="88">您父亲的生日是哪一天?</option>
                            </select>
                            <span class="inline-message no-text-clear" id="question1-message"> </span>
                        </span>
                        <span class="input-text input-text-small">
                            <input type="text" name="answer1" value="" id="answer1" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="100" tabindex="1" required="required" placeholder="答案" />
                            <span class="inline-message no-text-clear" id="answer1-message"> </span>
                        </span>
                    </span>
                </div>
                <div class="input-row input-row-note question-info" id="question-info" style="display: none;">
                    <span id="question1-message" class="inline-message no-text-clear">您将需要使用该信息进行身份验证，确定你是账号所有者。</span>
                </div>

                <div class="input-row input-row-text">
                    <span class="input-left">
                        <label for="Captcha">
                            <span class="label-text">
                                验证码：
                            </span>
                            <span class="input-required">*</span>
                        </label>
                    </span>
                    <span class="input-right">
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
                                </script> 
                            </div><span class="input-static input-static-extra-large"><span class="static"><p><label class="label" for="yanzhenma">
                                            出于安全性考虑，请输入上方图示中的字符。（这并不是您的密码）</label></p></span></span>
                        </div>
                        <span class="input-text input-text-small">
                            <input type="text" name="letters_code" value="" onblur="checkyanzhenma(this.value);" id="letters_code" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="6" tabindex="1" required="required" placeholder="输入验证码" />
                            <span id="checkyanzhenmaajax"></span>
                            <span class="inline-message " id="emailAddress-message"> </span>
                        </span>
                    </span>
                </div>
                <fieldset class="ui-controls ">
                    <button class="ui-button button1" type="submit" id="support-submit" tabindex="1"><span class="button-left"><span class="button-right">继续</span></span></button>
                    <a class="ui-cancel " href="<?php echo SITEHOST;?>">
                        <span>
                            返回 </span>
                    </a>
                    <script type="text/javascript">
                        //<![CDATA[
                        var FormMsg = {
                            'headerSingular': '出错了。',
                            'headerMultiple': '发生下列错误：',
                            'fieldInvalid': '部分内容填写有误。',
                            'fieldMissing': '此项为必填。',
                            'fieldsMissing': '请填写全部必填项。',
                            'emailInfo': '此将为您的登录使用名称。',
                            'emailMissing': '请输入一个有效的邮箱地址。',
                            'emailInvalid': '无效的电子邮件地址。',
                            'emailMismatch': '电子邮件地址必须相同。',
                            'passwordInvalid': '不符合密码规则。',
                            'passwordMismatch': '密码必须相同。',
                            'touDisagree': '继续前您必须先接受协议。'
                        };
                        //]]>
                    </script>
                </fieldset>
            </form>
        </div>
    </div>
</div>