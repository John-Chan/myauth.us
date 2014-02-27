<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<link rel="stylesheet" href="../../resources/css/resetpsd.css" type="text/css" />
<script type="text/javascript" src="../../resources/js/class-inheritance.js"></script>
<script type="text/javascript" src="../../resources/js/inputs.js"></script>
<script type="text/javascript" src="../../resources/js/password.js"></script>
<script type="text/javascript" src="../../resources/js/forgetpwd_ajaxcheck.js.php"></script> 
<div id="layout-middle">
    <div class="homewrapper">
        <div id="content">
            <?php
            if ($changepsderrorid > 0 && $error_html_code[$changepsderrorid] != null)
                echo '<div class="alert error closeable border-4 glow-shadow"><div class="alert-inner"><div class="alert-message"><p class="title"><strong><a name="form-errors"> </a>发生下列错误：</strong></p><ul><li>' . $error_html_code[$registererrid] . '</li></ul></div></div></div>';
            ?>
            <div id="page-header">
                <h2 class="subcategory">
                    修改您的密码
                </h2> 
                <h3 class="headline"> 输入您的旧密码及新密码 </h3>
            </div>
            <div id="page-content" class="page-content">
                <div class="columns-2-1 settings-content" style="height: 420px;">
                    <div class="column column-left">
                        <div class="password-entry">
                            <span class="clear"><!-- --></span>
                            <form method="post" action="<?php echo SITEHOST; ?>changepwd.php" id="change-settings" novalidate="novalidate">
                                <div class="input-row input-row-text">
                                    <span class="input-left">
                                        <label for="oldPassword">
                                            <span class="label-text">
                                                旧密码：
                                            </span>
                                            <span class="input-required">*</span>
                                        </label>
                                    </span><!--
                                    --><span class="input-right">
                                        <span class="input-text input-text-small">
                                            <input type="password" id="oldPassword" name="oldPassword" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="输入旧密码" />
                                            <span class="inline-message " id="oldPassword-message"> </span>
                                        </span>
                                    </span>
                                </div>
                                <div class="input-row input-row-text">
                                    <span class="input-left">
                                        <label for="newPassword">
                                            <span class="label-text">
                                                新密码：
                                            </span>
                                            <span class="input-required">*</span>
                                        </label>
                                    </span><!--
                                    --><span class="input-right">
                                        <span class="input-text input-text-small">
                                            <input type="password" id="newPassword" name="newPassword" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="输入新密码" />
                                            <span class="inline-message " id="newPassword-message"> </span>
                                        </span>
                                    </span>
                                </div>
                                <div class="input-row input-row-note" id="password-strength" style="display: none;">
                                    <div class="input-note input-text-small border-5 glow-shadow">
                                        <div class="input-note-content">
                                            <div class="password-strength">
                                                <span class="password-result">
                                                    密码强度：
                                                    <strong id="password-result"></strong>
                                                </span>
                                                <span class="password-rating"><span class="rating rating-default" id="password-rating"></span></span>
                                            </div>
                                        </div>
                                        <div class="input-note-arrow"></div>
                                    </div>
                                </div>
                                <div class="input-row input-row-text">
                                    <span class="input-left">
                                        <label for="newPasswordVerify">
                                            <span class="label-text">
                                                再次输入新密码：
                                            </span>
                                            <span class="input-required">*</span>
                                        </label>
                                    </span><!--
                                    --><span class="input-right">
                                        <span class="input-text input-text-small">
                                            <input type="password" id="newPasswordVerify" name="newPasswordVerify" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="重新输入新密码" />
                                            <span class="inline-message " id="newPasswordVerify-message"> </span>
                                        </span>
                                    </span>
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
                                            </div><span class="input-static input-static-extra-large"><span class="static"><p><label class="label" for="yanzhenma">
                                                            出于安全性考虑，请输入上图中的字符。（这并不是您的密码）</label></p></span></span>
                                        </div>
                                        <span class="input-text input-text-small">
                                            <input type="text" name="letters_code" value="" onblur="if(!jquerycodechecked){checkyanzhenma(this.value);}" id="letters_code" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="6" tabindex="1" required="required" placeholder="输入验证码" />
                                            <span id="checkyanzhenmaajax"></span>
                                            <span class="inline-message " id="emailAddress-message"> </span>
                                        </span>
                                    </span>
                                </div>

                                <div class="submit-row" id="submit-row">
                                    <div class="input-left"></div><!--
                                    --><div class="input-right">
                                        <button class="ui-button button1" type="submit" id="password-submit" tabindex="1"><span class="button-left"><span class="button-right">继续</span></span></button>
                                        <a class="ui-cancel " href="<?php echo SITEHOST; ?>" tabindex="1">
                                            <span>
                                                取消 </span>
                                        </a>
                                    </div>
                                </div>
                            </form>
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
                                    , 'passwordError1': '不符合密码规则。'
                                    , 'passwordError2': '密码必须相同。'
                                    , 'passwordStrength0': '密码过短'
                                    , 'passwordStrength1': '弱'
                                    , 'passwordStrength2': '中'
                                    , 'passwordStrength3': '强'
                                };
                                //]]>
                            </script>
                        </div>
                    </div>
                    <div class="column column-right">
                        <div class="password-requirements">
                            <ul class="password-level" id="password-level">
                                <li id="password-level-0"><!--
                                    --><span class="icon-16"></span><!--
                                    --><span class="icon-16-label">您的密码长度需介于8-16个字符之间。</span><!--
                                    --></li>
                                <li id="password-level-1"><!--
                                    --><span class="icon-16"></span><!--
                                    --><span class="icon-16-label">您的密码只能包含英文字母(A-Z)，数字(0–9)以及标点符号。</span><!--
                                    --></li>
                                <li id="password-level-2"><!--
                                    --><span class="icon-16"></span><!--
                                    --><span class="icon-16-label">您的密码必须包含至少一个英文字母以及一个数字。</span><!--
                                    --></li>
                                <li id="password-level-3"><!--
                                    --><span class="icon-16"></span><!--
                                    --><span class="icon-16-label">您的密码不能与您的账号名过于相似。</span><!--
                                    --></li>
                                <li id="password-level-4"><!--
                                    --><span class="icon-16"></span><!--
                                    --><span class="icon-16-label">密码必须相同。</span><!--
                                    --></li>
                            </ul>
                            <p class="caption">为了您的安全，我们强烈建议您使用不同于战网、魔兽世界、暗黑破坏神III、炉石传说及其它任何线上账号密码的密码。</p>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                //<![CDATA[
                $(function() {
                    var inputs = new Inputs('#change-settings');
                    var settings = new ChangePassword('#change-settings', {
                        passwordFields: [
                            '#newPassword',
                            '#newPasswordVerify'
                        ],emailAddress: '<?php echo $user; ?>'
                    });
                });
                //]]>
            </script>
        </div>
    </div>
</div>