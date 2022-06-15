<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录注册界面</title>
    <link rel="stylesheet" href="./styles/登录界面.css">
    <script defer="true" src="./scripts/登录界面切换.js"></script>
</head>


<?php
function isLogInfoCorrect($username, $password)
{
    return $username == 'admin' && $password == 'admin';
}
?>

<?php
$logfail = false;
$logsuccess = false;
if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isLogInfoCorrect($username, $password)) {
        $logsuccess = true;
    } else {
        $logfail = true;
    }
}
?>

<body>
    <!-- 整体布局 -->
    <div class="container right-panel-active">

        <!-- 教师登录框 -->
        <div class="container_form container_signup">
            <form action="登录界面.php" class="form" id="teacherform" method="post">
                <h1 class="form_title">欢迎登录</h1>
                <input type="text" name="username" placeholder="工号" class="input" required="">
                <input type="password" name="password" placeholder="密码" class="input" required="">
                <div>
                    <span>记住密码</span><input type="checkbox" name="rup" id="rup" />
                    <span>自动登录</span><input type="checkbox" name="autoLogin" />
                </div>
                <div>
                    <span><a href="./学生注册页面.html" class="link">立即注册</a></span>
                </div>
                <input class="btn" type="submit" value="登录">
                <?php if ($logfail) echo '<div class="err_tip">账号或密码错误，请重试</div>' ?>
            </form>
        </div>

        <!-- 学生登录框 -->
        <div class="container_form container_signin">
            <form action="登录界面.php" class="form" id="studentform" method="post">
                <h1 class="form_title">欢迎登录</h1>
                <input type="text" name="username" placeholder="学号" class="input" required="">
                <input type="password" name="password" placeholder="密码" class="input" required="">
                <div>
                    <span>记住密码</span><input type="checkbox" name="rup" id="rup" />
                    <span>自动登录</span><input type="checkbox" name="autoLogin" />
                </div>
                <div>
                    <span><a href="./学生注册页面.html" class="link">立即注册</a></span>
                </div>
                <input class="btn" type="submit" value="登录">
                <?php if ($logfail) echo '<div class="err_tip">账号或密码错误，请重试</div>' ?>
            </form>
        </div>

        <!--控制学生登录与教师登录移动-->
        <div class="container_overlay">
            <div class="overlay">
                <div class="overlay_panel overlay_left">
                    <button class="btn" id="signin">学生登录</button>
                </div>
                <div class="overlay_panel overlay_right">
                    <button class="btn" id="signup">教师登录</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($logsuccess) {
        $identity = $_POST['identity'];
        $username = $_POST['username'];
        echo <<<_GOTO_HOMEPAGE_END
    <form id="loginForm" action="home.php">
      <input type="hidden" name="identity" value="$identity">
      <input type="hidden" name="username" value="$username">
    </form>
    <script type="text/javascript">
      document.getElementById("loginForm").submit();
    </script>
_GOTO_HOMEPAGE_END;
    }
    ?>
</body>

</html>
