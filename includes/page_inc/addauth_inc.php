<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<link rel="stylesheet" href="../../resources/css/addauth.css" type="text/css" />
<script type="text/javascript" src="../../resources/js/bam.js"></script>
<script type="text/javascript" src="../../resources/js/dashboard.js"></script>
<script type="text/javascript" src="../../resources/js/addauth_ajaxcheck.js.php"></script> 
<script type="text/javascript" src="../../resources/js/authadd.js"></script> 
<script type='text/javascript'>
    jquerycodechecked1=false;
    jquerycodechecked2=false;
    jquerycodechecked3=false;
    //<![CDATA[
    $(document).ready(function(){
        $("#letters_code1").keyup(function(){
            if($("#letters_code1")[0].value.length==6){
                checkyanzhenma($("#letters_code1")[0].value,1);
                jquerycodechecked1=true;
            }else{
                jquerycodechecked1=false;
                document.getElementById('checkyanzhenmaajax1').innerHTML = "";
            }
        });
        $("#letters_code2").keyup(function(){
            if($("#letters_code2")[0].value.length==6){
                checkyanzhenma($("#letters_code2")[0].value,2);
                jquerycodechecked2=true;
            }else{
                jquerycodechecked2=false;
                document.getElementById('checkyanzhenmaajax2').innerHTML = "";
            }
        });
        $("#letters_code3").keyup(function(){
            if($("#letters_code3")[0].value.length==6){
                checkyanzhenma($("#letters_code3")[0].value,3);
                jquerycodechecked3=true;
            }else{
                jquerycodechecked3=false;
                document.getElementById('checkyanzhenmaajax3').innerHTML = "";
            }
        });
    });
    //]]>
</script> 
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
            <div id="page-header">
                <h2 class="subcategory">
                    战网安全令
                </h2> <h3 class="headline"> 添加一枚新的安全令 </h3>
            </div>
            <div class="columns-2-1 landing-introduction">
                <div class="column column-left">
                    <p>
                        在这里，您可以通过三种方式快速地向您的账号中添加一枚新的战网安全令，请注意，您最多只能添加&nbsp;<?php echo MOST_AUTH; ?>&nbsp;枚安全令至您的账号。<br>
                        ①您可以通过服务器直接向暴雪请求一枚新的战网安全令<br>
                        ②提交您已有安全令的序列号及密钥(40位)快速恢复一枚新的战网安全令。<br>
                        ③提交您已有安全令的序列号及还原码(10位)快速恢复一枚新的战网安全令。
                    </p>
                    <p>
                        如果想管理已有的安全令，请访问
                        <a href="<?php echo SITEHOST; ?>myauthall.php" tabindex="1">我的安全令</a>
                        。如有任何疑问，请参访
                        <a href="<?php echo SITEHOST; ?>faq.php" tabindex="1">FAQ</a>。
                    </p>
                    <p style="color: red;">
                        特别说明:如果点击创建安全令后进入的页面未显示任何提示，请直接在该页面刷新，这个问题是由于创建/还原需要与暴雪服务器交互
                    </p>
                </div>
                <div class="column column-right">
                    <div class="landing-promotion"></div>
                </div>
            </div>
            <div class="dashboard cn">
                <div class="secondary">
                    <div class="service-selection additional-services">
                        <ul class="wow-services">
                            <li class="category">
                                <a class="additional-services" href="#additional-services">
                                    通过服务器请求一枚新安全令
                                </a>
                            </li>
                            <li class="category">
                                <a class="character-services" href="#character-services">
                                    通过密钥(40位)恢复一枚安全令
                                </a>
                            </li>
                            <li class="category">
                                <a class="game-time-subscriptions" href="#game-time-subscriptions">
                                    通过还原码(10位)恢复一枚安全令
                                </a>
                            </li>
                        </ul>
                        <div class="service-links">
                            <div class="position"></div>
                            <div id="additional-services" class="content additional-services">

                                <form action="<?php echo SITEHOST; ?>addbyserver.php" method="post" id="creation" novalidate="novalidate">
                                    <div id="page-header" class="pageheadernav">
                                        <p class="privacy-message">点击生成将依照设定的地区向暴雪目标服务器请求一枚新的安全令，其设定为：中国(CN)，美国(US)，欧洲(EU)。<br>若不选择将默认向暴雪中国服务器发出请求。</p>
                                    </div>
                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="firstname">
                                                <span class="label-text">
                                                    安全令名称：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">
                                            <span class="input-text input-text-small">
                                                <input type="text" name="authname" value="" id="firstname" onfocus="if(authnameerrorid==1){this.value='';authnameerrorid==0;document.getElementById('creation-submit1').disabled='';}" onblur="checkname(this,1);" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="12" tabindex="1" required="required" placeholder="小于等于12个字符">
                                                <span id="checkusernameajax1" class="checkusernameajax"></span>
                                                <span class="inline-message " id="firstname-message"> </span>
                                            </span>
                                        </span>
                                    </div>

                                    <div class="input-row input-row-select">
                                        <span class="input-left">
                                            <label for="question1">
                                                <span class="label-text">
                                                    请选择暴雪服务器地区：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">

                                            <span class="input-select input-select-small">
                                                <select name="region" id="question1" class="selectwitthnav1 small border-5 glow-shadow-2" tabindex="1" required="required">
                                                    <option value="11" selected="selected">选择一个地区发出令牌生成申请,默认为中国</option>
                                                    <option value="11">CN&nbsp;&nbsp;&nbsp;&nbsp;(暴雪中国服务器,cn.battle.net)</option>
                                                    <option value="12">US&nbsp;&nbsp;&nbsp;&nbsp;(暴雪美国服务器,us.battle.net)</option>
                                                    <option value="13">EU&nbsp;&nbsp;&nbsp;&nbsp;(暴雪欧洲服务器,eu.battle.net)</option>
                                                </select>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="input-row input-row-note question-info" id="question-info" style="display: none;">
                                        <span id="question1-message" class="inline-message no-text-clear">您将需要使用该信息进行身份验证，以便在将来找回密码时使用。该内容确定后无法修改。</span>
                                    </div>


                                    <div class="input-row input-row-radiopic">
                                        <span class="input-left">
                                            <label for="radiobutton">
                                                <span class="label-text">
                                                    安全令图片：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right input-picradio">
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/wow-32.png">
                                                <input id="radiobutton" name="selectpic" type="radio" value="1" checked="true" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/s2-32.png">
                                                <input id="radiobutton" name="selectpic" type="radio" value="2" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/d3-32.png">
                                                <input id="radiobutton" name="selectpic" type="radio" value="3" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/pegasus-32.png">
                                                <input id="radiobutton" name="selectpic" type="radio" value="4" />
                                            </span>
                                            <span class="inline-message " id="firstname-message"> </span>
                                        </span>
                                    </div>


                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="letters_code1">
                                                <span class="label-text">
                                                    验证码：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span>
                                        <span class="input-right">
                                            <div class="imgandreloader">
                                                <div id="captcha-image"><img id="sec-string1" onclick="refreshCaptcha(1);document.getElementById('letters_code1').focus();" src="/includes/check/code.php?rand=8" alt="换一个" title="换一个" class="border-5" /></div>
                                                <div id="captcha-reloader">
                                                    看不清楚？<br />
                                                    <a href="javascript:void(0);" onclick="refreshCaptcha(1);document.getElementById('letters_code1').focus();">换一个</a>
                                                </div><span class="input-static input-static-extra-large"><span class="static"><p><label class="label" for="letters_code1">
                                                                出于安全性考虑，请输入上方图示中的字符。（这并不是您的密码）</label></p></span></span>
                                            </div>
                                            <span class="input-text input-text-small">
                                                <input type="text" name="letters_code" value="" onfocus="document.getElementById('creation-submit1').disabled='disabled';" onblur="if(!jquerycodechecked1){checkyanzhenma(this.value,1);}" id="letters_code1" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="6" tabindex="1" required="required" placeholder="输入验证码" />
                                                <span id="checkyanzhenmaajax1" class="checkyanzhenmaajax"></span>
                                                <span class="inline-message " id="emailAddress-message"> </span>
                                            </span>
                                            <span id="remember-me"><label for="persistLogin">
                                                    <input id="persistLogin" type="checkbox" name="morenauthset">设置为默认安全令
                                                </label> </span>
                                        </span>
                                    </div>



                                    <div class="submit-row">
                                        <div class="input-left"> </div>
                                        <div class="input-right">
                                            <button class="ui-button button1" type="submit" id="creation-submit1" tabindex="1"><span class="button-left"><span class="button-right">通过服务器生成安全令</span></span></button>
                                            <a class="ui-cancel "
                                               href="<?php echo SITEHOST ?>"
                                               tabindex="1">
                                                <span>
                                                    取消 </span>
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="agreedToToU" value="true" id="agreedToToU">
                                </form>
                            </div>

                            <div id="character-services" class="content character-services">

                                <form action="<?php echo SITEHOST; ?>addbykey.php" method="post" id="creation" novalidate="novalidate">
                                    <div id="page-header" class="pageheadernav">
                                        <p class="privacy-message">请在第二行中输入安全令序列号(类似于US-1234-5678-9012)，横线不必输入。<br>请在第三行中输入40位密钥(类似于F192F7441D4E4FDA1E21E837C9DCAD4510E726BA)，查找方式请参见<a href="<?php echo SITEHOST; ?>faq.php">FAQ</a></p>
                                    </div>
                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="firstname2">
                                                <span class="label-text">
                                                    安全令名称：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">
                                            <span class="input-text input-text-small">
                                                <input type="text" name="authname" value="" id="firstname2" onfocus="if(authnameerrorid==1){this.value='';authnameerrorid==0;document.getElementById('creation-submit2').disabled='';}" onblur="checkname(this,2);" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="12" tabindex="1" required="required" placeholder="小于等于12个字符">
                                                <span id="checkusernameajax2" class="checkusernameajax"></span>
                                                <span class="inline-message " id="firstname-message"> </span>
                                            </span>
                                        </span>
                                    </div>

                                    <div class="input-row input-row-select">
                                        <span class="input-left">
                                            <label for="question2">
                                                <span class="label-text">
                                                    请输入安全令序列号：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">

                                            <span class="input-select input-select-keysmall">
                                                <select name="region" id="question2" class="selectwitthnav2 small border-5 glow-shadow-2" tabindex="1" required="required">
                                                    <option value="21" selected="selected">CN</option>
                                                    <option value="22">US</option>
                                                    <option value="23">EU</option>
                                                </select>
                                                <span class="label-text1">-</span>
                                                <span class="input-text input-text-litsmall input-littext">
                                                    <input type="text" id="authcodeA2" onkeyup="if(this.value.length==4){document.getElementById('authcodeB2').focus();return true}else return false;" name="authcodeA2" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="4" tabindex="1" required="required" placeholder="1-4"></span>
                                                <span class="label-text1">-</span>
                                                <span class="input-text input-text-litsmall input-littext">
                                                    <input type="text" id="authcodeB2" onkeydown="if(this.value.length==0 && event.keyCode==8){document.getElementById('authcodeA2').focus();return true}" onkeyup="if(this.value.length==4){document.getElementById('authcodeC2').focus();return true}else return false;"  name="authcodeB2" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="4" tabindex="1" required="required" placeholder="5-8"></span>
                                                <span class="label-text1">-</span>
                                                <span class="input-text input-text-litsmall input-littext">
                                                    <input type="text" id="authcodeC2"  onkeydown="if(this.value.length==0 && event.keyCode==8){document.getElementById('authcodeB2').focus();return true}"  name="authcodeC2" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="4" tabindex="1" required="required" placeholder="9-12"></span>
                                                <span id="checkkey2" class="checkseries"></span>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="input-row input-row-note question-info" id="question-info" style="display: none;">
                                        <span id="question1-message" class="inline-message no-text-clear">这是您安全令的序列号，请核对输入，横线不用填。</span>
                                    </div>


                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="key2">
                                                <span class="label-text">
                                                    密钥：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">
                                            <span class="input-text input-text-keysmall">
                                                <input type="text" name="authkey" value="" onfocus="if(authkeyerrorid==1){this.value='';authkeyerrorid==0;document.getElementById('creation-submit2').disabled='';}" onblur="checkkey(this,2);" id="key2" class="small border-5 glow-shadow-2 keysmall" autocomplete="off" maxlength="40" tabindex="1" required="required" placeholder="40个字符长度的密钥，大小写请随意">
                                                <span id="checkuserkey2" class="checkauthkey"></span>
                                                <span class="inline-message " id="firstname-message"> </span>
                                            </span>
                                        </span>
                                    </div>

                                    <div class="input-row input-row-radiopic">
                                        <span class="input-left">
                                            <label for="radiobutton2">
                                                <span class="label-text">
                                                    安全令图片：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right input-picradio">
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/wow-32.png">
                                                <input id="radiobutton2" name="selectpic" type="radio" value="1" checked="true" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/s2-32.png">
                                                <input id="radiobutton2" name="selectpic" type="radio" value="2" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/d3-32.png">
                                                <input id="radiobutton2" name="selectpic" type="radio" value="3" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/pegasus-32.png">
                                                <input id="radiobutton" name="selectpic" type="radio" value="4" />
                                            </span>
                                            <span class="inline-message " id="firstname-message"> </span>
                                        </span>
                                    </div>


                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="letters_code2">
                                                <span class="label-text">
                                                    验证码：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span>
                                        <span class="input-right">
                                            <div class="imgandreloader">
                                                <div id="captcha-image"><img id="sec-string2" onclick="refreshCaptcha(2);document.getElementById('letters_code2').focus();" src="/includes/check/code.php?rand=8" alt="换一个" title="换一个" class="border-5" /></div>
                                                <div id="captcha-reloader">
                                                    看不清楚？<br />
                                                    <a href="javascript:void(0);" onclick="refreshCaptcha(2);document.getElementById('letters_code2').focus();">换一个</a>
                                                </div><span class="input-static input-static-extra-large"><span class="static"><p><label class="label" for="letters_code2">
                                                                出于安全性考虑，请输入上方图示中的字符。（这并不是您的密码）</label></p></span></span>
                                            </div>
                                            <span class="input-text input-text-small">
                                                <input type="text" name="letters_code" value="" onfocus="document.getElementById('creation-submit2').disabled='disabled';" onblur="if(!jquerycodechecked2){checkyanzhenma(this.value,2);}" id="letters_code2" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="6" tabindex="1" required="required" placeholder="输入验证码" />
                                                <span id="checkyanzhenmaajax2" class="checkyanzhenmaajax"></span>
                                                <span class="inline-message " id="emailAddress-message"> </span>
                                            </span>
                                            <span id="remember-me"><label for="persistLogin2">
                                                    <input id="persistLogin2" type="checkbox" name="morenauthset">设置为默认安全令
                                                </label></span>
                                        </span>
                                    </div>



                                    <div class="submit-row">
                                        <div class="input-left"> </div>
                                        <div class="input-right">
                                            <button class="ui-button button1" onclick="if(checkseries(2))return true;else return false;" type="submit" id="creation-submit2" tabindex="1"><span class="button-left"><span class="button-right">恢复安全令</span></span></button>
                                            <a class="ui-cancel "
                                               href="<?php echo SITEHOST ?>"
                                               tabindex="1">
                                                <span>
                                                    取消 </span>
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="agreedToToU" value="true" id="agreedToToU">
                                </form>
                            </div>


                            <div id="game-time-subscriptions" class="content game-time-subscriptions"> 
                                <form action="<?php echo SITEHOST; ?>addbyrestore.php" method="post" id="creation" novalidate="novalidate">
                                    <div id="page-header" class="pageheadernav">
                                        <p class="privacy-message">请在第二行中输入安全令序列号(类似于US-1234-5678-9012)，横线不必输入。<br>请在第三行中输入10位还原码(类似于5S4GVQ2R6B)，还原码请参见<a href="<?php echo SITEHOST; ?>faq.php">FAQ</a></p>
                                    </div>
                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="firstname3">
                                                <span class="label-text">
                                                    安全令名称：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">
                                            <span class="input-text input-text-small">
                                                <input type="text" name="authname" value="" id="firstname3" onfocus="if(authnameerrorid==1){this.value='';authnameerrorid==0;document.getElementById('creation-submit3').disabled='';}" onblur="checkname(this,3);" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="12" tabindex="1" required="required" placeholder="小于等于12个字符">
                                                <span id="checkusernameajax3" class="checkusernameajax"></span>
                                                <span class="inline-message " id="firstname-message"> </span>
                                            </span>
                                        </span>
                                    </div>

                                    <div class="input-row input-row-select">
                                        <span class="input-left">
                                            <label for="question3">
                                                <span class="label-text">
                                                    请选择暴雪服务器地区：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">

                                            <span class="input-select input-select-keysmall">
                                                <select name="region" id="question3" class="selectwitthnav2 small border-5 glow-shadow-2" tabindex="1" required="required">
                                                    <option value="21" selected="selected">CN</option>
                                                    <option value="22">US</option>
                                                    <option value="23">EU</option>
                                                </select>
                                                <span class="label-text1">-</span>
                                                <span class="input-text input-text-litsmall input-littext"><input type="text" id="authcodeA3"  onkeyup="if(this.value.length==4){document.getElementById('authcodeB3').focus();return true}else return false;"  name="authcodeA3" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="4" tabindex="1" required="required" placeholder="1-4"></span>
                                                <span class="label-text1">-</span>
                                                <span class="input-text input-text-litsmall input-littext"><input type="text" id="authcodeB3" onkeydown="if(this.value.length==0 && event.keyCode==8){document.getElementById('authcodeA3').focus();return true}"  onkeyup="if(this.value.length==4){document.getElementById('authcodeC3').focus();return true}else return false;" name="authcodeB3" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="4" tabindex="1" required="required" placeholder="5-8"></span>
                                                <span class="label-text1">-</span>
                                                <span class="input-text input-text-litsmall input-littext"> <input type="text" id="authcodeC3" onkeydown="if(this.value.length==0 && event.keyCode==8){document.getElementById('authcodeB3').focus();return true}"   name="authcodeC3" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="4" tabindex="1" required="required" placeholder="9-12"></span>
                                                <span id="checkkey3" class="checkseries"></span>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="input-row input-row-note question-info" id="question-info" style="display: none;">
                                        <span id="question1-message" class="inline-message no-text-clear">这是您安全令的序列号，请核对输入，横线不用填。</span>
                                    </div>


                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="key3">
                                                <span class="label-text">
                                                    还原码：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right">
                                            <span class="input-text input-text-small">
                                                <input type="text" name="authrestore" value="" onfocus="if(authrestoreerrorid==1){this.value='';authrestoreerrorid==0;document.getElementById('creation-submit3').disabled='';}" onblur="checkrestore(this,3);" id="key3" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="10" tabindex="1" required="required" placeholder="10个字符长度的密钥，大小写请随意">
                                                <span id="checkrestore3" class="checkyanzhenmaajax"></span>
                                                <span class="inline-message " id="firstname-message"> </span>
                                            </span>
                                        </span>
                                    </div>

                                    <div class="input-row input-row-radiopic">
                                        <span class="input-left">
                                            <label for="radiobutton3">
                                                <span class="label-text">
                                                    安全令图片：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span><!--
                                        --><span class="input-right input-picradio">
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/wow-32.png">
                                                <input id="radiobutton3" name="selectpic" type="radio" value="1" checked="true" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/s2-32.png">
                                                <input id="radiobutton3" name="selectpic" type="radio" value="2" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/d3-32.png">
                                                <input id="radiobutton3" name="selectpic" type="radio" value="3" />
                                            </span>
                                            <span class="radioandpic">
                                                <img class="spanradioimg" src="<?php echo SITEHOST; ?>resources/img/pegasus-32.png">
                                                <input id="radiobutton" name="selectpic" type="radio" value="4" />
                                            </span>
                                            <span class="inline-message " id="firstname-message"> </span>
                                        </span>
                                    </div>


                                    <div class="input-row input-row-text">
                                        <span class="input-left">
                                            <label for="letters_code3">
                                                <span class="label-text">
                                                    验证码：
                                                </span>
                                                <span class="input-required">*</span>
                                            </label>
                                        </span>
                                        <span class="input-right">
                                            <div class="imgandreloader">
                                                <div id="captcha-image"><img id="sec-string3" onclick="refreshCaptcha(3);document.getElementById('letters_code3').focus();" src="/includes/check/code.php?rand=8" alt="换一个" title="换一个" class="border-5" /></div>
                                                <div id="captcha-reloader">
                                                    看不清楚？<br />
                                                    <a href="javascript:void(0);" onclick="refreshCaptcha(3);document.getElementById('letters_code3').focus();">换一个</a>
                                                </div><span class="input-static input-static-extra-large"><span class="static"><p><label class="label" for="letters_code3">
                                                                出于安全性考虑，请输入上方图示中的字符。（这并不是您的密码）</label></p></span></span>
                                            </div>
                                            <span class="input-text input-text-small">
                                                <input type="text" name="letters_code" value="" onfocus="document.getElementById('creation-submit3').disabled='disabled';" onblur="if(!jquerycodechecked3){checkyanzhenma(this.value,3);}" id="letters_code3" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="6" tabindex="1" required="required" placeholder="输入验证码" />
                                                <span id="checkyanzhenmaajax3" class="checkyanzhenmaajax"></span>
                                                <span class="inline-message " id="emailAddress-message"> </span>
                                            </span>
                                            <span id="remember-me"><label for="persistLogin3">
                                                    <input id="persistLogin3" type="checkbox" name="morenauthset">设置为默认安全令
                                                </label></span>
                                        </span>
                                    </div>



                                    <div class="submit-row">
                                        <div class="input-left"> </div>
                                        <div class="input-right">
                                            <button class="ui-button button1" onclick="if(checkseries(3))return true;else return false;" type="submit" id="creation-submit3" tabindex="1"><span class="button-left"><span class="button-right">恢复安全令</span></span></button>
                                            <a class="ui-cancel" href="<?php echo SITEHOST ?>" tabindex="1">
                                                <span>
                                                    取消 </span>
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="agreedToToU" value="true" id="agreedToToU">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>