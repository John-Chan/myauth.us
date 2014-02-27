<?php

defined("ZHANGXUAN") or die("no hacker.");
$resetpsdpostdataerror = -1; //1:隐藏数据用户ID和令牌错误,2邮箱错误,3两个密码不同,4用户不存在,5令牌失效
if ($resetmod == 2) {
    if (ctype_digit($_POST["user_id"]) && checkcode($_POST['user_token'])) {
        $emailadd = mysqli_real_escape_string($dbconnect, htmlspecialchars($_POST['oldPassword']));
        if (valid_email($emailadd)) {
            $userid = $_POST["user_id"];
            $usertoken = $_POST['user_token'];
            $passwordA = mysqli_real_escape_string($dbconnect, md5($_POST['newPassword']));
            $passwordB = mysqli_real_escape_string($dbconnect, md5($_POST['newPasswordVerify']));
            if ($passwordA == $passwordB) {
                $newpassword = $passwordA;
                $sql = "SELECT * FROM `users` WHERE `user_id`='$userid'";
                $result = mysqli_query($dbconnect, $sql);
                $row = mysqli_fetch_array($result);
                if ($row) {
                    $username = $row['user_name'];
                    if ($usertoken == $row['user_psd_reset_token'] && $row['user_psd_reset_token_used'] == 0) {
                        $newtoken = randstr();
                        $sql = "UPDATE `users` SET `user_pass`='$newpassword',`user_psd_reset_token`='$newtoken',`user_psd_reset_token_used`=1 WHERE `user_id`='$userid'";
                        @mysqli_query($dbconnect, $sql);
                        if (isset($_COOKIE['loginname']) && isset($_COOKIE['loginid']) && $_COOKIE['loginname'] != "" && $_COOKIE['loginid'] != "") {
                            $usertmp = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginname']));
                            $cookievalue = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginid'], ENT_QUOTES));
                            $sql = "DELETE FROM `cookiedata` WHERE `user_name`='$usertmp' AND `user_cookie` ='$cookievalue'";
                            @mysqli_query($dbconnect, $sql);
                        }
                        $resetpsdpostdataerror = 0;
                        $user = $row['user_name'];
                        $mailtxt = "本邮件为系统自动发送，您已经成功地重置了您的密码。<br><br>" .
                                "您的用户名为：$user<br><br>" .
                                "您的用户ID为：$userid<br><br>" .
                                "如果这不是您操作的，请<a href='" . SITEHOST . "' target='_blank'>前往网站</a>重置您的密码。<br><br>" .
                                "本邮件为自动发送，请不要回复，因为没人会看的。<br><br>" .
                                "竹井诗织里<br><br>" .
                                date('Y-m-d');
                        try {
                            $mail = new PHPMailer(true); //创建新的邮件

                            $body = $mailtxt;
                            $body = preg_replace('/\\\\/', '', $body); //替换

                            $mail->IsSMTP();                           // 使用SMTP
                            $mail->SMTPAuth = true;                  // 启用SMTP验证
                            $mail->Port = SMTP_PORT;                    // 设置SMTP端口
                            $mail->Host = SMTP_HOST; // SMTP服务器
                            $mail->Username = SMTP_USERNAME;     // SMTP用户名
                            $mail->Password = SMTP_PASSWD;            // SMTP 密码
                            $mail->SMTPSecure = "ssl";
                            //$mail->IsSendmail();  // 如果报错请取消注释

                            $mail->From = SMTP_USERNAME;
                            $mail->FromName = "=?utf-8?B?" . base64_encode("战网安全令在线版开发团队") . "?=";

                            $to = $emailadd;

                            $mail->AddAddress($to);


                            $mail->Subject = "=?utf-8?B?" . base64_encode("战网安全令在线版密码重置提示邮件") . "?=";
                            $mail->AltBody = "若要查看本邮件，请使用支持HTML显示的邮箱客户端"; // optional, comment out and test
                            $mail->WordWrap = 80; // set word wrap

                            $mail->MsgHTML($body);

                            $mail->IsHTML(true); // send as HTML

                            $mail->Send();
                            $_SESSION['lastmail'] = $date;
                        } catch (phpmailerException $e) {
                            
                        }
                    } else {
                        $resetpsdpostdataerror = 5; //回去重试
                    }
                } else {
                    $resetpsdpostdataerror = 4; //不返回首页
                }
            } else {
                $resetpsdpostdataerror = 3;
            }
        } else {
            $resetpsdpostdataerror = 2; //不返回旧页面
        }
    } else {
        $resetpsdpostdataerror = 1; //不返回旧页面
    }
}

function checkcode($key) {
    if (preg_match("/^[A-Fa-f0-9]+$/u", $key) && strlen($key) == 40)
        return true;
    else
        return false;
}

//PHP验证邮箱格式的函数
function valid_email($email) {
    //首先确认是否有一个@符号的存在，同时验证邮箱长度是否正确
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        //如果@符号的个数不对，或者邮箱每部分的长度不对则输出错误
        return false;
    }
    //把邮箱按“@”符号和“.”符号分割成几个部分分别用正则表达式匹配

    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!ereg("^(([A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
        //检查域名部分是否是IP地址，如果不是则应该是有效域名
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            //域名部分的长度不能太短，否则输出错误
            return false;
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                //域名部分如果不是字母和数字，或者允许的其他字符，则输出错误
                return false;
            }
        }
    }

    //所有检测通过，输出邮箱格式正确
    return true;
}

//随机邮件验证码
function randstr($len = 40) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
// characters to build the password from
    mt_srand((double) microtime() * 1000000 * getmypid());
// seed the random number generater (must be done)
    $password = '';
    while (strlen($password) < $len)
        $password.=substr($chars, (mt_rand() % strlen($chars)), 1);
    return sha1(md5($password));
}

?>
