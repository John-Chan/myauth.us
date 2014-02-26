var authnameerrorid=0;
var authkeyerrorid=0;
var authrestoreerrorid=0;
function checkname(element,ida){
    if(element.value.length>12){
        document.getElementById("checkusernameajax"+ida).innerHTML="<img src='/resources/img/warning2.png' alt=''>安全令名称不得超过12个字符";
        authnameerrorid=1;
        document.getElementById("creation-submit"+ida).disabled="disabled";
    }else if(element.value.length>0){
        document.getElementById("checkusernameajax"+ida).innerHTML="<img src='/resources/img/success.png' alt=''>";
        document.getElementById("creation-submit"+ida).disabled="";
        authnameerrorid=0;
    }else if(element.value.length==0){
        authnameerrorid=0;
        document.getElementById("creation-submit"+ida).disabled="";
        document.getElementById("checkusernameajax"+ida).innerHTML="";
    }
}
function checkkey(element,idb){
    if((element.value.length<40 && element.value.length>0 ) || element.value.length>40){
        document.getElementById("checkuserkey"+idb).innerHTML="<img src='/resources/img/warning2.png' alt=''>密钥长度错误,请检查后重新输入";
        authkeyerrorid=1;
        document.getElementById("creation-submit"+idb).disabled="disabled";
    }else if(element.value.length==0){
        authkeyerrorid=0;
        document.getElementById("creation-submit"+idb).disabled="";
        document.getElementById("checkuserkey"+idb).innerHTML="";
    }else if(element.value.length==40){
        digits="0123456789abcdefABCDEF";
        if(checkmath(digits,element.value)){
            document.getElementById("checkuserkey"+idb).innerHTML="<img src='/resources/img/success.png' alt=''>";
            authkeyerrorid=0;
            document.getElementById("creation-submit"+idb).disabled="";
        }else{
            document.getElementById("checkuserkey"+idb).innerHTML="<img src='/resources/img/warning2.png' alt=''>密钥格式错误,请检查后重新输入";
            authkeyerrorid=1;
            document.getElementById("creation-submit"+idb).disabled="disabled";
        }
    }
}

function checkmath(legalstr,str){
    var i=0;
    var slength=str.length;
    while (i<slength)
    { 
        var c=str.charAt(i);
        if (legalstr.indexOf(c)==-1)
        {
            return false;
        }
        i++;
    }
    return true;
}

function checkseries(idc){
    digits="0123456789";
    element1=document.getElementById("authcodeA"+idc);
    element2=document.getElementById("authcodeB"+idc);
    element3=document.getElementById("authcodeC"+idc);
    if(element1.value.length==4 &&  element2.value.length==4 && element3.value.length==4){
        if(checkmath(digits,element1.value)&&checkmath(digits,element2.value)&&checkmath(digits,element3.value)){
            return true;
        }else{
            document.getElementById("checkkey"+idc).innerHTML="<img src='/resources/img/warning2.png' alt=''>序列号格式错误,请检查后重新输入";
            return false;
        }
    }else{
        document.getElementById("checkkey"+idc).innerHTML="<img src='/resources/img/warning2.png' alt=''>序列号位数错误,请检查后重新输入";
        return false;
    }
}
checkrestore

function checkrestore(element,idd){
    digits="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if(element.value.length==10){
        if(checkmath(digits,element.value)){
            document.getElementById("checkrestore"+idd).innerHTML="<img src='/resources/img/success.png' alt=''>";
            document.getElementById("creation-submit"+idd).disabled="";
            authrestoreerrorid=0;
        }else{
            document.getElementById("checkrestore"+idd).innerHTML="<img src='/resources/img/warning2.png' alt=''>还原码格式错误,请检查后重新输入";
            document.getElementById("creation-submit"+idd).disabled="disabled";
            authrestoreerrorid=1;
        }
    }else if(element.value.length==0){
        document.getElementById("checkrestore"+idd).innerHTML="";
        document.getElementById("creation-submit"+idd).disabled="";
        authrestoreerrorid=0;
    }else    {
        document.getElementById("checkrestore"+idd).innerHTML="<img src='/resources/img/warning2.png' alt=''>还原码位数错误,请检查后重新输入";
        document.getElementById("creation-submit"+idd).disabled="disabled";
        authrestoreerrorid=1;
    }
}


function refreshCaptcha(id)
{
    if(id==1){
    var img = document.images['sec-string1'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    document.images['sec-string2'].src=img.src;
    document.images['sec-string3'].src=img.src;
    }
    if(id==2){
    var img = document.images['sec-string2'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    document.images['sec-string1'].src=img.src;
    document.images['sec-string3'].src=img.src;
    }
    if(id==3){
    var img = document.images['sec-string3'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    document.images['sec-string1'].src=img.src;
    document.images['sec-string2'].src=img.src;
    }
}