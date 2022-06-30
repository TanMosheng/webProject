<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登录界面</title>
  <link rel="stylesheet" href="./styles/登录界面.css">
  <script defer="true" src="./scripts/登录界面切换.js"></script>
</head>


<?php
session_start();
$server = "localhost";
$db_username = "web2022";
$db_passwd = "123456";
$dbname = "web2022";
//连接数据库
$conn =  mysqli_connect($server, $db_username, $db_passwd, $dbname);
// 检测连接
if ($conn->connect_error) {
  die("连接失败: " . $conn->connect_error);
}
$logfail = false;
$logsuccess = false;
if (isset($_POST['login'])) {
  $userName = $_POST['userName'];
  $password = $_POST['password'];
  $sql = "select userName,password from users where userName = '$userName'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (($userName != $row['userName']) || ($password != $row['password'])) {
    $logfail = true;
  } else if ($password == $row['password']) {
    $logsuccess = true;
    if ($_POST['autoLogin'] == "yes") {
      setcookie('userName', $userName, time() + 7 * 24 * 60 * 60);
      setcookie('code', md5($userName . md5($password)), time() + 7 * 24 * 60 * 60);
    } else {
      setcookie('userName', '', time() - 999999);
      setcookie('code', '', time() - 999999);
    }
  }
}
?>

<body>
  <!-- 整体布局 -->
  <div class="container right-panel-active">

    <!-- 教师登录框 -->
    <div class="container_form container_signup">
      <form action="登录界面.php" class="form" name="myForm" method="post"">
        <h1 class="form_title">欢迎登录</h1>
        <input type="text" name="userName" placeholder="工号" class="input" required="">
        <input type="password" name="password" placeholder="密码" class="input" required="">
        <div>
          <span>记住密码</span><input type="checkbox" name="rup" id="rup" value="yes" />
          <span>自动登录</span><input type="checkbox" name="autoLogin" value="yes" />
        </div>
        <div>
          <span><a href="./注册界面.php" class="link">立即注册</a></span>
          &emsp;
          <span><a href="./忘记密码界面.php" class="link">忘记密码</a></span>
        </div>
        <input class="btn" type="submit" name="login" value="登录">
        <?php if ($logfail) echo '<div class="err_tip">账号或密码错误，请重试</div>' ?>
      </form>
    </div>

    <!-- 学生登录框 -->
    <div class="container_form container_signin">
      <form action="登录界面.php" class="form" name="myForm" method="post">
        <h1 class="form_title">欢迎登录</h1>
        <input type="text" name="userName" placeholder="学号" class="input" required="">
        <input type="password" name="password" placeholder="密码" class="input" required="">
        <div>
          <span>记住密码</span><input type="checkbox" name="rup" id="rup" value="yes" />
          <span>自动登录</span><input type="checkbox" name="autoLogin" value="yes" />
        </div>
        <div>
          <span><a href="./注册界面.php" class="link">立即注册</a></span>
          &emsp;
          <span><a href="./忘记密码界面.php" class="link">忘记密码</a></span>
        </div>
        <input class="btn" type="submit" name="login" value="登录">
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
    $server = "localhost";
    $db_username = "web2022";
    $db_passwd = "123456";
    $dbname = "web2022";
    //连接数据库
    $conn =  mysqli_connect($server, $db_username, $db_passwd, $dbname);
    // 检测连接
    if ($conn->connect_error) {
      die("连接失败: " . $conn->connect_error);
    }
    $userName = $_POST['userName'];
    $sql = "select userName,name,userType from users where userName = '$userName'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $userType = $row['userType'];
    $_SESSION['name'] = $name;
    $_SESSION['userName'] = $userName;
    $_SESSION['userType'] = $userType;
    echo <<<_GOTO_HOMEPAGE_END
    <form id="loginForm" action="home.php" method="GET">
      <input type="hidden" name="userName" value="$userName"> 
      <input type="hidden" name="name" value="$name">
      <input type="hidden" name="userType" value="$userType">
    </form>
    <script type="text/javascript">
      document.getElementById("loginForm").submit();
    </script>
_GOTO_HOMEPAGE_END;
    $conn->close();
  }
  ?>
  <script>
    window.onload = function() {
      var oForm = document.getElementById('myForm');
      var oUser = document.getElementById('userName');
      var oPswd = document.getElementById('password');
      var oRemember = document.getElementById('rup');
      if(getCookie('userName')&&getCookie('password'))
      {
        oUser.value = getCookie('userName');
        oPswd.value = getCookie('password');
        oRemember.checked = true;
      }
      oRemember.onchange = function(){
        if(!this.checked)
        {
          delCookie('userName');
          delCookie('password');
        }
      };
      oForm.onsubmit = function() {
        if(rup.checked)
        {
          setcookie('userName', oUser.value,7);
          setcookie('password', oPswd.value,7);
        }
      };
    };
    function setCookie(name,value,day)
    {
      var date = new Date();
      date.setDate(date.getDate()+day);
      document.cookie = name + '=' + value + ';expires=' + date;
    }
    function getCookie(name)
    {
      var reg = RegExp(name + '=([^;]+)');
      var arr = document.cookie.match(reg);
      if(arr){
        return arr[1];
      }
      else{
        return '';
      }
    }
    function delCookie(name){
      setCookie(name,null,-1);
    }
  </script>
</body>

</html>
