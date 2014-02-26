<?php
defined("ZHANGXUAN") or die("no hacker.");
$navurladd = SITEHOST . "faq.php";
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
                            <h2 id="article-title"> FAQ 常见问题解答 </h2>
                            <div id="article-content">
                                <h3 class="article-ci"> 战网安全令相关 </h3>
                                <p class="alignleft" style="font-size: 16px;">1、什么是战网安全令<br></p>
                                <p>
                                    “战网安全令”是暴雪公司针对《战网通行证》用户推出的一项账号保护措施。绑定安全令后，您每次登入游戏或战网通行证均需输入动态密码。“战网安全令”从根本上讲是暴雪公司设计的一种动态密码技术，通过一定的算法，每隔30秒动态生成一个新的密码。
                                </p>
                                <p class="alignleft" style="font-size: 16px;">2、为什么要使用战网安全令<br></p>
                                <p>
                                    您在登录账号，输入通行证密码之后，还需同时输入“安全令”生成的新密码。这种方式可以在最大程度上防止木马、系统漏洞、网络监听等原因造成密码泄露的隐患，确保您的账号安全。
                                </p>
                                <p class="alignleft" style="font-size: 16px;">3、为什么我使用了战网安全令还是被盗号了<br></p>
                                <p>
                                    您应该首先使用杀毒软件进行扫描，您的游戏登入界面已经被病毒伪造的，一旦您输入了账号、密码、安全令，您的资料将被发送到病毒制造者的计算机而非战网登入服务器上。<br>
                                    如果您登入游戏输入账号、密码、安全令后立即连接失败跳出，请不要立即尝试再次登入，首先确保您的电脑没有被病毒，然后再进行登入操作。
                                </p>
                                <p class="alignleft" style="font-size: 16px;">4、我该去哪里绑定我的安全令<br></p>
                                <p>
                                    <img src="<?php echo SITEHOST ?>doc/img/how.jpg" alt=""><br/>
                                    方式一：访问<a href="https://www.battlenet.com.cn/account/management/authenticator.html?authenticatorType=MA" target="_blank">https://www.battlenet.com.cn/account/management/authenticator.html?authenticatorType=MA</a><br/>
                                    方式二：登录您的战网通行证→选择密保产品→选择战网手机安全令
                                </p>
                                <h3 class="article-ci"> 战网安全令在线版账号相关 </h3>
                                <p class="alignleft" style="font-size: 16px;">1、注册与登入账号<br></p>
                                <p>
                                    访问<a href="<?php echo SITEHOST ?>register.php">账号创建</a>页面，依照页面显示输入用户名、密码、邮箱、安全问题及答案、验证码，点击免费注册战网安全令在线版账号，完成账号创建。<br>
                                    请牢记注册信息，特别是安全问题及答案，安全问题及答案一经注册永远无法修改，这是确认您身份的唯一证明，请不要透露给其他人。<br>
                                    注册成功后我们将发送一封邮箱地址确认邮件，您需要点击邮件中的链接确认邮箱地址以便在未来密码重置时使用。<br>
                                    注册账号后您会自动登入，若未登入请点击<a href="<?php echo SITEHOST ?>login.php">登入</a>，输入用户名、密码、验证码，完成登入。
                                </p>
                                <p class="alignleft" style="font-size: 16px;">2、如何修改用户资料<br></p>
                                <p>
                                    您可以访问<a href="<?php echo SITEHOST ?>account.php">我的账号</a>，点击右侧链接进行用户资料的修改。<br>
                                    如果要修改邮箱地址，请点击<a href="<?php echo SITEHOST ?>account.php">我的账号</a>页面右侧的<a href="<?php echo SITEHOST ?>changemailadd.php">修改邮箱地址</a>，输入新邮箱地址、注册时选择的安全问题及填写的答案、验证码，点击继续。<br>
                                    一旦提交新邮箱地址，我们将向该地址重新发送一封确认邮件，您需要点击邮件中的链接确认邮箱地址以便在未来密码重置时使用。<br>
                                    如果要修改密码，请点击<a href="<?php echo SITEHOST ?>account.php">我的账号</a>页面右侧的<a href="<?php echo SITEHOST ?>changepwd.php">修改密码</a>，输入旧密码、新密码、验证码，点击继续完成修改。<br>
                                    请<span style="color: red;">绝对</span>不要使用与您战网、魔兽世界、星际争霸II、暗黑破坏神III、炉石传说相同的密码
                                </p>
                                <p class="alignleft" style="font-size: 16px;">3、如何查看我的账号状态<br></p>
                                <p>
                                    您可以访问<a href="<?php echo SITEHOST ?>account.php">我的账号</a>，查看左侧账号信息。<br>
                                    在这里，您可以查看您邮箱地址确认状态及您已有安全令的数量。<br>
                                    当您的邮箱地址验证成功后，邮箱地址确认状态下的图标将显示为<span class="article-has-authenticator-has-active"></span>，否则将显示为<span class="article-none-authenticator"></span><br>
                                    目前我们允许您创建最多&nbsp;<?php echo MOST_AUTH; ?>&nbsp;个安全令<br>
                                    当您的安全令数量小于&nbsp;<?php echo (int) (2 * MOST_AUTH / 3); ?>&nbsp;个时，已添加安全令数量下的图标将显示为<span class="article-has-authenticator-has-active"></span><br>
                                    当您的安全令数量大于&nbsp;<?php echo (int) (2 * MOST_AUTH / 3); ?>&nbsp;小于&nbsp;<?php echo MOST_AUTH - 1; ?>&nbsp;个时，已添加安全令数量下的图标将显示为<span class="article-has-authenticator-none-active"></span><br>
                                    当您的安全令数量等于&nbsp;<?php echo MOST_AUTH; ?>&nbsp;个时，已添加安全令数量下的图标将显示为<span class="article-none-authenticator"></span>
                                </p>
                                <h3 class="article-ci"> 添加战网在线安全令 </h3>
                                <p class="alignleft" style="font-size: 16px;">1、如何添加新的战网在线版安全令<br></p>
                                <p>
                                    您可以访问<a href="<?php echo SITEHOST ?>addauth.php">添加安全令</a>页面添加一枚新的安全令。<br>
                                    在这里，您可以通过三种方式快速地向您的账号中添加一枚新的战网安全令，请注意，您最多只能添加&nbsp;<?php echo MOST_AUTH; ?>&nbsp;枚安全令至您的账号。<br>
                                    ①您可以通过服务器直接向暴雪请求一枚新的战网安全令<br>
                                    ②提交您已有安全令的序列号及密钥(40位)快速恢复一枚新的战网安全令。<br>
                                    ③提交您已有安全令的序列号及还原码(10位)快速恢复一枚新的战网安全令。<br>
                                    <span style="color: red;">
                                        特别说明:如果点击创建安全令后进入的页面未显示任何提示，请直接在该页面刷新，这个问题是由于创建/还原需要与暴雪服务器交互
                                    </span>
                                </p>
                                <p class="alignleft" style="font-size: 16px;">2、通过服务器请求一枚新安全令<br></p>
                                <p>
                                    您可以点击第一个按钮，通过服务器向暴雪请求一枚新的战网安全令<br>
                                    您需要输入安全令名称，并选择一个地区作为令牌生成申请发送目标，当您不选择任何地区时，默认将向暴雪中国服务器发送申请。<br>
                                    您可以选择安全令图片，该图片仅在<a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a>页面显示，且无法更改<br>
                                    输入验证码，确认申请，如点击设置为默认安全令，该枚新申请的安全令将作为您的默认安全令显示在首页中。
                                </p>
                                <p class="alignleft" style="font-size: 16px;">3、通过密钥(40位)恢复一枚新安全令<br></p>
                                <p>
                                    您可以点击第二个按钮，通过密钥(40位)恢复一枚新安全令<br>
                                    您需要输入安全令名称，安全令序列号及密钥，请注意，安全令序列号仅需要输入横线间的数字即可。<br>
                                    您可以选择安全令图片，该图片仅在<a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a>页面显示，且无法更改<br>
                                    输入验证码，确认还原，如点击设置为默认安全令，该枚新还原的安全令将作为您的默认安全令显示在首页中。
                                </p>
                                <p class="alignleft" style="font-size: 16px;">4、通过还原码(10位)恢复一枚新安全令<br></p>
                                <p>
                                    您可以点击第二个按钮，通过还原码(10位)恢复一枚新安全令<br>
                                    您需要输入安全令名称，安全令序列号及还原码，请注意，安全令序列号仅需要输入横线间的数字即可。<br>
                                    您可以选择安全令图片，该图片仅在<a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a>页面显示，且无法更改<br>
                                    输入验证码，确认还原，如点击设置为默认安全令，该枚新还原的安全令将作为您的默认安全令显示在首页中。<br>
                                    <span style="color:red;">如果您输入的还原码错误，下一页面将不显示任何信息，这是一个开发时的问题，未来可能会有所改进</span>
                                </p>
                                <p class="alignleft" style="font-size: 16px;">5、我该如何找到我的40位密钥<br></p>
                                <p>如果您使用战网手机安全令IOS版本，抱歉，我没有IOS的各种手机(<s>程序猿都穷</s>)，不知道去哪提取<br>
                                如果您使用战网手机安全令Android版，ROOT后使用附带ROOT权限的文件浏览器<br>
                                打开"data/data/com.blizzard.bma/shared_prefs/com.blizzard.bma.AUTH_STORE.xml"<br>
                                您可以在其中找到类似于<?php echo htmlspecialchars('<secretdata encrypted="">F192F7441D4E4FDA1E21E837C9DCAD4510E726BA</secretdata>'); ?>的内容<br>
                                其中F192F7441D4E4FDA1E21E837C9DCAD4510E726BA就是该安全令序列号对应的密钥，请注意，有时该串字符串可能会比40位多，只需要复制前40位即可<br>
                                如果您在计算机上使用WinAuth.exe软件生成安全令，请查看该软件生成的authenticator.xml文件，格式与Android版的xml文件相同，亦只需复制前40位即可<br>
                                其他私人开发的战网手机安全令软件请咨询相关开发人员<br>
                                在密钥输入框中直接粘贴，自动截取前40位</p>
                                <p class="alignleft" style="font-size: 16px;">6、我该如何找到我的10位还原码<br></p>
                                <p>当您使用各类战网手机安全令或WinAuth.exe等软件生成新的安全令时，软件均会显示一串10位的还原码，该还原码只能用来还原该序列号的安全令，还原到其他安全令时可能出错
                                    <br>还原码是10位包含字母与数字的字符串，例如"5S4GVQ2R6B"<br>
                                    在输入框中直接复制，自动截取前10位</p>
                                <h3 class="article-ci"> 战网在线安全令的管理、查看与备份 </h3>
                                <p class="alignleft" style="font-size: 16px;">1、我该如何管理我的安全令<br></p>
                                <p>如果您已经<a href="<?php echo SITEHOST; ?>addauth.php">添加安全令</a>，请访问<a href="<?php echo SITEHOST; ?>myauthall.php">我的安全令</a>页面<br>
                                    在该页面中您可以管理您已有的安全令，如果您的安全令总数小于&nbsp;<?php echo MOST_AUTH; ?>枚，右上角还会显示添加按钮<br>
                                    页面会显示您的安全令编号、名称、序列号、还原码、最后一次同步时间，并显示校正时间、设置默认、确认删除按钮。您可以点击每一行，访问该行对应安全令的动态密码页面。<br>
                                    安全令名称前若显示<img src="<?php echo SITEHOST; ?>resources/img/moren.png" alt="">则表示该安全令为您设置的默认安全令。<br>
                                    您可以双击文字更改安全令名称。<br>
                                    若您的安全令显示不正确，请点击校正时间按钮，系统将自动同步该枚安全令的时间。<br>
                                    <span style="color:red;">请注意，系统每24小时会自动重新校正该枚安全令的同步时间，在一般情况下无需点击校正时间按钮</span><br>
                                    如果要设置安全令为默认，请点击设置默认按钮。如果要删除该枚安全令，请点击确认删除按钮。
                                </p>
                                <p class="alignleft" style="font-size: 16px;">2、我该如何查看我的动态密码<br></p>
                                <p>如果您已经<a href="<?php echo SITEHOST; ?>addauth.php">添加安全令</a>，请访问<a href="<?php echo SITEHOST; ?>">首页</a>或<a href="<?php echo SITEHOST; ?>auth.php">默认安全令</a>页面<br>
                                    在该页面中您可以查看您默认安全令的动态密码，密码自动刷新，您也可以点击刷新安全令密码按钮手动刷新安全令，点击复制安全令密码即可将动态密码复制到系统剪贴板上，直接在游戏中粘贴即可<br>
                                    您可以在任何一枚安全令动态密码显示页面右侧或<a href="<?php echo SITEHOST ?>account.php">我的账号</a>页面中间查看到我的安全令，包括安全令图标、名称、序列号信息，点击可跳转至该枚安全令对应的动态密码显示页面<br>
                                    如果您的安全令总数小于&nbsp;<?php echo MOST_AUTH; ?>枚，上述内容下方还会包含<a href="<?php echo SITEHOST ?>addauth.php">添加安全令</a>按钮<br>
                                    <img src="<?php echo SITEHOST ?>doc/img/mauth.jpg" alt="">
                                </p>
                                <p class="alignleft" style="font-size: 16px;">3、我该如何备份我的安全令<br></p>
                                <p>如果您已经<a href="<?php echo SITEHOST; ?>addauth.php">添加安全令</a>，请访问<a href="<?php echo SITEHOST ?>account.php">我的账号</a>页面<br>
                                    在该页面右侧您可以找到<a href="<?php echo SITEHOST; ?>myauthcsv.php">下载我的安全令备份CSV </a>链接<br>
                                    点击该链接将自动下载包含您所有安全令信息的CSV文件，内容包括安全令名称、安全令序列号、安全令密钥、安全令还原码。
                                </p>
                                <h3 class="article-ci"> 其他 </h3>
                                <p class="alignleft" style="font-size: 16px;">1、这个网站安全吗<br></p>
                                <p>额，你问我，我问谁，我只知道在我的最大限度下能保证本站的安全，您的密码也被加密保存，不会有类似CSDN这种SB事件出现<br>
                                    重复一遍，请<span style="color: red;">绝对</span>不要使用与您战网、魔兽世界、星际争霸II、暗黑破坏神III、炉石传说相同的密码<br>
                                    如果您不放心，请不要注册使用，LOVE USE USE, NO USE ROLL……<br>
                                    如果您注册了，请放心使用<br>
                                    这不是一个钓鱼网站<br>
                                    虽然我很不屑于360这种东西，但是好多小明似乎对其很放心，那么放个图好了。自己去看吧。<br>
                                    <a href="http://webscan.360.cn/index/checkwebsite/url/www.myauth.us"><img border="0" alt="" src="http://img.webscan.360.cn/status/pai/hash/295153ef7bd118d60bd1e664e13de7a9"/></a>
                                </p>
                                <p class="alignleft" style="font-size: 16px;">2、这个网站能撑住吗<br></p>
                                <p>额，<s>程序猿都穷</s>，当然目前服务器的钱我还是撑得住的啦，如果这个网站使用人数超多了，服务器撑不住了，大概就要考虑换了………………
                                </p>
                                <p class="alignleft" style="font-size: 16px;">3、这么抄战网行么<br></p>
                                <p>额，<s>CSS苦手</s>，战网方面如有要求，我们可以在一段时间内重新更改界面，战网安全令在线版开发团队不是盈利机构，改页面花时间，累啊<br>
                                <s>其实本来想换点图标的，可是到最后觉得好累，就不换了</s>
                                </p>
                                <p class="alignleft" style="font-size: 16px;">4、免费吗<br></p>
                                <p>简单的回答:是的<br>
                                    支持我们做得更好，欢迎<s>捐赠</s>(暂时不需要)，谢谢
                                </p>
                                <p class="alignleft" style="font-size: 20px;">未尽事宜请查看<a href="<?php echo SITEHOST; ?>copyright.php">版权声明及免责条款</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
