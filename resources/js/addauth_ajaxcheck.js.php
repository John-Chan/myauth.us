<?php include('../../includes/config.php')?>
var XHR; //定义一个全局对象
var ajaxallid;
function createXHR(){
if(window.ActiveXObject){
XHR=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHR=new XMLHttpRequest();
}
}
function checkyanzhenma(unvalue,inputid){
ajaxallid=inputid;
if(unvalue!="" && unvalue!=null && inputid!="" && inputid!=null){
createXHR();
document.getElementById('checkyanzhenmaajax'+inputid).innerHTML="<img src='/resources/img/waiting.gif' alt=''>";
document.getElementById("creation-submit"+inputid).disabled="";
XHR.open("GET","<?php echo SITEHOST ?>includes/check/checkyanzhenma.php?code="+unvalue,true);
XHR.onreadystatechange=bbcheck;
XHR.send(null);
}
else{
document.getElementById('checkyanzhenmaajax'+inputid).innerHTML="";
document.getElementById("creation-submit"+inputid).disabled="";
}}

function bbcheck(){
if(XHR.readyState == 4 && XHR.status == 200){
var textHTML=XHR.responseText;
if(textHTML=="true"){
    document.getElementById('checkyanzhenmaajax'+ajaxallid).innerHTML="<img src='/resources/img/success.png' alt=''>";
    document.getElementById("creation-submit"+ajaxallid).disabled="";
}else if(textHTML=="false"){
document.getElementById('checkyanzhenmaajax'+ajaxallid).innerHTML="<img src='/resources/img/warning2.png' alt=''>";
document.getElementById("creation-submit"+ajaxallid).disabled="disabled";
}else{
    document.getElementById('checkyanzhenmaajax'+ajaxallid).innerHTML="";
document.getElementById("creation-submit"+ajaxallid).disabled="disabled";
}
}
}