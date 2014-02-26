<?php
include('../config.php');
if(isset($_GET['id']) && !empty($_GET['id'])){
if(!checkzhongwenzimushuzixiahuaxian($_GET['id'])){
    echo "inlegal";
}else{
$user = mysqli_real_escape_string($dbconnect,htmlspecialchars($_GET['id'],ENT_QUOTES));
$sql="SELECT * FROM `users` WHERE `user_name`='$user'";
$result = mysqli_query($dbconnect,$sql);
if(mysqli_num_rows($result) == 0){
echo "true";}
else{
echo "false";}}
}else
echo "";

function checkzhongwenzimushuzixiahuaxian($arrtxtabc){
    if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$arrtxtabc))   //utf-8汉字字母数字下划线正则表达式
    {  
        return false;
    }
    else
    {
        return true;
    }
}
?>