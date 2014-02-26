<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<script language='javascript' type='text/javascript'>
var secs =3; //倒计时的秒数
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
document.getElementById('dumiao').innerHTML = '将在'+num+'秒后自动跳转' ;
if(num == 0) { window.top.location.href=URL }
}
</script>
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
               <div id="page-header">
                <p class="privacy-message"><b>
                        重复注册很没有必要！！！
                        </b>
                         阅读我们的<a href="<?php echo SITEHOST ?>copyright.php" target="_blank">
                        版权声明及免责条款
                        </a>，了解您的注意事项。
                    </p>
            </div>
            <div class="alert error closeable border-4 glow-shadow">
                <div class="alert-inner"><div class="alert-message"><p class="title"><strong><a name="form-errors"> </a>发生错误：</strong></p><ul><li>您已经登入了，请不要重复注册</li><li id="dumiao"></li><li>如果你的浏览器不支持自动跳转，<a href="<?php echo SITEHOST ?>">请点击跳转</a></li></ul></div></div></div>
            
            </div>
        </div>
<script language="javascript">
Load("<?php echo SITEHOST ?>");
</script>
    </div>