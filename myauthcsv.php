<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $logincheck = 1;
}
if ($logincheck == 1) {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="myauth.csv"');
    $output = fopen('php://output', 'w') or die(locationtogo());
    $user = mysqli_real_escape_string($dbconnect,htmlspecialchars($_SESSION['loginuser']));
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect,$sql);
    $rowtemp = mysqli_fetch_array($result);
    $user_id = $rowtemp['user_id'];
    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
    $result = mysqli_query($dbconnect,$sql);
    $list = array();
    $list = "安全令名称,安全令序列号,安全令密钥,安全令还原码\r\n";
    while ($rowauth = mysqli_fetch_array($result)) {
        $list .= $rowauth['auth_name'] . "," . $rowauth['serial'] . "," . $rowauth['secret'] . "," . $rowauth['restore_code'] . "\r\n";
    }
    $list = "\xEF\xBB\xBF" . $list;
    fwrite($output, $list);
    fclose($output) or die(locationtogo());
} else {
    locationtogo();
}

function locationtogo(){
    Header("Location: " . SITEHOST);
}
?>
