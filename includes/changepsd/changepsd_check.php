<?php
defined("ZHANGXUAN") or die("no hacker.");
$changepsderrorid = -1; //1验证码错误,2提交数据有错，3没登入玩个P，4两次密码不一样玩个鸡巴
if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) == $_SESSION['letters_code']) {   //验证码正确才能继续搞啊
    if (isset($_POST["oldPassword"]) && !empty($_POST["oldPassword"]) && isset($_POST["newPassword"]) && !empty($_POST["newPassword"]) && isset($_POST["newPasswordVerify"]) && !empty($_POST["newPasswordVerify"])) {
        if ($logincheck == 1) {
            $passwordA = mysqli_real_escape_string($dbconnect,md5($_POST['newPassword']));
            $passwordB = mysqli_real_escape_string($dbconnect,md5($_POST['newPasswordVerify']));
            if ($passwordA == $passwordB) {
                $newpassword = $passwordA;
                $sql = "UPDATE `users` SET `user_pass`='$newpassword' WHERE `user_name`='$user'";
                @mysqli_query($dbconnect,$sql);
                $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
                $result = mysqli_query($dbconnect,$sql);
                $row = mysqli_fetch_array($result);
                $userid = $row['user_id'];
                $emailadd = $row['user_email'];
                $mailtxt = "本邮件为系统自动发送，您已经成功地修改了您的密码。<br><br>" .
                        "您的用户名为：$user<br><br>" .
                        "您的用户ID为：$userid<br><br>" .
                        "您的邮箱地址为：$emailadd<br><br>" .
                        "您设置是新密码为：" . emailpass($_POST['newPassword']) . " (只显示前三位)<br><br>" .
                        "如果这不是您操作的，请<a href='" . SITEHOST . "' target='_blank'>前往网站</a>重置您的密码。<br><br>" .
                        "本邮件为自动发送，请不要回复，因为没人会看的。<br><br>" .
                        "竹井诗织里<br><br>".
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
                        $mail->SMTPSecure = "ssl"; 
                        $mail->Password = SMTP_PASSWD;            // SMTP 密码
                        //$mail->IsSendmail();  // 如果报错请取消注释

                        $mail->From = SMTP_USERNAME;
                        $mail->FromName = "=?utf-8?B?" . base64_encode("战网安全令在线版开发团队") . "?=";

                        $to = $emailadd;

                        $mail->AddAddress($to);

                        $mail->Subject = "=?utf-8?B?" . base64_encode("战网安全令在线版密码修改通知邮件") . "?=";
                        $mail->AltBody = "若要查看本邮件，请使用支持HTML显示的邮箱客户端"; // optional, comment out and test
                        $mail->WordWrap = 80; // set word wrap

                        $mail->MsgHTML($body);

                        $mail->IsHTML(true); // send as HTML

                        $mail->Send();
                    } catch (phpmailerException $e) {
                        
                    }
                $changepsderrorid = 0;
            } else {
                $changepsderrorid = 4;
            }
        } else {
            $changepsderrorid = 3;
        }
    } else {
        $changepsderrorid = 2;
    }
    $_SESSION['letters_code'] = rand();
} else {
    if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) != $_SESSION['letters_code'])
        $changepsderrorid = 1;
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

function emailpass($str) {
    $len = strlen($str);
    $strstart = substr($str, 0, 3);
    for ($i = 3; $i < $len; $i++) {
        $strstart = $strstart . "*";
    }
    return $strstart . $strend;
}

?>