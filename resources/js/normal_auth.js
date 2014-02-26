var i=0,s=0,jqmode=0;
var delaytime=30.5;//延迟30.5s
var timedelay;
   function processbarload(time) {
    i=0;
    i=100*time/30;
    s=0;
    showload=setInterval("processbarsetload()",delaytime);
   }
   function processbarsetload() {
    i+=0.1;
    s+=0.1;
    if (i>=100) {
     clearInterval(showload);
    }
    if(s>=6){
document.getElementById('rightajaxzhuangtai').innerHTML="";}
    document.getElementById("authprogressbar").style.width=i+"%";
   }
   
var XHR;  
function createXHR(){ 
if(window.ActiveXObject){
XHR=new ActiveXObject('Microsoft.XMLHTTP');
}else if(window.XMLHttpRequest){
XHR=new XMLHttpRequest();
}
}
function getauthjsondata(){
createXHR();
 $("#authcode").fadeOut(500); 
document.getElementById('rightajaxzhuangtai').innerHTML="<img src='/resources/img/waiting.gif' alt=''>&nbsp;获取下一组令牌中";
XHR.open("GET",geturladd,true);
XHR.onreadystatechange=jsonchuli;
XHR.send(null);}

function jsonchuli(){
clearInterval(showload);
if(XHR.readyState == 4 && XHR.status == 200){
var textHTML=XHR.responseText;
var jsondata = eval ("(" + textHTML + ")");//code和时间
document.getElementById('authcode').innerHTML=jsondata.code;
clip.setText(document.getElementById('authcode').innerHTML);
 $("#authcode").fadeIn(500);
processbarload(jsondata.time);
document.getElementById('rightajaxzhuangtai').innerHTML="<img src='/resources/img/success.png' alt=''>&nbsp;获取成功";
timedelay=setTimeout('getauthjsondata()',(delaytime-jsondata.time)*1000);
}else{
document.getElementById('rightajaxzhuangtai').innerHTML="<img src='/resources/img/warning2.png' alt=''>&nbsp;获取失败,请重试";}
}

$(window).load(function () {
showload=showload=setInterval("processbarsetload()",10000000)
getauthjsondata();
init();
});


function refreshcodegeas(){
clearInterval(showload);
clearTimeout(timedelay);
createXHR();
 $("#authcode").fadeOut(500); 
document.getElementById('rightajaxzhuangtai').innerHTML="<img src='/resources/img/waiting.gif' alt=''>&nbsp;正在刷新令牌密码";
XHR.open("GET",geturladd,true);
XHR.onreadystatechange=jsonchuli;
XHR.send(null);}

var clip = null;
function init() {
ZeroClipboard.setMoviePath("resources/swf/ZeroClipboard.swf");
clip = new ZeroClipboard.Client();
clip.setHandCursor( true );
clip.addEventListener('mouseOver', my_mouse_over);
clip.glue( 'creation-submit' );
clip.addEventListener('mouseUp', my_mouse_up);
}

function my_mouse_over(client) {
clip.setText(document.getElementById('authcode').innerHTML);
}
function my_mouse_up(client) {
document.getElementById('copydatamode').innerHTML="<img src='/resources/img/success.png' alt=''>&nbsp;已复制到剪切板";
setTimeout("document.getElementById('copydatamode').innerHTML=''",3000);
}

$(document).ready(function (){
   $("#aforwowjq").click(function (){
   if(jqmode==0){
   if($("#game-list-wow").outerHeight(true)>280)
   $("#layout-middle").animate({height:$("#layout-middle").outerHeight(true)+$("#game-list-wow").outerHeight(true)-300});
   jqmode=1;
   }else{
   if($("#game-list-wow").outerHeight(true)>280)
   $("#layout-middle").animate({height:$("#layout-middle").outerHeight(true)-$("#game-list-wow").outerHeight(true)+286});
   jqmode=0;
   }
   });
});