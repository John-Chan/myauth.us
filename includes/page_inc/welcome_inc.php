<?php
defined("ZHANGXUAN") or die("no hacker.");
$navurladd = SITEHOST . "welcome.php";
?>
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
                <div class="article-column">
                    <div id="article-container">
                        <div id="article">
                            <div class="article-games">
                                <a href="/"><img src="/resources/img/auth.png" alt=""></a>
                            </div>
                            <h2 id="article-title"> 欢迎使用战网安全令在线版 </h2>
                            <div id="article-content">
                                <p>
                                    欢迎访问战网安全令在线版。<br>在这里，你能通过在线方式生成、还原一枚安全令，这些安全令可以用于战网及其游戏的登入，<br>
                                    包括且不限于魔兽世界、星际争霸II、暗黑破坏神III、炉石传说、战网Battle.Net<br>
                                    您可以使用任何连入国际互联网的计算机访问我们，并获得您的动态密码，出门办事，再也不必担心手机没电/压根没带导致不能登入游戏的情况发生<br>
                                    <?php if(SSLMODE==0){
                                        echo '如果您想使用安全的版本，请访问<a href="'.SITEHOSTSAFEMODE.'" alt="SSL加密版战网安全令手机版">'.SITEHOSTSAFEMODE.'</a>，安全的版本将保证您的各项数据不被不良程序截获';
                                    }else{
                                        echo '如果您想使用快速的版本，请访问<a href="'.SITEHOSTSAFEMODE.'" alt="普通版战网安全令手机版">'.SITEHOSTSAFEMODE.'</a>，您可以获得较快的访问体验';
                                    }?>
                                </p>  
                                <p>
                                    我们支持CN/EU/US三大安全令颁发服务器的安全令申请。各服务器颁发的安全令的主要使用国家或地区如下：<br>
                                    CN：中国大陆(国服)<br>
                                    EU：欧洲诸国(欧服)<br>
                                    US：美国/巴西(美服)、韩国(韩服)、台湾地区/香港地区/澳门地区/新加坡等南洋诸国(台服)<br>
                                </p>
                                <p>
                                    通过我们申请或还原的安全令与战网手机安全令显示的密码一致，密码刷新时间误差基本在3秒以内，误差取决于您连接到我们服务器的延迟
                                </p>
                                <p>
                                    若想要使用我们的服务，请<a href="<?php echo SITEHOST ?>register.php">注册</a>或<a href="<?php echo SITEHOST ?>login.php">登入</a>您的账号
                                </p>
                                <p>
                                    访问<a href="<?php echo SITEHOST ?>addauth.php">添加安全令</a>来为您的账号添加一枚安全令，访问<a href="<?php echo SITEHOST ?>auth.php">默认安全令</a>查看您设置的默认安全令。每个账号最多可以添加&nbsp;<?php echo MOST_AUTH;?>&nbsp;枚安全令<br>
                                    如果您已经<a href="<?php echo SITEHOST ?>login.php">登入</a>且拥有一枚<a href="<?php echo SITEHOST ?>auth.php">默认安全令</a>，那么首页将显示默认安全令的动态密码，您可以保存成书签方便今后查看<br>
                                    在安全令页面中您可以点击刷新安全令密码按钮刷新显示的动态密码与时间滚动条，点击复制安全令密码按钮复制当前的安全令密码<br><br>
                                    <img src="<?php echo SITEHOST ?>doc/img/auth.jpg" alt=""><br><br>
                                    访问<a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a>来管理您的安全令，您可以在该页面中校准安全令时间、设置默认安全令、删除已有安全令、更改安全令名称<br>
                                    <img src="<?php echo SITEHOST ?>doc/img/myauth.jpg" alt=""><br><br>
                                </p>
                                <p>
                                    如果忘记密码请前往<a href="<?php echo SITEHOST ?>forgetpwd.php">重置密码</a>页面，如要管理账号请前往<a href="<?php echo SITEHOST ?>account.php">我的账号</a>页面<br>
                                    在<a href="<?php echo SITEHOST ?>account.php">我的账号</a>页面中您可以查看账号资料、修改密码、修改邮箱、下载安全令备份CSV文件等<br>
                                    请务必记住您的注册信息，该信息将在您重置密码、更改邮箱地址时使用。请<span style="color:red;">绝对</span>不要使用与您战网、魔兽世界、星际争霸II、暗黑破坏神III、炉石传说相同的密码，以免发生纠纷<br>
                                    注册前请仔细查看<a href="<?php echo SITEHOST ?>copyright.php">版权声明与免责条款</a>，您未来可能发生的一切账号失窃事件均与本站无关，重复一遍，请<span style="color:red;">绝对</span>不要使用与您战网、魔兽世界、星际争霸II、暗黑破坏神III、炉石传说相同的密码
                                </p>
                                <p>
                                     更多使用问题，请参访<a href="<?php echo SITEHOST ?>faq.php">FAQ</a><br>
                                </p>
                                <p>
                                    请不要吐槽我COPY了战网的界面，我在CSS上的造诣基本等于0，谢谢。<br>
                                    源于一个简单的想法
                                </p>
                                <p style="text-align: right;">
                                    竹井詩織里<br>2013-06-20
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
