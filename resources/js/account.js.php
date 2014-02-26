<?php include('../../includes/config.php')?>
var jqmode=0;
var objectheigth=0;
$(document).ready(function (){
    objectheigth=$("#game-list-wow").outerHeight(true);
    $("#aforwowjq").click(function (){
        $("#game-list-wow").outerHeight(true)
        if(jqmode==0){
            if(objectheigth>280)
                $("#layout-middle").animate({
                    height:$("#layout-middle").outerHeight(true)+objectheigth-300
                });
            jqmode=1;
        }else{
            if(objectheigth>280)
                $("#layout-middle").animate({
                    height:$("#layout-middle").outerHeight(true)-objectheigth+286
                });
            jqmode=0;
        }
    });
});


var XHR;  
function createXHR(){ 
    if(window.ActiveXObject){
        XHR=new ActiveXObject('Microsoft.XMLHTTP');
    }else if(window.XMLHttpRequest){
        XHR=new XMLHttpRequest();
    }
}
function renewemail(){
    createXHR();
    document.getElementById('mailcheck').innerHTML="[ 重新发送中...... ]";
    XHR.open("GET","<?php echo SITEHOST ?>resendmail.php",true);
    XHR.onreadystatechange=resendcheck;
    XHR.send(null);
}

function resendcheck(){
    if(XHR.readyState == 4 && XHR.status == 200){
        var textHTML=XHR.responseText;
        switch(textHTML){
            case "0":
                document.getElementById('mailcheck').innerHTML="[ 重新发送成功，请到邮箱查看 ]";
                break;
            case "1":
                document.getElementById('mailcheck').innerHTML="[ 重新发送失败，请重新登入 ]";
                break;
            case "2":
                document.getElementById('mailcheck').innerHTML="[ 您已经成功确认邮箱，无需重复确认 ]";
                break;
            case "3":
                Load(3);
                break;
            case "4":
                document.getElementById('mailcheck').innerHTML="[ 重新发送失败，请重试 ]";
                break; 
            default:
                alert(textHTML);
        }
    }else{
        document.getElementById('mailcheck').innerHTML="[ 重新发送失败，请稍后重试 ]";
    }
}



var secs =60; //倒计时的秒数
function Load(ca){
    for(var i=secs;i>=0;i--)
    {
        window.setTimeout('doUpdate(' + i +','+ca+ ')', (secs-i) * 1000);
    }
}
function doUpdate(num,ca)
{
    switch(ca){
        case 3:
            document.getElementById('mailcheck').innerHTML = '[ 请不要频繁操作,请在'+num+'秒后重试 ]';
            break;
        case 4:
            document.getElementById('mailcheck').innerHTML = '[ 重新发送失败，请在'+num+'秒后重试 ]';
            break;
    }
    if(num == 0) {
        document.getElementById('mailcheck').innerHTML = '[<a style="cursor:pointer;" onclick="renewemail();"> 重新发送验证邮件 </a>]';
    }
}