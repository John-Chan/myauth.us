<?php 
defined("ZHANGXUAN") or die("no hacker.");
function allatthecho($login,$auth_exist,$userid){
    global $dbconnect;
    if($login==0){
        $returntxt="";
        return $returntxt;
    }
    else{
        if($auth_exist==0){
            $imgurl[1]="/resources/img/wow-32.png";
            $imgurl[2]="/resources/img/s2-32.png";
            $imgurl[3]="/resources/img/d3-32.png";
            $imgurl[4]="/resources/img/pegasus-32.png";
            $returntxt="";
            $sql="SELECT * FROM `authdata` WHERE `user_id`='$userid' AND `auth_moren`='1'";
            $result = mysqli_query($dbconnect,$sql);
            while($rowarr=mysqli_fetch_array($result)){
            $returntxt=$returntxt.'
            <li class="border-4">
                        <span class="game-icon">
                            <span class="png-fix"><img width="32" height="32" src="'. $imgurl[$rowarr['auth_img']].'"></img></span>
                        </span>
                        <span class="account-info">
                            <span class="account-link">
                                <strong>
                                    <a class="CN-WOW-mop-se" href="'.SITEHOST.'normalauth.php?authid='.$rowarr['auth_id'].'">安全令名称：'.$rowarr['auth_name'].'</a>
                                </strong><span class="account-id">
                                    序列号：'.$rowarr['serial'].'
                                </span>
                                <span class="account-region">本站编号：'.$rowarr['auth_id'].'</span>
                            </span>
            </span></li>';}
            
            $sql="SELECT * FROM `authdata` WHERE `user_id`='$userid' AND `auth_moren`='0'";
            $result = mysqli_query($dbconnect,$sql);
            while($rowarr=mysqli_fetch_array($result)){
                $returntxt=$returntxt.'
            <li class="border-4">
                        <span class="game-icon">
                            <span class="png-fix"><img width="32" height="32" src="'. $imgurl[$rowarr['auth_img']].'"></img></span>
                        </span>
                        <span class="account-info">
                            <span class="account-link">
                                <strong>
                                    <a class="CN-WOW-mop-se" href="'.SITEHOST.'normalauth.php?authid='.$rowarr['auth_id'].'">安全令名称：'.$rowarr['auth_name'].'</a>
                                </strong><span class="account-id">
                                    序列号：'.$rowarr['serial'].'
                                </span>
                                <span class="account-region">本站编号：'.$rowarr['auth_id'].'</span>
                            </span>
            </span></li>';
            }
        return $returntxt;
        }
    }
}
?>
<script type="text/javascript">
    geturladd='<?php echo SITEHOST."includes/auth_get/auth_normal_get.php?authid=".$auth_id; ?>';
</script>
<script type="text/javascript" src="../../resources/js/normal_auth.js"></script>
<script type="text/javascript" src="../../resources/js/ZeroClipboard.js"></script> 
<script type="text/javascript" src="../../resources/js/lobby.js"></script> 
<script type="text/javascript" src="../../resources/js/bam.js"></script> 
<script type="text/javascript" src="../../resources/js/common.js"></script> 
<link rel="stylesheet" href="../../resources/css/authbody.css" type="text/css" />
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
            <div id="page-content">
                <div id="breadcrumb">
                    <ol class="ui-breadcrumb">
                    <li><a href="<?php echo SITEHOST; ?>">首页</a></li>
                    <li class="last"><a href="<?php echo $navurladd; ?>"><?php echo $topnavvalue ?></a></li>
                    </ol>
                </div>
                </div>
            <div id="mianbiantai">
            <div id="manage-security" class="manage-security">
                        <div id="dashboard" class="dashboard">
                            <h4 class="supporting">
                                    我的安全令：<?php echo $rowauth['auth_name']; ?>
                            </h4>
                            <div class="security-image">
                                <img width="200" height="230" src="/resources/img/auth-icon.png" alt="" title=""></img>
                            </div><div>
                            <div class="auth-info-box">
                                <div class="section details">
                                    <dl>
                                        <dt class="subcategory">类别</dt>
                                        <dd>
                                            <strong class="active">
                                                 <?php 
                                                 if($rowauth['auth_moren']==1)echo "默认安全令";
                                                 else echo "普通安全令"?>
                                            </strong>
                                        </dd>
                                    </dl>
                                </div>
                                <div class="section actions"><ul><li class="remove-authenticator"><a class="icon-delete" href="<?php echo SITEHOST."delauth.php?authid=".$rowauth['auth_id'];?>" onclick="if(confirm('提交后将删除这枚安全令，除重新添加外无其他恢复方法，确定吗？'))return true;else return false;">
                                            删除这枚安全令
                                    </a></li><li class="read-faq"><a class="icon-help" href="<?php echo SITEHOST?>copyright.php">
                                        版权声明及免责条款
                                </a></li></ul></div>
                            </div>
                            <div class="authenticator">
                                <span id="authcode">88888888</span>
                                <div  class="processbardiv" ><strong id ="authprogressbar" class="authprogress" style="width:0%;"></strong></div>
                            </div>
                                <div id="rightajaxzhuangtai" class="rightajaxzhuangtai"></div>
                                <div id="copydatamode" class="copydatamode"></div>
                                <submit class="ui-button button1" id="creation-submit" tabindex="1"><span class="button-left"><span class="button-right">复制安全令密码</span></span></button>
                            </div>
                            <h3 class="baoguanhaomima">请妥善保管密码，不要将其随意告知他人。<br>若安全令显示不准确，请访问<a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a>对令牌重新进行校时。</h3>
                            <submit class="ui-button button1" id="refreshcode" onclick="refreshcodegeas();" tabindex="1"><span class="button-left"><span class="button-right">刷新安全令密码</span></span></button>
                        </div>
                    </div>
            <div id="lobby-games">
                <div id="games-list"> 
                    <a class="games-title border-2 closed" href="#wow" id="aforwowjq" rel="game-list-wow">我的安全令</a>
                    <ul id="game-list-wow" style="display: none;">
                        <?php echo allatthecho($logincheck,$autherrid,$user_id);
                        
                $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
                $result = mysqli_query($dbconnect,$sql);
                if (mysqli_num_rows($result) < MOST_AUTH) {?>
                            <!--添加账号-->
                            <li id="addWowTrial" class="trial no-subtitle border-4" >
                                <span class="game-icon">
                            <span class="png-fix"><img width="32" height="32" src="/resources/img/bga.png" alt=""></img></span></span>
                            <span class="account-info">
                            <span class="account-link">
                                <strong>
                                    <a class="CN-WOW-mop-se" href="<?php echo SITEHOST?>addauth.php">战网安全令在线版</a>
                                </strong>
                                <span class="account-region">中国(CN) 美国(US) 欧洲(EU)</span>
                        </span></span><strong class="action add-trial">添加令牌</strong>
                    </li><?php };?>
                    </ul>
                </div>
            </div></div>
          </div>
      </div>
</div>