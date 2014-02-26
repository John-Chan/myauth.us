<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<script type="text/javascript" src="<?php echo SITEHOST ?>resources/js/ajaxcheck.js.php"></script> 
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
            <?php
            if ($registererrid > 0 && $error_html_code[$registererrid] != null)
                echo '<div class="alert error closeable border-4 glow-shadow"><div class="alert-inner"><div class="alert-message"><p class="title"><strong><a name="form-errors"> </a>发生下列错误：</strong></p><ul><li>' . $error_html_code[$registererrid] . '</li></ul></div></div></div>';
            ?>
            <div id="page-header">
                <p class="privacy-message"><b>
                        我们保护您的个人信息安全。
                    </b>
                    阅读我们的<a href="<?php echo SITEHOST ?>copyright.php" target="_blank">
                        版权声明及免责条款
                    </a>，了解您的注意事项。
                </p>
            </div>
            <div id="page-content">
                <form action="<?php echo SITEHOST ?>register.php" method="post" id="creation">
                    <div class="input-row input-row-text">
                        <span class="input-left">
                            <label for="firstname">
                                <span class="label-text">
                                    用户名：
                                </span>
                                <span class="input-required">*</span>
                            </label>
                        </span><!--
                        --><span class="input-right">
                            <span class="input-text input-text-small">
                                <input type="text" name="username" value="" id="firstname" onblur="checkname(this.value);" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="仅允许使用中文、数字、字母及下划线" /><span id="checkusernameajax"></span>
                                <span class="inline-message " id="firstname-message"> </span>
                            </span>
                        </span>
                    </div>
                    <div class="input-row input-row-text">
                        <span class="input-left">
                            <label for="password">
                                <span class="label-text">
                                    密码：
                                </span>
                                <span class="input-required">*</span>
                            </label>
                        </span><!--
                        --><span class="input-right">
                            <span class="input-text input-text-small">
                                <input type="password" id="password" name="password" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="输入密码" />
                                <span class="inline-message " id="password-message"> </span>
                            </span>
                            <span class="input-text input-text-small">
                                <input type="password" id="rePassword" name="rePassword" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="确认输入" />
                                <span class="inline-message " id="rePassword-message"> </span>
                            </span>
                        </span>
                    </div>
                    <div class="input-row input-row-note" id="password-strength" style="display: none">
                        <div class="input-note border-5 glow-shadow">
                            <div class="input-note-left">
                                <p class="caption">为了您账号的安全，我们强烈建议您使用不同于战网、魔兽世界及其它任何线上账号密码的密码。</p>
                            </div>
                            <div class="input-note-right border-5">
                                <div class="password-strength">
                                    <span class="password-result">
                                        密码强度：
                                        <strong id="password-result"></strong>
                                    </span>
                                    <span class="password-rating"><span class="rating rating-default" id="password-rating"></span></span>
                                </div>
                                <ul class="password-level" id="password-level">
                                    <li id="password-level-0">
                                        <span class="icon-16"></span>
                                        <span class="icon-16-label">密码长度必须介于8到16个字符之间。</span>
                                    </li>
                                    <li id="password-level-1">
                                        <span class="icon-16"></span>
                                        <span class="icon-16-label">密码只能包含英文字母（A-Z）、数字字符（0-9）以及标点符号。</span>
                                    </li>
                                    <li id="password-level-2">
                                        <span class="icon-16"></span>
                                        <span class="icon-16-label">密码至少包含1个英文字母和1个数字字符。</span>
                                    </li>
                                    <li id="password-level-3">
                                        <span class="icon-16"></span>
                                        <span class="icon-16-label">密码不能与用户名相同。</span>
                                    </li>
                                    <li id="password-level-4">
                                        <span class="icon-16"></span>
                                        <span class="icon-16-label">两次输入的密码必须一致且不与用户名相类似。</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                            <div class="input-note-arrow"></div>
                        </div>
                    </div>
                    <div class="input-row input-row-text">
                        <span class="input-left">
                            <label for="emailAddress">
                                <span class="label-text">
                                    邮箱地址：
                                </span>
                                <span class="input-required">*</span>
                            </label>
                        </span><!--
                        --><span class="input-right">
                            <span class="input-text input-text-small">
                                <input type="email" name="emailAddress" value="" id="emailAddress" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="输入邮箱地址" />
                                <span class="inline-message " id="emailAddress-message"> </span>
                            </span>
                            <span class="input-text input-text-small">
                                <input type="email" name="emailAddressConfirmation" value="" id="emailAddressConfirmation" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="确认输入" />
                                <span class="inline-message " id="emailAddressConfirmation-message"> </span>
                            </span>
                        </span>
                    </div>
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
                                    <option value="" selected="selected">选择一个安全提问问题</option>
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
                        <span id="question1-message" class="inline-message no-text-clear">您将需要使用该信息进行身份验证，以便在将来找回密码时使用。该内容确定后无法修改。</span>
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
                                <input type="text" name="letters_code" value="" onblur="if(!jquerycodechecked){checkyanzhenma(this.value);}" id="letters_code" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="6" tabindex="1" required="required" placeholder="输入验证码" />
                                <span id="checkyanzhenmaajax"></span>
                                <span class="inline-message " id="emailAddress-message"> </span>
                            </span>
                        </span>
                    </div>




                    <div class="input-row input-row-verification">
                        <span class="input-left"><label><span class="label-text">
                                    注册提示：
                                </span><span class="input-required"></span></label></span>

                        <span class="input-right"><span class="input-static input-static-extra-large"><span class="static">
                                    <p>
                                        点击下方的“免费注册”按钮即代表我同意<a href="<?php echo SITEHOST ?>copyright.php" target="_blank">
                                            版权声明及免责条款
                                        </a>。
                                    </p>
                                </span></span></span>
                    </div>  

                    <div class="submit-row">
                        <div class="input-left"> </div>
                        <div class="input-right">
                            <button class="ui-button button1" type="submit" id="creation-submit" tabindex="1"><span class="button-left"><span class="button-right">免费注册战网安全令在线版账号</span></span></button>
                            <a class="ui-cancel "
                               href="<?php echo SITEHOST ?>"
                               tabindex="1">
                                <span>
                                    取消 </span>
                            </a>
                        </div>
                    </div>



                    <input type="hidden" name="agreedToToU" value="true" id="agreedToToU"/>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //<![CDATA[
    var FormMsg = {
        'headerSingular': '出错了。',
        'headerMultiple': '发生下列错误：',
        'fieldInvalid': '部分内容填写有误。',
        'fieldMissing': '此项为必填。',
        'fieldsMissing': '请填写全部必填项。',
        'emailInfo': '该邮箱将被用于发送密码找回邮件。',
        'emailMissing': '请输入一个有效的邮箱地址。',
        'emailInvalid': '无效的电子邮件地址。',
        'emailMismatch': '电子邮件地址必须相同。',
        'passwordInvalid': '不符合密码规则。',
        'passwordMismatch': '密码必须相同。',
        'touDisagree': '继续前您必须先接受协议。'
        , 'emailError1': '无效的邮箱地址。'
        , 'emailError2': '两次输入的邮箱地址必须相同。'
        , 'passwordError1': '密码不符合要求。'
        , 'passwordError2': '两次输入的密码必须相同。'
        , 'passwordStrength0': '过短'
        , 'passwordStrength1': '简单'
        , 'passwordStrength2': '一般'
        , 'passwordStrength3': '良好'
        , 'errorsHeader': '发生下列错误：'
        , 'errorHeader': '出错了。'
        , 'errorReq': '此项为必填。'
        , 'errorMismatch': '部分内容填写有误。'
        , 'errorEmail': '请输入有效的电子邮件地址。'
        , 'errorPlease': '请填写全部必填项。'
        , 'errorTerms': '继续前您必须先接受协议。'
        , 'selectCountry': 'You must select a Country of Residence.'
    };
    //]]>
</script>