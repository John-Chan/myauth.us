<?php
 include('../../includes/config.php');?>
var XHR,authid; //定义一个全局对象
function createXHR(){
if(window.ActiveXObject){
XHR=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHR=new XMLHttpRequest();
}
}

function authsync(authida){
if(authida!="" && authida!=null){
createXHR();
authid=authida;
document.getElementById("authsyncbutton"+authid).disabled="disabled";
document.getElementById("jiaochenshijian"+authid).innerHTML="正在校正";
XHR.open("GET","<?php echo SITEHOST ?>includes/auth_sync/auth_sync.php?authid="+authid,true);
XHR.onreadystatechange=syncreceive;
XHR.send(null);
}
else{
document.getElementById("authsyncbutton"+authid).disabled="";
document.getElementById("jiaochenshijian"+authid).innerHTML="校正时间";
}
}
function syncreceive(){
if(XHR.readyState == 4 && XHR.status == 200){
var textHTML=XHR.responseText;
if(textHTML=="false"){
document.getElementById("jiaochenshijian"+authid).innerHTML="校正失败";
document.getElementById("authsyncbutton"+authid).disabled="";
setTimeout('showtxtjiaochenshijian()',1500);
}else{
document.getElementById("jiaochenshijian"+authid).innerHTML="校正成功";
document.getElementById("authshangcitongbushijian"+authid).innerHTML=textHTML;
document.getElementById("authsyncbutton"+authid).disabled="";
setTimeout('showtxtjiaochenshijian()',1500);
}
}}
function showtxtjiaochenshijian(){
document.getElementById("jiaochenshijian"+authid).innerHTML="校正时间";
}