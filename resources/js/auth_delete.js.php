<?php
 include('../../includes/config.php');?>
var XHRL,authids; //定义一个全局对象
function createXHRL(){
if(window.ActiveXObject){
XHRL=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHRL=new XMLHttpRequest();
}
}
function authdelete(authidb){
if(authidb!="" && authidb!=null){
createXHRL();
authids=authidb;
document.getElementById("authdelbutton"+authids).disabled="disabled";
document.getElementById("shanchuauth"+authids).innerHTML="正在删除";
XHRL.open("GET","<?php echo SITEHOST ?>includes/auth_del/auth_del.php?authid="+authids,true);
XHRL.onreadystatechange=deletereceive;
XHRL.send(null);
}
else{
document.getElementById("authdelbutton"+authids).disabled="";
document.getElementById("shanchuauth"+authids).innerHTML="确认删除";
}
}
function deletereceive(){
if(XHRL.readyState == 4 && XHRL.status == 200){
var textHTML=XHRL.responseText;
var jsondata = eval ("(" + textHTML + ")");
if(jsondata.result==0){
document.getElementById("shanchuauth"+authids).innerHTML="删除失败";
document.getElementById("authdelbutton"+authids).disabled="";
setTimeout('showtxtshanchu()',1500);
}else{
if(jsondata.oldmorendeleted==0){
document.getElementById("shanchuauth"+authids).innerHTML="删除成功";
document.getElementById("youshangfangtianjiaABC").innerHTML="<a class='ui-button button1' href='<?php echo SITEHOST; ?>addauth.php'><span class='button-left'><span class='button-right'>添加一个安全令</span></span></a>";
document.getElementById("authdelbutton"+authids).disabled="";
$("#henxiangtr"+authids).animate({marginBottom:'toggle'},{duration:1500});
}else{
if(jsondata.newmorenid>0){
document.getElementById("morenpicspan"+jsondata.deleteauid).innerHTML="";
document.getElementById("morenpicspan"+jsondata.newmorenid).innerHTML="<img class='morenauthleftpic' src='<?php echo SITEHOST;?>resources/img/moren.png' alt=''>";
document.getElementById("shanchuauth"+authids).innerHTML="删除成功";
document.getElementById("youshangfangtianjiaABC").innerHTML="<a class='ui-button button1' href='<?php echo SITEHOST; ?>addauth.php'><span class='button-left'><span class='button-right'>添加一个安全令</span></span></a>";
document.getElementById("authdelbutton"+authids).disabled="";
$("#henxiangtr"+authids).animate({marginBottom:'toggle'},{duration:1500});}
else{
document.getElementById("shanchuauth"+authids).innerHTML="删除成功";
document.getElementById("youshangfangtianjiaABC").innerHTML="<a class='ui-button button1' href='<?php echo SITEHOST; ?>addauth.php'><span class='button-left'><span class='button-right'>添加一个安全令</span></span></a>";
document.getElementById("authdelbutton"+authids).disabled="";
$("#henxiangtr"+authids).animate({marginBottom:'toggle'},{duration:1500});}
}
}
}}
function showtxtshanchu(){
document.getElementById("shanchuauth"+authid).innerHTML="确认删除";
}