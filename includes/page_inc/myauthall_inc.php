<?php
defined("ZHANGXUAN") or die("no hacker.");

function chinesetime($timevalue) {
    $text = substr($timevalue, 0, 4) . "年" . substr($timevalue, 5, 2) . "月" . substr($timevalue, 8, 2) . "日" . substr($timevalue, 11, 2) . "时" . substr($timevalue, 14, 2) . "分" . substr($timevalue, 17, 2) . "秒";
    return $text;
}

function tableshowtext($logincheck, $user) {
    global $dbconnect;
    if ($logincheck == 1) {
        $returntxt = "";
        $imgurl[1] = "/resources/img/wow-32.png";
        $imgurl[2] = "/resources/img/s2-32.png";
        $imgurl[3] = "/resources/img/d3-32.png";
        $imgurl[4] = "/resources/img/pegasus-32.png";
        $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
        $result = mysqli_query($dbconnect, $sql);
        $rowtemp = mysqli_fetch_array($result);
        $user_id = $rowtemp['user_id'];
        $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
        $result = mysqli_query($dbconnect, $sql);
        while ($rowauth = mysqli_fetch_array($result)) {
            if ($rowauth['auth_moren'] == 1) {
                $namebeizhu = "<img class='morenauthleftpic' src='" . SITEHOST . "resources/img/moren.png'>";
                $txtbuttonmoren = '<button id="morenauthbutton' . $rowauth['auth_id'] . '" class="ui-button button1" disabled="disabled" onclick="authmoren(' . $rowauth['auth_id'] . ')"><span class="button-left"><span id="morenanquanlin' . $rowauth['auth_id'] . '"  class="button-right">已为默认</span></span></button>';
            } else {
                $namebeizhu = "";
                $txtbuttonmoren = '<button id="morenauthbutton' . $rowauth['auth_id'] . '" class="ui-button button1" onclick="authmoren(' . $rowauth['auth_id'] . ')"><span class="button-left"><span id="morenanquanlin' . $rowauth['auth_id'] . '"  class="button-right">设置默认</span></span></button>';
            }
            $linkuel = 'onclick="location.href = \'' . SITEHOST . 'normalauth.php?authid=' . $rowauth['auth_id'] . '\'"';
            SSLMODE == 0 ? $txtdisabalebut = "" : $txtdisabalebut = 'disabled="disabled"';
            SSLMODE == 0 ? $onclickdata = 'authsync(' . $rowauth['auth_id'] . ')' : $onclickdata = 'alert(\'若要校准时间，请前往'.SITEHOST.'\')';
            $returntxt = $returntxt . '<tr class="parent-row" id="henxiangtr' . $rowauth['auth_id'] . '">
                             <td ' . $linkuel . ' class="normaltd authbianhao" valign="top"><img class="tdimgauth" src="' . $imgurl[$rowauth['auth_img']] . '" alt="">&nbsp;<a class="authida" href="normalauth.php?authid=' . $rowauth['auth_id'] . '">' . $rowauth['auth_id'] . '</a></td>
                                <td class="normaltd authmincheng" valign="top"><span id="morenpicspan' . $rowauth['auth_id'] . '">' . $namebeizhu . '</span><span ondblclick="ShowElement(this,' . $rowauth['auth_id'] . ')" id="authnamecode' . $rowauth['auth_id'] . '">' . $rowauth['auth_name'] . '</span></td>
                                <td ' . $linkuel . ' class="normaltd authxuliehao" valign="top"><span>' . $rowauth['serial'] . '</span></td>
                                <td ' . $linkuel . ' class="normaltd authhuanyuanma" valign="top"><span>' . $rowauth['restore_code'] . '</span></td>
                                <td ' . $linkuel . ' class="normaltd authshangcitongbushijian" valign="top"><span id="authshangcitongbushijian' . $rowauth['auth_id'] . '">' . chinesetime($rowauth['last_sync']) . '</span></td>
                                <td valign="top" class="align-center">
                                  <button id="authsyncbutton' . $rowauth['auth_id'] . '" class="ui-button button1" onclick="' . $onclickdata . '" ' . $txtdisabalebut . '><span class="button-left"><span id="jiaochenshijian' . $rowauth['auth_id'] . '"  class="button-right">校正时间</span></span></button>
                                </td>
                                <td valign="top" class="align-center">
                                  ' . $txtbuttonmoren . '</td>
                                <td valign="top" class="align-center">
                                <button id="authdelbutton' . $rowauth['auth_id'] . '" class="ui-button button1" onclick="if(confirm(\'提交后将删除这枚安全令，除重新添加外无其他恢复方法，确定吗？\')) authdelete(' . $rowauth['auth_id'] . ') ;else return false;"><span class="button-left"><span id="shanchuauth' . $rowauth['auth_id'] . '"  class="button-right">确认删除</span></span></button>
                                </td>
                                </tr>';
        }
        return $returntxt;
    } else {
        return "";
    }
}
?>
<?php
if ($logincheck == 1) {
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect, $sql);
    $rowtemp = mysqli_fetch_array($result);
    $user_id = $rowtemp['user_id'];
    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_moren`=1";
    $result = mysqli_query($dbconnect, $sql);
    $rowauth = mysqli_fetch_array($result);
    if ($rowauth) {
        echo '<script type="text/javascript">var serverauthmorenid=' . $rowauth['auth_id'] . ';</script>';
    }
}
?>
<link rel="stylesheet" href="../../resources/css/myauthall.css" type="text/css" />
<script type="text/javascript" src="../../resources/js/auth_sync.js.php"></script>
<script type="text/javascript" src="../../resources/js/auth_delete.js.php"></script>
<script type="text/javascript" src="../../resources/js/auth_moren.js.php"></script>
<script type="text/javascript" src="../../resources/js/autn_name.js.php"></script>
<div id="layout-middle">
    <div id="homewrapper">
        <div id="content">
            <div id="page-header">
                <h2 class="subcategory">
                    战网安全令
                </h2> <h3 class="headline"> 我的全部安全令 </h3>

                <div id="youshangfangtianjiaABC" class="youshangfangtianjia">
                    <?php
                    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
                    $result = mysqli_query($dbconnect, $sql);
                    if (mysqli_num_rows($result) < MOST_AUTH) {
                        ?><a class="ui-button button1" href="<?php echo SITEHOST; ?>addauth.php"><span class="button-left"><span class="button-right">
                                    添加一个安全令
                                </span></span></a><?php }; ?></div>
            </div>
        </div>
        <div id="page-content" class="page-content">
            <div id="order-history">
                <div class="data-container type-table">
                    <table><thead>
                            <tr class="">
                                <th align="left"><span class="arrow">
                                        安全令编号</span>
                                </th><th align="left"><span class="arrow">
                                        名称(双击文字可修改)
                                    </span></th>
                                <th align="left">
                                    <span class="arrow">
                                        序列号
                                    </span>
                                </th>
                                <th align="left">
                                    <span class="arrow">
                                        还原码
                                    </span>
                                </th><th align="left">
                                    <span class="arrow">
                                        最后一次与暴雪服务器同步时间
                                    </span>
                                </th>
                                <th align="center"><span class="arrow">
                                        重新同步
                                    </span></th>
                                <th align="center"><span class="arrow">
                                        默认安全令
                                    </span></th>
                                <th align="center"><span class="arrow">
                                        删除
                                    </span></th></tr></thead>
                        <tbody>
<?php echo tableshowtext($logincheck, $user); ?>     
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>