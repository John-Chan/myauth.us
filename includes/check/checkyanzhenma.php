<?php
session_start();
include('../config.php');
if(isset($_GET['code']) && !empty($_GET['code'])){
if(md5(strtolower($_GET['code'])) == $_SESSION['letters_code']){
echo "true";}
else{
echo "false";}
}else
echo "false";
?>