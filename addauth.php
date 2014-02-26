<?php

include('includes/config.php');
include('classes/Authenticator.php');
$topnavvalue = "添加安全令";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if ($logincheck == 0) {
        $jumpurl=SITEHOST.'index.php';
        $innertxt="你还没登入，添加个态君吖。即将返回首页";
        include('includes/auth_add/authadd_error.php');
} else if ($logincheck == 1) {
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect,$sql);
    $rowtemp = mysqli_fetch_array($result);
    $user_id = $rowtemp['user_id'];
    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
    $result = mysqli_query($dbconnect,$sql);
    if(mysqli_num_rows($result)<MOST_AUTH){
        include('includes/page_inc/addauth_inc.php');
    }else{
        $jumpurl=SITEHOST.'myauthall.php';
        $innertxt="你已经拥有".MOST_AUTH."枚安全令了，不能再多了。<br>如要添加请到我的安全令中删除已有的安全令。";
        include('includes/auth_add/authadd_error.php');
    }
}
include('includes/page_inc/footer.php');
?>
