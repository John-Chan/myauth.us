<?php
defined("ZHANGXUAN") or die("no hacker.");
$authdelerrorid=-1;
if($logincheck==0){
    $authdelerrorid=3;//未登入
}else{
    if($autherrid==2){
        $authdelerrorid=2;//GET错误
    }else if($autherrid==3){
        $authdelerrorid=3;//没登入
    }else if($autherrid==1){
        $authdelerrorid=1;//1不是你所有的安全令
    }else if($autherrid==0){
      $sql="SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_id`='$auth_id'";
      $result = mysqli_query($dbconnect,$sql);
      $row=mysqli_fetch_array($result);
      if($row){
          if($row['auth_moren']==1){
        $sql="DELETE FROM `authdata` WHERE `user_id`=$user_id AND `auth_id`=$auth_id";
        mysqli_query($dbconnect,$sql);
        $sql="SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_moren`=0";
        $result=mysqli_query($dbconnect,$sql);
        $rowa=mysqli_fetch_array($result);
        if($rowa){
            $newauthmorenid=$rowa['auth_id'];
            $sql="UPDATE `authdata` SET `auth_moren`= 1 WHERE `user_id`='$user_id' AND `auth_id` = '$newauthmorenid' AND `auth_moren`=0";
            mysqli_query($dbconnect,$sql);
        }
    }else{
        $sql="DELETE FROM `authdata` WHERE `user_id`=$user_id AND `auth_id`=$auth_id";
       mysqli_query($dbconnect,$sql);
    }$authdelerrorid=0;
      }else{
          $authdelerrorid=4;//删除失败
      }
    }
}
?>
