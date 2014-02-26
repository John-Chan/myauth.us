<?php
defined("ZHANGXUAN") or die("no hacker.");
$authaddbyservererrorid = -1; //1内容不完整，2内容不合法，3未登入，4验证码错误,-1未知错误，5生成失败
$strregion[11] = "CN";
$strregion[12] = "US";
$strregion[13] = "EU";
$auth_moren = 0;
$postcode = $_POST['letters_code'];
if ($logincheck == 0) {
    $authaddbyservererrorid = 3;
} else {
    if (!is_null($postcode)) {
        if (md5(strtolower($_POST['letters_code'])) == $_SESSION['letters_code']) {
            if (isset($_POST['authname']) && isset($_POST['region']) && isset($_POST['selectpic'])) {
                if (checkauthname($_POST['authname']) && checkauthregion($_POST['region']) && checkauthselectpic($_POST['selectpic'])) {
                   try{ $region = $strregion[mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['region'], ENT_QUOTES))];
                    $authname = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['authname'], ENT_QUOTES));
                    $selectpic = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['selectpic'], ENT_QUOTES));
                    $auth = @Authenticator::generate($region);
                    $authserial = $auth->serial();
                    $authserect = $auth->secret();
                    $authrestorecode = $auth->restore_code();
                    $authsynctime = $auth->getsync();
                    $authlastsync = date('Y-m-d H:i:s');
                    if (isset($_POST['morenauthset'])) {
                        if ($_POST['morenauthset'] == "on") {
                            $sql = "UPDATE `authdata` SET `auth_moren`=0 WHERE `user_id`='$user_id' AND `auth_moren`=1";
                            @mysqli_query($dbconnect, $sql);
                            $auth_moren = 1;
                        }
                    }
                    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_moren`=1";
                    $result = @mysqli_query($dbconnect, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        $auth_moren = 1;
                    }
                    $sql = "INSERT INTO `authdata`(`user_id`, `auth_moren`, `auth_name`, `serial`, `region`, `secret`, `sync`, `last_sync`, `restore_code`, `auth_img`) VALUES ('$user_id','$auth_moren','$authname','$authserial','$region','$authserect','$authsynctime','$authlastsync','$authrestorecode','$selectpic')";
                    @mysqli_query($dbconnect, $sql);
                    if (is_null($authserial))
                        $authaddbyservererrorid = 5;
                    else{
                        $authaddbyservererrorid = 0;
                        $sql="SELECT `auth_id` FROM `authdata` WHERE `serial`='$authserial' AND `last_sync`='$authlastsync'";
                        $result=mysqli_query($dbconnect, $sql);
                        $rowtemp=mysqli_fetch_array($result);
                        $auth_id=$rowtemp['auth_id'];
                        }
                        }catch(phpmailerException $e){
                            $authaddbykeyerrorid=5;
                        }
                } else {
                    $authaddbyservererrorid = 2;
                }
            } else {
                $authaddbyservererrorid = 1;
            }
        } else {
            $authaddbyservererrorid = 4;
        }
    } else {
        $authaddbyservererrorid = 4;
    }
    $_SESSION['letters_code'] = md5(rand());
}


function checkauthname($name) {
    $len = mb_strlen($name,"UTF-8");
    if ($len > 0 && $len < 13) {
        return true;
    } else {
        return false;
    }
}

function checkauthregion($regions) {
    if ($regions == 11 || $regions == 12 || $regions == 13) {
        return true;
    } else {
        return false;
    }
}

function checkauthselectpic($selectpic) {
    if ($selectpic == 1 || $selectpic == 2 || $selectpic == 3|| $selectpic == 4) {
        return true;
    } else {
        return false;
    }
}

class phpmailerException extends Exception {
  public function errorMessage() {;
    return true;
  }
}
?>
