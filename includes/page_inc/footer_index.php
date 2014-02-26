<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<div id="layout-bottom">
    <div id="homewrapperbotton">
    <div id="footer">
        <div id="footline">
<div id="sitemap">
<div class="column">
<h3 class="pages">
    <a href="<?php echo SITEHOST ?>" tabindex="100">站点页面</a>
</h3>
<ul>
<li><a href="<?php echo SITEHOST ?>welcome.php">WELCOME</a></li>
<li><a href="<?php echo SITEHOST ?>faq.php">FAQ</a></li>
<li><s>捐赠</s>(暂时不需要)</li>
</ul>
</div>
<div class="column">
<h3 class="auths">
<a href="<?php echo SITEHOST ?>myauthall.php" tabindex="100">安全令</a>
</h3>
<ul>
<li><a href="<?php echo SITEHOST ?>auth.php">默认安全令</a></li>
<li><a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a></li>
<li><a href="<?php echo SITEHOST ?>addauth.php">添加安全令</a></li>
</ul>
</div>
<div class="column">
<h3 class="account">
<a href="<?php echo SITEHOST ?>account.php" tabindex="100">账号</a>
</h3>
<ul>
<?php 
if($logincheck){
    echo "<li><a href='".SITEHOST."account.php'>查看我的账号</a></li>";
    echo "<li><a href='".SITEHOST."changepwd.php'>修改密码</a></li>";
    echo "<li><a href='".SITEHOST."changemailadd.php'>修改注册邮箱</a></li>";}
else{
    echo "<li><a href='".SITEHOST."forgetpwd.php'>忘记密码</a></li>";
    echo "<li><a href='".SITEHOST."register.php'>注册账号</a></li>";
    echo "<li><a href='".SITEHOST."login.php'>登入账号</a></li>";}
?>
</ul>
</div>
<div class="column">
<h3 class="setting">
<a href="<?php echo SITEHOST ?>" tabindex="100">其他</a>
</h3>
<ul>
<li><a href="<?php echo SITEHOST ?>copyright.php">版权声明及免责条款</a></li>
<li><a href="<?php echo SITEHOST ?>about.php">关于本站</a></li>
<li><a href="mailto:webmaster@myauth.us">联系</a></li>
</ul>
</div>
</div>
        <div id="copyright">
        战网安全令在线版 ©
            <?php if(date('Y')==2013)
                        echo "2013";
                   else
                        echo "2013-".date('Y'); ?> 竹井詩織里
        </div>
    </div></div>
</div>
</div>
 <script type="text/javascript">
    $(document).ready(function() {
   $("#page-content").height($(".article-column").outerHeight(true));
   if($("#layout-middle").outerHeight(true)<360){
   $("#layout-bottom").css("background", "url('/resources/img/toumin.png') no-repeat 50% 70%");
   }
   <?php echo "document.getElementById('isolated').innerHTML='$topnavvalue'";
   ?>
});
</script>
</body>
</html>
