<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <title>签到详情</title>
</head>
<style>
  :root {
    font-size: 16px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }

  body {

    background: url(./images/sign.jpg);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .W {
    position: absolute;
    left: 40%;
    width: 400px;
    font-size: 16px;
    display: inline-block;
    text-align: left;
    margin: auto;
    border-radius: 20px;
    padding-right: 5px;
    font-weight: bold;
    background: #cad9e9;
    filter: alpha(Opacity=80);
    -moz-opacity: 0.6;
    opacity: 0.5;
  }
</style>
<?php
$course_id = $_GET['course_id'];
$user_id = $_GET['user_id'];

$pubTime = $_GET['pubTime'];
$endTime = $_GET['endTime'];

$pubTime = str_replace(':', '_', $pubTime);
$endTime = str_replace(':', '_', $endTime);

$signDesc = $_GET['desc'];
$signTitle = $_GET['title'];

$signFile = fopen('file/' . $course_id . '/' . $user_id . '/' . '.signs' . '/' .
  $pubTime . ' ' . $endTime . ' ' . $signTitle, 'w') or die('遇到未知错误，请联系管理员解决');
fwrite($signFile, $signDesc);

$pubTime = str_replace(array('T', '_'), array(' ', ':'), $pubTime);
$endTime = str_replace(array('T', '_'), array(' ', ':'), $endTime);
?>

<body>
  <div class="W">
    <h1>&emsp;&emsp;&emsp;&emsp;签到信息</h1>
    <div class="sign_title">&emsp;&emsp;&emsp;<?php echo "$signTitle"; ?></div>
    <div class="sign_time">&emsp;&emsp;&emsp;<?php echo "发布时间：$pubTime"; ?></div>
    <div class="sign_time">&emsp;&emsp;&emsp;<?php echo "截止日期：$endTime"; ?></div>
    <div class="sign_info">&emsp;&emsp;&emsp;<?php echo "$signDesc;" ?></div>
  </div>
  <script>
    setTimeout(function() {
      window.history.back();
    }, 5000);
  </script>
</body>

</html>
