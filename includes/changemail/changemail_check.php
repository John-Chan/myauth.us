<?php
defined("ZHANGXUAN") or die("no hacker.");
session_start();
$changemailadderrorid = -1; //1验证码错误,2提交数据有错，3没登入玩个P，4验证信息错了,5不是邮箱格式,6，两次邮箱地址一样，7邮件发送失败
if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) == $_SESSION['letters_code']) {   //验证码正确才能继续搞啊
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["question1"]) && !empty($_POST["question1"]) && isset($_POST["answer1"]) && !empty($_POST["answer1"])) {                  //要有数据啊
        if ($logincheck == 1) {
            $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
            $result = mysqli_query($dbconnect, $sql);
            $rowtemp = mysqli_fetch_array($result);
            $user_id = $rowtemp['user_id'];
            $useremailadd = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST["email"]));
            $userquestion = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST["question1"]));
            $useranswer = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST["answer1"]));
            $mailaddused = $rowtemp['user_email'];
            if ($rowtemp['user_question'] == $userquestion && $rowtemp['user_answer'] == $useranswer) {
                if (valid_email($useremailadd)) {
                    if ($useremailadd != $rowtemp['user_email']) {
                        $newcheckid = randstr();
                        $mailtxtcheckurl = SITEHOST . "mailcheck.php?userid=$user_id&checkcode=$newcheckid";

                        $mailtxt = "本邮件为系统自动发送，您正在申请更改注册邮箱为当前邮箱<br><br>" .
                                "您的用户名为：$user<br><br>" .
                                "您的用户ID为：$user_id<br><br>" .
                                "您此前的邮箱地址为：$mailaddused<br><br>" .
                                "您现在的邮箱地址为：$useremailadd<br><br>" .
                                "您的邮箱已经成功修改，为了今后能顺利管理账号，请点击以下链接确认您的邮箱地址<br><br>" .
                                "<a href='$mailtxtcheckurl' target='_blank'>$mailtxtcheckurl</a><br><br>" .
                                "如果这不是您操作的，请不要点击以上链接，并进入我的账号页面更改邮箱地址。<br><br>" .
                                "本邮件为自动发送，请不要回复，因为没人会看的。<br><br>" .
                                "竹井诗织里<br><br>".
								date('Y-m-d');
                        try {
                            $mail = new PHPMailer(true); //创建新的邮件

                            $body = $mailtxt;
                            $body = preg_replace('/\\\\/', '', $body); //替换

                            $mail->IsSMTP();                           // 使用SMTP
                            $mail->SMTPAuth = true;                    // 启用SMTP验证 //IXWEBHOSTING使用模式1
                            $mail->Port = SMTP_PORT;                    // 设置SMTP端口
                            $mail->Host = SMTP_HOST; // SMTP服务器
                            $mail->Username = SMTP_USERNAME;     // SMTP用户名
                            $mail->Password = SMTP_PASSWD;            // SMTP 密码
                            $mail->SMTPSecure = "ssl"; 
                            //$mail->IsSendmail();  // 如果报错请取消注释

                            $mail->From = SMTP_USERNAME;
                            $mail->FromName = "=?utf-8?B?" . base64_encode("战网安全令在线版开发团队") . "?=";

                            $to = $useremailadd;

                            $mail->AddAddress($to);

                            $mail->Subject = "=?utf-8?B?" . base64_encode("战网安全令在线版更改邮箱验证邮件") . "?=";
                            $mail->AltBody = "若要查看本邮件，请使用支持HTML显示的邮箱客户端"; // optional, comment out and test

                            $mail->WordWrap = 80; // set word wrap

                            $mail->MsgHTML($body);

                            $mail->IsHTML(true); // send as HTML

                            $mail->Send();
                            $sql = "UPDATE `users` SET `user_email`='$useremailadd',`user_email_checked`='0',`user_email_checkid`='$newcheckid' WHERE `user_name`='$user'";
                            mysqli_query($dbconnect,$sql);
                            $changemailadderrorid = 0;
                        } catch (phpmailerException $e) {
                            $changemailadderrorid = 7;
                        }
                    } else {
                        $changemailadderrorid = 6;
                    }
                } else {
                    $changemailadderrorid = 5;
                }
            } else {
                $changemailadderrorid = 4;
            }
        } else {
            $changemailadderrorid = 3;
        }
    } else {
        $changemailadderrorid = 2;
    }
    $_SESSION['letters_code'] = md5(rand());
} else {
    if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) != $_SESSION['letters_code']) {
        $changemailadderrorid = 1;
    }
}

//PHP验证邮箱格式的函数
function valid_email($email) {
    //首先确认是否有一个@符号的存在，同时验证邮箱长度是否正确
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        //如果@符号的个数不对，或者邮箱每部分的长度不对则输出错误
        return false;
    }
    //把邮箱按“@”符号和“.”符号分割成几个部分分别用正则表达式匹配

    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&#038;'*+\\/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+\\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
        //检查域名部分是否是IP地址，如果不是则应该是有效域名
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            //域名部分的长度不能太短，否则输出错误
            return false;
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                //域名部分如果不是字母和数字，或者允许的其他字符，则输出错误
                return false;
            }
        }
    }

    //所有检测通过，输出邮箱格式正确
    return true;
}

function randstr($len = 6) {
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