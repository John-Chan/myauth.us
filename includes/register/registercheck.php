<?php
defined("ZHANGXUAN") or die("no hacker.");
$questionid[81] = "您出生的城市是哪里?";
$questionid[82] = "您手机的型号是什么?";
$questionid[83] = "您就读的第一所小学名称是?";
$questionid[84] = "您的初恋情人叫什么名字?";
$questionid[85] = "您驾照的末四位是什么?";
$questionid[86] = "您母亲的姓名叫什么?";
$questionid[87] = "您母亲的生日是哪一天?";
$questionid[88] = "您父亲的生日是哪一天?";
session_start();
$registercheck = 0;
$registersuccesslogin = 0;
$registererrid = 0; //1注册码错误，2用户名重复，3邮件格式错误，4输入错误,用户名包含非法字符
if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) == $_SESSION['letters_code']) {   //验证码正确才能继续搞啊
    if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["emailAddress"]) && !empty($_POST["emailAddress"]) && isset($_POST["question1"]) && !empty($_POST["question1"]) && isset($_POST["answer1"]) && !empty($_POST["answer1"])) {                  //要有数据啊
        if (checkzhongwenzimushuzixiahuaxian($_POST["username"]) && checkquestionvalue($_POST['question1']) && valid_email($_POST["emailAddress"])) {
            $user = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST["username"], ENT_QUOTES));
            $password = mysqli_real_escape_string($dbconnect,md5($_POST['password']));
            $emailadd = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['emailAddress']));
            $question1 = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['question1']));
            $answer1 = mysqli_real_escape_string($dbconnect,htmlspecialchars($_POST['answer1']));
            $user_email_checkid = randstr();
            $date = date('Y-m-d H:i:s');
            $emailfind = randstr();
            $mailresettoken = randstr();
            $cookievalue = randstr();
            if (checkpostusername($user)) {                                           //验证用户名不重复
                if (valid_email($emailadd)) {                                         //验证邮箱地址合法
                    $sql = "INSERT INTO `users`(`user_name`, `user_pass`, `user_email`, `user_email_checked`, `user_registered`, `user_cookie`, `user_question`, `user_answer`, `user_email_checkid`,`user_email_find_code`,`user_email_find_mode`,`user_psd_reset_token`,`user_psd_reset_token_used`) VALUES ('$user','$password','$emailadd',0,'$date','$cookievalue',$question1,'$answer1','$user_email_checkid','$emailfind',0,'$mailresettoken','1')";
                    $result = mysqli_query($dbconnect,$sql);
                    if ($result) {
                        $_SESSION['loginuser'] = $user;
                        setcookie("loginname", $user, time() + 30 * 24 * 60 * 60, "/");
                        setcookie("loginid", $cookievalue, time() + 30 * 24 * 60 * 60, "/");
                        $registersuccesslogin = 1;
                        $registercheck = 1;
                    }
                    $sql = "SELECT `user_id` FROM `users` WHERE `user_name`='$user'";
                    $result = mysqli_query($dbconnect,$sql);
                    $rowtemp = mysqli_fetch_array($result);
                    $user_id = $rowtemp['user_id'];
                    
                    /*                     * *********发送邮件部分*********** *///发送邮件的某个函数自己后面再处理下吧，格式如下，../mailcheck.php?userid=num&checkcode=dsaswewasdwewqs,查库的确认格式即可
                    $mailtxtcheckurl = SITEHOST . "mailcheck.php?userid=$user_id&checkcode=$user_email_checkid";
                    $mailtxt = "本邮件为系统自动发送，您的战网在线安全令账号已经创建<br><br>" .
                            "您的用户名为：$user<br><br>" .
                            "您的用户ID为：$user_id<br><br>" .
                            "您的密码为：" . emailpass($_POST['password']) . " (只显示前三位)<br><br>" .
                            "您的安全问题为：" . $questionid[$question1] . "<br><br>" .
                            "您的安全问题答案：(已隐藏)<br><br>" .
                            "您的邮箱地址为：$emailadd<br><br>" .
                            "您的账号已经创建，为了今后能顺利管理账号，请点击以下链接确认您的邮箱地址<br><br>" .
                            "<a href='$mailtxtcheckurl' target='_blank'>$mailtxtcheckurl</a><br><br>" .
                            "如果这不是您操作的，请忽略本邮件，绝对不要点击以上链接。<br><br>" .
                            "本邮件为自动发送，请不要回复，因为没人会看的。<br><br>" .
                            "战网安全令在线版开发团队<br><br>" .
                            "MyAuth.Us<br><br>" .
                            "A.L.P.C";
                    try {
                        $mail = new PHPMailer(true); //创建新的邮件

                        $body = $mailtxt;
                        $body = preg_replace('/\\\\/', '', $body); //替换

                        $mail->IsSMTP();                           // 使用SMTP

                        MOD_IXWEBHOSTING == 1 ? $mail->SMTPAuth = false : $mail->SMTPAuth = true;                  // 启用SMTP验证
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

                        $mail->Subject = "=?utf-8?B?" . base64_encode("战网安全令在线版注册邮箱验证邮件") . "?=";
                        $mail->AltBody = "若要查看本邮件，请使用支持HTML显示的邮箱客户端"; // optional, comment out and test
                        $mail->WordWrap = 80; // set word wrap

                        $mail->MsgHTML($body);

                        $mail->IsHTML(true); // send as HTML

                        $mail->Send();
                    } catch (phpmailerException $e) {
                        
                    }
                } else {
                    $registererrid = 3;
                }
            } else {
                $registererrid = 2;
            }
        } else {
            if (checkzhongwenzimushuzixiahuaxian($_POST["username"]) == false)
                $registererrid = 5;
            else
                $registererrid = 4;
        }
    } else {
        $registererrid = 4;
    }
    $_SESSION['letters_code'] = rand();
} else {
    if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) != $_SESSION['letters_code'])
        $registererrid = 1;
}

function checkpostusername($arruname) {
    global $dbconnect;
    $sql = "SELECT * FROM `users` WHERE `user_name`='$arruname'";
    $result = mysqli_query($dbconnect,$sql);
    if (mysqli_num_rows($result) == 0) {
        return true;
    } else {
        return false;
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

//随机邮件验证码
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

//用户名合法性
function checkzhongwenzimushuzixiahuaxian($arrtxtabc) {
    if (!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u", $arrtxtabc)) {   //utf-8汉字字母数字下划线正则表达式
        return false;
    } else {
        return true;
    }
}

//用户名合法性
function checkquestionvalue($arrtxtabc) {
    if ($arrtxtabc == 81 || $arrtxtabc == 82 || $arrtxtabc == 83 || $arrtxtabc == 84 || $arrtxtabc == 85 || $arrtxtabc == 86 || $arrtxtabc == 87 || $arrtxtabc == 88) {   //utf-8汉字字母数字下划线正则表达式
        return true;
    } else {
        return false;
    }
}

function emailpass($str) {
    $len = strlen($str);
    $strstart = substr($str, 0, 3);
    for ($i = 3; $i < $len; $i++) {
        $strstart = $strstart . "*";
    }
    return $strstart . $strend;
}

?>