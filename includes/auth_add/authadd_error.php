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
document.getElementById('ShowDiv').innerHTML = '<h3>将在'+num+'秒后自动跳转<br>如果你的浏览器不支持自动跳转，<a href="<?php echo $jumpurl; ?>">请点击跳转</a></h3>' ;
if(num == 0) { window.top.location.href=URL }
}
</script>

<link rel="stylesheet" href="resources/css/authbody.css" type="text/css" />
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
            <div id="page-content">
                <div id="breadcrumb">
                    <ol class="ui-breadcrumb">
                    <li><a href="<?php echo SITEHOST; ?>">首页</a></li>
                    <li class="last"><a href="<?php echo SITEHOST; ?>addauth.php"><?php echo $topnavvalue ?></a></li>
                    </ol>
                </div>
                </div>
            <div id="contentloged" class="login">
        <h2 style="text-align: center;"><br><br><?php echo $innertxt?></h2>
<script language="javascript">   
Load("<?php echo $jumpurl; ?>"); //要跳转到的页面   
</script>    
</div>
<div id="ShowDiv"></div>
            
          </div>
      </div>
</div>