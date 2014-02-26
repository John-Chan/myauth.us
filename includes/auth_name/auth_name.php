<?php
function chinesetime($timevalue){
    $text= substr($timevalue, 0, 4)."年".substr($timevalue, 5, 2)."月".substr($timevalue, 8, 2)."日".substr($timevalue, 11, 2)."时".substr($timevalue, 14, 2)."分".substr($timevalue, 17, 2)."秒";
    return $text;
}
session_start();
include('../config.php');
include('../../classes/Authenticator.php');
if(isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])){
     $user=mysqli_real_escape_string($dbconnect,htmlspecialchars($_SESSION['loginuser']));
}else if(isset($_COOKIE['loginname'])&&isset($_COOKIE['loginid'])&&$_COOKIE['loginname']!=""&&$_COOKIE['loginid']!=""){
    $usertmp=mysqli_real_escape_string($dbconnect,htmlspecialchars($_COOKIE['loginname']));
    $sql="SELECT * FROM `users` WHERE `user_name`='$user' AND `user_cookie` ='".mysqli_real_escape_string($dbconnect,htmlspecialchars($_COOKIE['loginid']))."'";
    $result = mysqli_query($dbconnect,$sql);
    if(mysqli_num_rows($result) > 0){
        $user = $usertmp;
    }
}else{die("");}
if(!is_null($user)){
    $sql="SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect,$sql);
    $row=mysqli_fetch_array($result);
        $user_id=$row['user_id'];
}
if(isset($_GET['authid'])&&!empty($_GET['authid'])&&ctype_digit($_GET['authid'])&&isset($_GET['authname'])&&!empty($_GET['authname'])){
    $authid=$_GET['authid'];
    $authname=mysqli_real_escape_string($dbconnect,htmlspecialchars($_GET['authname']));
}
if(!is_null($user_id)&&!is_null($authid)&&!is_null($authname)&& mb_strlen($authname,"UTF-8")<=12){
    $sql="SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_id`=$authid";
    $result = mysqli_query($dbconnect,$sql);
    $rowaa=mysqli_fetch_array($result);
}
if($rowaa){
        $sql="UPDATE `authdata` SET `auth_name`= '$authname' WHERE `user_id`='$user_id' AND `auth_id`=$authid";
       mysqli_query($dbconnect,$sql);
        echo "true";
}else{
    echo "false";
}
?>
