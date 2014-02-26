<?php include('../../includes/config.php')?>
var XHR; //定义一个全局对象
function createXHR(){
if(window.ActiveXObject){
XHR=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHR=new XMLHttpRequest();
}
}
function checkyanzhenma(unvalue){
if(unvalue!="" && unvalue!=null){
createXHR();
document.getElementById('checkyanzhenmaajax').innerHTML="<img src='/resources/img/waiting.gif' alt=''>";
//document.getElementById("creation-submit").disabled="";
XHR.open("GET","<?php echo SITEHOST ?>includes/check/checkyanzhenma.php?code="+unvalue,true);
XHR.onreadystatechange=bbcheck;
XHR.send(null);
}
else{
document.getElementById('checkyanzhenmaajax').innerHTML="";
//document.getElementById("creation-submit").disabled="";
}}

function bbcheck(){
if(XHR.readyState == 4 && XHR.status == 200){
var textHTML=XHR.responseText;
if(textHTML=="true"){
    document.getElementById('checkyanzhenmaajax').innerHTML="<img src='/resources/img/success.png' alt=''>";
    //document.getElementById("creation-submit").disabled="";
}else if(textHTML=="false"){
document.getElementById('checkyanzhenmaajax').innerHTML="<img src='/resources/img/warning2.png' alt=''>";
//document.getElementById("creation-submit").disabled="disabled";
}else{
    document.getElementById('checkyanzhenmaajax').innerHTML="";
//document.getElementById("creation-submit").disabled="disabled";
}
}
}