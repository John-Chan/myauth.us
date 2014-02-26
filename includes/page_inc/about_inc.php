<?php
defined("ZHANGXUAN") or die("no hacker.");
$navurladd = SITEHOST . "about.php";
?>
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
            <div id="page-content">
                <div id="breadcrumb">
                    <ol class="ui-breadcrumb">
                        <li><a href="<?php echo SITEHOST; ?>">首页</a></li>
                        <li class="last"><a href="<?php echo $navurladd; ?>"><?php echo $topnavvalue ?></a></li>
                    </ol>
                </div>
                <div class="article-column">
                    <div id="article-container">
                        <div id="article">
                            <div class="article-games">
                                <a href="/"><img src="/resources/img/auth.png" alt=""></a>
                            </div>
                            <h2 id="article-title"> 欢迎使用战网安全令在线版 </h2>
                            <div id="article-content">
                                <h3 class="article-ci"> 关于本站 </h3>
                                <p>
                                    本站是由竹井詩織里开发的战网安全令颁发与动态密码查看站点<br>
                                    本站属于业余开发，请不要与专业团队相提并论，开发人员比较呆蠢笨，容易犯错误，如发现BUG请<a href="mailto:webmaster@myauth.us">联系我们</a>
                                </p>
                                <p>
                                    战网安全令在线版开发团队未非盈利机构，不会为本站服务向您强制收取任何费用，您所享受的一切服务都是免费的<br>
                                    请认准本站唯一域名<a href="<?php echo SITEHOST ?>"><?php echo SITEHOST ?></a>，虽然我们不钓鱼，但是其他网站说不定哪天就来钓本站的鱼了
                                </p>
                                <p>
                                    2014年2月26日正式版上线了,修复几个错误,同时邮件地址认证功能实装了.<br>代码开源了,地址:<a href="https://github.com/ymback/myauth.us">https://github.com/ymback/myauth.us</a>,License:GNU GPL v2.
                                </p>
                                <h3 class="article-ci"> 本站认证 </h3>
                                <p class="alignleft" style="font-size: 16px;margin-bottom: 0px;">①360网站安全认证</p>
                                <a href="http://webscan.360.cn/index/checkwebsite/url/www.myauth.us">
                                    <img border="0" src="http://img.webscan.360.cn/status/pai/hash/295153ef7bd118d60bd1e664e13de7a9" alt=""></a>
                                <p class="alignleft" style="font-size: 16px;margin-bottom: 0px;">②W3C-HTML代码验证</p>
                                <a href="http://validator.w3.org/check?uri=referer"><img
                                        src="http://www.w3.org/Icons/valid-xhtml10"
                                        alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
                                <p class="alignleft" style="font-size: 16px;margin-bottom: 0px;">③W3C-CSS3代码验证</p>
                                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                                    <img style="border:0;width:88px;height:31px"
                                         src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                                         alt="Valid CSS!" />
                                </a>

                                <p class="alignleft" style="font-size: 16px;margin-bottom: 0px;">④IPv6启用认证</p>
                                <div id=ipv6_enabled_www_test_logo></div>
                                <br>
                                <h3 class="article-ci"> 版权所有 </h3>
                                <p>战网安全令在线版 ©
                                    <?php
                                    if (date('Y') == 2013)
                                        echo "2013";
                                    else
                                        echo "2013-" . date('Y');
                                    ?> 竹井詩織里  <br>All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>

<script language="JavaScript" type="text/javascript">
    var Ipv6_Js_Server = (("https:" == document.location.protocol) ? "https://" : "http://");
    document.write(unescape("%3Cscript src='" + Ipv6_Js_Server + "www.ipv6forum.com/ipv6_enabled/sa/SA.php?id=4376' type='text/javascript'%3E%3C/script%3E"));
</script>   