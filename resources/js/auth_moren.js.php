<?php
 include('../../includes/config.php');?>
var XHRAX,authids; //定义一个全局对象
function createXHRAX(){
if(window.ActiveXObject){
XHRAX=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHRAX=new XMLHttpRequest();
}
}
function authmoren(authidac){
if(authidac!="" && authidac!=null){
createXHRAX();
authids=authidac;
document.getElementById("morenauthbutton"+authids).disabled="disabled";
document.getElementById("morenanquanlin"+authids).innerHTML="正在设置";
XHRAX.open("GET","<?php echo SITEHOST ?>includes/auth_moren/auth_moren.php?authid="+authids,true);
XHRAX.onreadystatechange=morenreceive;
XHRAX.send(null);
}
else{
document.getElementById("morenauthbutton"+authids).disabled="disabled";
document.getElementById("morenanquanlin"+authids).innerHTML="设置默认";
}
}
function morenreceive(){
if(XHRAX.readyState == 4 && XHRAX.status == 200){
var textHTML=XHRAX.responseText;
var jsondata = eval ("(" + textHTML + ")");//之前的默认oldmorenauthid，现在的默认newmorenauthid，是否成功
if(jsondata.result=="0"){
document.getElementById("morenanquanlin"+authids).innerHTML="设置失败";
document.getElementById("morenauthbutton"+authids).disabled="";
setTimeout('showtxtshezhimoren()',1500);
}else{
document.getElementById("morenanquanlin"+authids).innerHTML="设置成功";
document.getElementById("morenauthbutton"+authids).disabled="disabled";
document.getElementById("morenanquanlin"+jsondata.oldmorenauthid).innerHTML="设置默认";
document.getElementById("morenauthbutton"+jsondata.oldmorenauthid).disabled="";
document.getElementById("morenpicspan"+authids).innerHTML="<img class='morenauthleftpic' src='<?php echo SITEHOST;?>resources/img/moren.png' alt=''>";
document.getElementById("morenpicspan"+jsondata.oldmorenauthid).innerHTML="";
document.getElementById("morenanquanlin"+authids).innerHTML="已为默认";
serverauthmorenid=authids;
}
}}
function showtxtshezhimoren(){
document.getElementById("morenanquanlin"+authids).innerHTML="设置默认";
document.getElementById("morenauthbutton"+authids).disabled="";
}