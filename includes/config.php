<?php

/* * 通用设置 */
date_default_timezone_set("Asia/Shanghai");//时区
error_reporting(0);//隐藏所有错误报告

/* * 页面地址 - 请依照你的域名更改 */
define("SITEHOST", "http://myauth.us/");//普通
define("SITEHOSTSAFEMODE", "https://safe.myauth.us/");//SSL，若无SSL请与普通一样

// ** MySQL 设置 - 具体信息来自您正在使用的主机 - 请首先建立auth数据库,然后导入根目录中的auth.sql ** //
/* * 数据库名称 */
define('DB_NAME', 'auth');

/** MySQL 数据库用户名 */
define('DB_USER', 'root');

/** MySQL 数据库密码 */
define('DB_PASSWORD', '12345678');

/** MySQL 主机 */
define('DB_HOST', 'localhost');

/** 每个用户最多的安全令数量  * */
define('MOST_AUTH', 10);

// ** 邮件设置 - 推荐使用腾讯域名邮箱以便与代码适配 ** //
/* * 邮局地址* */
define('SMTP_HOST', "smtp.qq.com");

/* * 邮局端口* */
define('SMTP_PORT', 465);

/* * 邮件用户名* */
define('SMTP_USERNAME', "10000@qq.com");

/* * 邮件密码* */
define('SMTP_PASSWD', "12345678");

//禁止直接include
define('ZHANGXUAN',true);

//是否SSL
define('SSLMODE',0);//是SSL的主机请设置为1

$dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //连接数据库
@mysqli_select_db($dbconnect, DB_NAME);
?>
