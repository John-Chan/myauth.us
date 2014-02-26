<?php include('../../includes/config.php')?>
var XHR; //定义一个全局对象
function createXHR(){
if(window.ActiveXObject){
XHR=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHR=new XMLHttpRequest();
}
}
function checkname(unvalue){
if(unvalue!="" && unvalue!=null){
createXHR();
document.getElementById('checkusernameajax').innerHTML="<img src='/resources/img/waiting.gif' alt=''>查询用户名是否可用";
    document.getElementById("creation-submit").disabled="";
XHR.open("GET","<?php echo SITEHOST ?>includes/check/checkusername.php?id="+unvalue,true);
XHR.onreadystatechange=bacheck;
XHR.send(null);}
else{
document.getElementById('checkusernameajax').innerHTML="";
document.getElementById("creation-submit").disabled="";
}
}
function checkyanzhenma(unvalue){
if(unvalue!="" && unvalue!=null){
createXHR();
document.getElementById('checkyanzhenmaajax').innerHTML="<img src='/resources/img/waiting.gif' alt=''>";
document.getElementById("creation-submit").disabled="";
XHR.open("GET","<?php echo SITEHOST ?>includes/check/checkyanzhenma.php?code="+unvalue,true);
XHR.onreadystatechange=bbcheck;
XHR.send(null);
}
else{
document.getElementById('checkyanzhenmaajax').innerHTML="";
document.getElementById("creation-submit").disabled="";
}}
function bacheck(){
if(XHR.readyState == 4 && XHR.status == 200){
var textHTML=XHR.responseText;
if(textHTML=="true"){
    document.getElementById('checkusernameajax').innerHTML="<img src='/resources/img/success.png' alt=''>用户名可以使用";
    document.getElementById("creation-submit").disabled="";
}else if(textHTML=="false"){
document.getElementById('checkusernameajax').innerHTML="<img src='/resources/img/warning-triangle.gif' alt=''>用户名已被占用";
document.getElementById("creation-submit").disabled="disabled";
}else if(textHTML=="inlegal"){
document.getElementById('checkusernameajax').innerHTML="<img src='/resources/img/warning-triangle.gif' alt=''>用户名仅允许使用中文、数字、字母及下划线";
document.getElementById("creation-submit").disabled="disabled";
}
else{
    document.getElementById('checkusernameajax').innerHTML="";
document.getElementById("creation-submit").disabled="disabled";
}
}
}
function bbcheck(){
if(XHR.readyState == 4 && XHR.status == 200){
var textHTML=XHR.responseText;
if(textHTML=="true"){
    document.getElementById('checkyanzhenmaajax').innerHTML="<img src='/resources/img/success.png' alt=''>";
    document.getElementById("creation-submit").disabled="";
}else if(textHTML=="false"){
document.getElementById('checkyanzhenmaajax').innerHTML="<img src='/resources/img/warning2.png' alt=''>";
document.getElementById("creation-submit").disabled="disabled";
}else{
    document.getElementById('checkyanzhenmaajax').innerHTML="";
document.getElementById("creation-submit").disabled="disabled";
}
}
}