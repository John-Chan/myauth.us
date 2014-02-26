<?php
defined("ZHANGXUAN") or die("no hacker.");
function allatthecho($login, $userid) {
    global $dbconnect;
    if ($login == 0) {
        $returntxt = "";
        return $returntxt;
    } else {
        $sql = "SELECT * FROM `authdata` WHERE `user_id`='$userid'";
        $result = mysqli_query($dbconnect,$sql);
        $imgurl[1] = "/resources/img/wow-32.png";
        $imgurl[2] = "/resources/img/s2-32.png";
        $imgurl[3] = "/resources/img/d3-32.png";
        $imgurl[4]="/resources/img/pegasus-32.png";
        $returntxt = "";
        while ($rowarr = mysqli_fetch_array($result)) {
            $returntxt = $returntxt . '
            <li class="border-4">
                        <span class="game-icon">
                            <span class="png-fix"><img width="32" height="32" src="' . $imgurl[$rowarr['auth_img']] . '" alt=""></span>
                        </span>
                        <span class="account-info">
                            <span class="account-link">
                                <strong>
                                    <a class="CN-WOW-mop-se" href="' . SITEHOST . 'normalauth.php?authid=' . $rowarr['auth_id'] . '">安全令名称：' . $rowarr['auth_name'] . '</a>
                                </strong><span class="account-id">
                                    序列号：' . $rowarr['serial'] . '
                                </span>
                                <span class="account-region">本站编号：' . $rowarr['auth_id'] . '</span>
                            </span>
            </span></li>';
        }
        return $returntxt;
    }
}
?>

<link rel="stylesheet" href="../../resources/css/accountbody.css" type="text/css" />
<script type="text/javascript" src="../../resources/js/common.js"></script> 
<script type="text/javascript" src="../../resources/js/lobby.js"></script> 
<script type="text/javascript" src="../../resources/js/account.js.php"></script> 
<div id="layout-middle">
    <div id="homewrapper"><div id="content">
            <div id="lobby"><div id="page-content" class="page-content">
                    <div id="lobby-account">
                        <h3 class="section-title">账号信息</h3>
                        <div class="lobby-box">
                            <h4 class="subcategory">账号名称</h4>
                            <p><?php echo strtoupper($rowtemp['user_name']); ?></p>
                            <h4 class="subcategory">邮箱</h4>
                            <p><?php echo $rowtemp['user_email']; ?></p>
                        </div>
                        <h3 class="section-title">账号状态</h3>
                        <div class="lobby-box security-box">
                            <h4 class="subcategory">邮箱地址确认状态</h4>
                            <?php
                            if ($rowtemp['user_email_checked'] == 1) {
                                echo '<p class="has-authenticator-has-active">已确认</p>';
                            } else {
                                echo '<p class="none-authenticator">未确认<span id="mailcheck" class="edit">[<a style="cursor:pointer;" onclick="renewemail();alert(\'如果您一直无法收到确认邮件,请前往邮箱设置noreply@myauth.us为白名单\')"> 重新发送验证邮件 </a>]</span></p><br>';
                            }
                            ?>
                            <h4 class="subcategory">已添加安全令数量</h4>
                            <?php
                            if ($auth_total_all >= 0 && $auth_total_all <= (int) (2 * MOST_AUTH / 3)) {
                                echo "<p class='has-authenticator-has-active'>$auth_total_all/" . MOST_AUTH . "</p>";
                            } elseif ($auth_total_all >= (int) (2 * MOST_AUTH / 3) + 1 && $auth_total_all <= (MOST_AUTH - 1)) {
                                echo "<p class='has-authenticator-none-active'>$auth_total_all/" . MOST_AUTH . "</p>";
                            } else {
                                echo "<p class='none-authenticator'>$auth_total_all/" . MOST_AUTH . "</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <div id="lobby-games">
                        <h3 class="section-title">安全令管理&添加</h3>
                        <div id="games-list"> 
                            <a class="games-title border-2 closed" href="#wow" id="aforwowjq" rel="game-list-wow">我的安全令</a>
                            <ul id="game-list-wow" style="display: none;">
                                <?php
                                echo allatthecho($logincheck, $user_id);
                                $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
                                $result = mysqli_query($dbconnect,$sql);
                                if (mysqli_num_rows($result) < MOST_AUTH) {
                                    ?>
                                    <!--添加账号-->
                                    <li id="addWowTrial" class="trial no-subtitle border-4" >
                                        <span class="game-icon">
                                            <span class="png-fix"><img width="32" height="32" src="/resources/img/bga.png" alt=""></span></span>
                                        <span class="account-info">
                                            <span class="account-link">
                                                <strong>
                                                    <a class="CN-WOW-mop-se" href="<?php echo SITEHOST ?>addauth.php">战网安全令在线版</a>
                                                </strong>
                                                <span class="account-region">中国(CN) 美国(US) 欧洲(EU)</span>
                                            </span></span><strong class="action add-trial">添加令牌</strong>
                                    </li><?php }; ?>
                            </ul>
                        </div>
                        <div id="games-tools">
                            <?php if (mysqli_num_rows($result) < MOST_AUTH) { ?>
                                <a id="add-time" class="border-5" href="<?php echo SITEHOST ?>addauth.php" >添加安全令</a>
                            <?php }; ?>
                            <div style="margin-top: 7px;">
                                <p><a class="" href="<?php echo SITEHOST ?>changemailadd.php" onclick=""><span class="icon-16 icon-account-mail"></span><span class="icon-16-label">
                                            修改邮箱地址
                                        </span></a></p>
                                <p><a class="" href="<?php echo SITEHOST ?>changepwd.php" onclick=""><span class="icon-16 icon-account-safe"></span><span class="icon-16-label">
                                            修改密码
                                        </span></a></p>
                                <p><a class="" href="<?php echo SITEHOST ?>myauthall.php" onclick=""><span class="icon-16 icon-account-auth"></span><span class="icon-16-label">
                                            我的安全令
                                        </span></a></p>
                                <?php if($auth_total_all>0){?>
                                <p><a class="" href="<?php echo SITEHOST ?>myauthcsv.php" onclick=""><span class="icon-16 icon-account-download"></span><span class="icon-16-label">
                                            下载我的安全令备份CSV
                                        </span></a></p>
                                <?php };?>
                                <p><a class="" href="<?php echo SITEHOST ?>copyright.php" onclick=""><span class="icon-16 icon-account-faq"></span><span class="icon-16-label">
                                            FAQ
                                        </span></a></p>
                                <p><a class="" href="<?php echo SITEHOST ?>copyright.php" onclick=""><span class="icon-16 icon-account-copyright"></span><span class="icon-16-label">
                                            版权声明及免责条款
                                        </span></a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>