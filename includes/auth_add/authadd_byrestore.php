<?php
defined("ZHANGXUAN") or die("no hacker.");
$authaddbyrestoreerrorid = -1; //1内容不完整，2内容不合法，3未登入，4验证码错误,-1未知错误，5生成失败
$strregion[21] = "CN";
$strregion[22] = "US";
$strregion[23] = "EU";
$auth_moren = 0;
$postcode = $_POST['letters_code'];
if ($logincheck == 0) {
    $authaddbyrestoreerrorid = 3;
} else {
    if (!is_null($postcode)) {
        if (md5(strtolower($_POST['letters_code'])) == $_SESSION['letters_code']) {
            if (isset($_POST['authname']) && isset($_POST['region']) && isset($_POST['authcodeA3']) && isset($_POST['authcodeB3']) && isset($_POST['authcodeC3']) && isset($_POST['authrestore']) && isset($_POST['selectpic'])) {
                if (checkauthname($_POST['authname']) && checkauthregion($_POST['region']) && checkauthselectpic($_POST['selectpic']) && checkauthselectcode($_POST['authcodeA3']) && checkauthselectcode($_POST['authcodeB3']) && checkauthselectcode($_POST['authcodeC3']) && checkauthselectauthrestore($_POST['authrestore'])) {
                   try{ 
                    $region = $strregion[mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['region'], ENT_QUOTES))];
                    $athcode1=mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['authcodeA3'], ENT_QUOTES));
                    $athcode2=mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['authcodeB3'], ENT_QUOTES));
                    $athcode3=mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['authcodeC3'], ENT_QUOTES));
                    $authname = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['authname'], ENT_QUOTES));
                    $selectpic = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['selectpic'], ENT_QUOTES));
                    $authserial="$region-$athcode1-$athcode2-$athcode3";
                    $authrestorecode = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['authrestore'], ENT_QUOTES));
                    $auth = @Authenticator::restore($authserial,$authrestorecode);
                    $authserect = $auth->secret();
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
                        $authaddbyrestoreerrorid = 5;
                    else{
                        $authaddbyrestoreerrorid = 0;
                        $sql="SELECT `auth_id` FROM `authdata` WHERE `serial`='$authserial' AND `last_sync`='$authlastsync'";
                        $result=mysqli_query($dbconnect, $sql);
                        $rowtemp=mysqli_fetch_array($result);
                        $auth_id=$rowtemp['auth_id'];
                    }
                        }catch(phpmailerException $e){
                            $authaddbykeyerrorid=5;
                        }
                } 
                    else {
                    $authaddbyrestoreerrorid = 2;
                }
            } else {
                $authaddbyrestoreerrorid = 1;
            }
        } else {
            $authaddbyrestoreerrorid = 4;
        }
    } else {
        $authaddbyrestoreerrorid = 4;
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
    if ($regions == 21 || $regions == 22 || $regions == 23) {
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

function checkauthselectcode($code) {
    if (ctype_digit($code) && strlen($code) == 4)
        return true;
    else
        return false;
}

function checkauthselectauthrestore($key) {
    if (preg_match("/^[A-Za-z0-9]+$/u", $key) && strlen($key) == 10)
        return true;
    else
        return false;
}

class phpmailerException extends Exception {
  public function errorMessage() {;
    return true;
  }
}

?>
