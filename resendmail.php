<?php

session_start();
$questionid[81] = "您出生的城市是哪里?";
$questionid[82] = "您手机的型号是什么?";
$questionid[83] = "您就读的第一所小学名称是?";
$questionid[84] = "您的初恋情人叫什么名字?";
$questionid[85] = "您驾照的末四位是什么?";
$questionid[86] = "您母亲的姓名叫什么?";
$questionid[87] = "您母亲的生日是哪一天?";
$questionid[88] = "您父亲的生日是哪一天?";
$logincheck = 0;
include('includes/config.php');
require_once('classes/class.phpmailer.php');
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $logincheck = 1;
}
$date = date('Y-m-d H:i:s');
if ($logincheck == 1) {
    if (!isset($_SESSION['lastmail']) || ( isset($_SESSION['lastmail']) && !empty($_SESSION['lastmail']) && (strtotime($date) - strtotime($_SESSION['lastmail'])) >= 60 )) {

        $user = mysqli_real_escape_string($dbconnect,htmlspecialchars($_SESSION['loginuser']));
        $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
        $result = mysqli_query( $dbconnect,$sql);
        $rowtemp = mysqli_fetch_array($result);
        if ($rowtemp) {
            if ($rowtemp['user_email_checked'] == 0) {
                $user = $rowtemp['user_name'];
                $user_id = $rowtemp['user_id'];
                $passwd = "************";
                $question1 = $rowtemp['user_question'];
                $emailadd = $rowtemp['user_email'];
                $user_email_checkid = $rowtemp['user_email_checkid'];
                $mailtxtcheckurl = SITEHOST . "mailcheck.php?userid=$user_id&checkcode=$user_email_checkid";
                $mailtxt = "本邮件为系统自动发送，您的战网在线安全令账号已经创建，本邮件是您申请重新发送邮箱验证邮件时正常发出的<br><br>" .
                        "您的用户名为：$user<br><br>" .
                        "您的用户ID为：$user_id<br><br>" .
                        "您的密码为：" . $passwd . " (已隐藏)<br><br>" .
                        "您的安全问题为：" . $questionid[$question1] . "<br><br>" .
                        "您的安全问题答案：(已隐藏)<br><br>" .
                        "您的邮箱地址为：$emailadd<br><br>" .
                        "您的账号已经创建，为了今后能顺利管理账号，请点击以下链接确认您的邮箱地址<br><br>" .
                        "<a href='$mailtxtcheckurl' target='_blank'>$mailtxtcheckurl</a><br><br>" .
                        "如果这不是您操作的，请忽略次邮件，绝对不要点击以上链接。<br><br>" .
                        "本邮件为自动发送，请不要回复，因为没人会看的。<br><br>" .
                        "战网安全令在线版开发团队<br><br>" .
			 "MyAuth.Us<br><br>" .
                        "A.L.P.C";
                    try {
                        $mail = new PHPMailer(true); //创建新的邮件

                        $body = $mailtxt;
                        $body = preg_replace('/\\\\/', '', $body); //替换

                        $mail->IsSMTP();                           // 使用SMTP
                        MOD_IXWEBHOSTING==1?$mail->SMTPAuth = false:$mail->SMTPAuth = true;                    // 启用SMTP验证 //IXWEBHOSTING使用模式1
                        $mail->Port = SMTP_PORT;                    // 设置SMTP端口
                        $mail->Host = SMTP_HOST; // SMTP服务器
                        $mail->Username = SMTP_USERNAME;     // SMTP用户名
                        $mail->Password = SMTP_PASSWD;            // SMTP 密码
                        $mail->SMTPSecure = "ssl";
                        //$mail->IsSendmail();  // 如果报错请取消注释

                        $mail->From = SMTP_USERNAME;
                        $mail->FromName  = "=?utf-8?B?" . base64_encode("战网安全令在线版开发团队") . "?=";

                        $to = $emailadd;

                        $mail->AddAddress($to);
                        
                        $mail->Subject    = "=?utf-8?B?" . base64_encode("战网安全令在线版邮箱验证邮件") . "?=";
                        $mail->AltBody = "若要查看本邮件，请使用支持HTML显示的邮箱客户端"; // optional, comment out and test
                        $mail->WordWrap = 80; // set word wrap

                        $mail->MsgHTML($body);

                        $mail->IsHTML(true); // send as HTML

                        $mail->Send();
                        $_SESSION['lastmail'] = $date;
                        echo "0";
                    } catch (phpmailerException $e) {
                        echo "4"; //发送失败
                    }
            } else {
                echo "2"; //已经确认了
            }
        }
    } else {
        echo "3"; //发送间隔太短了
    }
} else {
    echo "1";
}
?>