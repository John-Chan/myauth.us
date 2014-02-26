<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<script language='javascript' type='text/javascript'>
var secs =6; //倒计时的秒数
var URL ;
function Load(url){
URL =url;
for(var i=secs;i>=0;i--)
{
window.setTimeout('doUpdate(' + i + ')', (secs-i) * 1000);
}
}
function doUpdate(num)
{
document.getElementById('ShowDiv').innerHTML = '<h3>一封密码重置邮件已经发送到你的邮箱，请点击邮件中的链接更改您的密码，即将跳转到主页</h3><h4><br>将在'+num+'秒后自动跳转<br>如果你的浏览器不支持自动跳转，<a href="<?php echo SITEHOST ?>">请点击跳转</a></h4>' ;
if(num == 0) { window.top.location.href=URL }
}
</script>
<link rel="stylesheet" href="resources/css/forgetpsd.css" type="text/css" />
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
               <div id="page-header">
                <p class="privacy-message"><b>
                        确认成功。
                        </b>
                         阅读我们的<a href="<?php echo SITEHOST ?>copyright.php" target="_blank">
                        版权声明及免责条款
                        </a>，了解您的注意事项。
                    </p>
            </div>
            <div id="contentloged" class="login">
        <h2 style="text-align: center;"><br><br>恭喜您，信息确认成功</h2>
<script language="javascript">   
Load("<?php echo SITEHOST ?>"); //要跳转到的页面   
</script>    
</div>
<div id="ShowDiv"></div>
            </div>
        </div>
    </div>