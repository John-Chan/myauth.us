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
document.getElementById('ShowDiv').innerHTML = '<h3>将在'+num+'秒后自动跳转<br>如果你的浏览器不支持自动跳转，<a href="<?php echo SITEHOST ?>">请点击跳转</a></h3>' ;
if(num == 0) { window.top.location.href=URL }
}
</script>

<link rel="stylesheet" href="../../resources/css/authbody.css" type="text/css" />
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
                </div>
            <div id="contentloged" class="login">
        <h2 style="text-align: center;"><br><br><?php 
        if($autherrid==1)
            echo "这枚安全令不是你的，请不要这么变态。";
        else if($autherrid==2)
            echo "安全令编号错误，请检查后再试。";
        else if($autherrid==3)
            echo "不要这样吧，不登入也想玩？";
        else if($autherrid!=0)
            echo "未知错误，要不去找下鹳狸猿吧。"?>即将返回主页。</h2>
<script language="javascript">   
Load("<?php echo SITEHOST ?>"); //要跳转到的页面   
</script>    
</div>
<div id="ShowDiv"></div>
            
          </div>
      </div>
</div>