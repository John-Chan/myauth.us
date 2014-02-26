<?php
 include('../../includes/config.php');?>
var oldhtml,newhtml;
timeclick=false;
function ShowElement(element,authid)
{
    oldhtml = element.innerHTML;
    if(!timeclick){
        oldname = oldhtml;
        timeclick=true;
    }
    var newobj = document.createElement('input');   //创建一个input元素
    newobj.type = 'text';  
    newobj.id='xiugaiminzitxtinput';
    newobj.value=oldname;
    //设置newobj失去焦点的事件
    newobj.onblur = function(){
        timeclick=false;
        if(oldname != newobj.value && newobj.value!="" && newobj.value.length<=12){
            element.innerHTML = "<img width=12 heigth=12 src='/resources/img/waiting.gif'>正在设置新名称";
            newhtml=newobj.value;
            setnewname(newobj.value,authid);
        }else{
            if(newobj.value.length>12){
                element.innerHTML = "<img width=12 heigth=12 src='/resources/img/warning2.png'>名称必须小于12位";
                var obj=element;
                setTimeout("showleftright('" + authid+"')", 1000);
            }else{
                element.innerHTML = oldname;
            }
        }   //当触发时判断newobj的值是否为空，为空则不修改，并返回oldhtml。
    }

    newobj.onkeypress = function(e){
        if(e.keyCode==13){
            if(oldhtml != newobj.value && newobj.value!="" && newobj.value.length<=12){
                element.innerHTML = "<img width=12 heigth=12 src='/resources/img/waiting.gif'>正在设置新名称";
                newhtml=newobj.value;
                setnewname(newobj.value,authid);
            }else{
                if(newobj.value.length>12){
                    element.innerHTML = "<img width=12 heigth=12 src='/resources/img/warning2.png'>名称必须小于12位";
                    var obj=element;
                    setTimeout("showleftright('" + authid+"')", 1000);
                }else{
                    element.innerHTML = oldhtml;
                }
            }   //当触发时判断newobj的值是否为空，为空则不修改，并返回oldhtml。
        }
        if(e.keyCode==27){
            element.innerHTML = oldhtml;
        }
    }
    element.innerHTML = '';   //设置元素内容为空
    element.appendChild(newobj);   //添加子元素
    newobj.focus();   //获得焦点*/
}

function showleftright(authid){//出错写回
    document.getElementById("authnamecode"+authid).innerHTML = oldhtml;
}
function showokright(authid){//完成写回
    document.getElementById("authnamecode"+authid).innerHTML = newhtml;
}
var XHRAY,authidso; //定义一个全局对象
function createXHRAY(){
    if(window.ActiveXObject){
        XHRAY=new ActiveXObject('Microsoft.XMLHTTP');
    }else if(window.XMLHttpRequest){
        XHRAY=new XMLHttpRequest();
    }
}
function setnewname(nametxt,authidae){
    if(authidae!="" && authidae!=null){
        createXHRAY();
        authidso=authidae;
        XHRAY.open("GET","<?php echo SITEHOST ?>includes/auth_name/auth_name.php?authid="+authidso+"&authname="+encodeURI(nametxt),true);
        XHRAY.onreadystatechange=authnamereceive;
        XHRAY.send(null);
    }
    else{
        document.getElementById("authnamecode"+authidso).innerHTML = oldhtml;
    }
}

function authnamereceive(){
    if(XHRAY.readyState == 4 && XHRAY.status == 200){
        var textHTML=XHRAY.responseText;
        if(textHTML=="false"){
            document.getElementById("authnamecode"+authidso).innerHTML="<img width=12 heigth=12 src='/resources/img/unavailable.png'>设置失败,请重试";
            setTimeout("showleftright('" + authidso+"')", 2000);
        }else{
            document.getElementById("authnamecode"+authidso).innerHTML="<img width=12 heigth=12 src='/resources/img/success.png'>设置成功";
            setTimeout("showokright('" + authidso+"')", 2000);
        }
    }
    else{
    
    }
}