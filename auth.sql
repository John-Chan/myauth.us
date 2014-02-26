SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `authdata` (
  `auth_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `auth_moren` int(1) NOT NULL,
  `auth_name` varchar(80) CHARACTER SET utf8 NOT NULL COMMENT '安全令备注',
  `serial` varchar(20) CHARACTER SET utf8 NOT NULL,
  `region` varchar(10) CHARACTER SET utf8 NOT NULL,
  `secret` varchar(60) CHARACTER SET utf8 NOT NULL,
  `sync` bigint(20) NOT NULL,
  `last_sync` datetime NOT NULL,
  `restore_code` varchar(20) NOT NULL,
  `auth_img` int(1) NOT NULL,
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `user_pass` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '用户密码',
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '用户邮箱',
  `user_email_checked` int(1) NOT NULL,
  `user_registered` datetime NOT NULL COMMENT '用户注册时间',
  `user_cookie` varchar(40) CHARACTER SET utf8 NOT NULL COMMENT 'Cookie',
  `user_question` bigint(20) NOT NULL,
  `user_answer` varchar(40) CHARACTER SET utf8 NOT NULL,
  `user_email_checkid` varchar(60) CHARACTER SET utf8 NOT NULL,
  `user_email_find_code` varchar(60) CHARACTER SET utf8 NOT NULL,
  `user_email_find_mode` int(1) NOT NULL,
  `user_psd_reset_token` varchar(80) NOT NULL,
  `user_psd_reset_token_used` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
