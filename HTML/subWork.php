<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <title>提交作业</title>
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
$user_id = $_POST["user_id"];
$course_id = $_POST["course_id"];
$puber_id = $_POST["puber_id"];

$title = $_POST["title"];
$pubTime = $_POST["pubTime"];
$endTime = $_POST["endTime"];
$desc = $_POST["desc"];

$error = $_FILES['workFile']['error'];
$workFileRoad = "file/$course_id/$user_id/.works/" .
  "$pubTime $endTime $title";
$filename = "file/$course_id/$user_id/.workfiles/" .
  "$pubTime $endTime $title";

?>

<body>
  <div class="W">
    <?php
    if ($_FILES['workFile']['error']) {
      echo '<h1>出错了，请联系管理员解决</h1>';
    } else {
      if ($filename != "") {
        if (!is_dir($filename)) {
          mkdir($filename, 0777, true);
        }
        $filename = $filename . '/' . $_FILES['workFile']['name'];
        move_uploaded_file($_FILES['workFile']['tmp_name'], $filename);

        $workFile = fopen($workFileRoad, 'w');
        fwrite($workFile, $filename);
        echo <<< shshs
        <h1 onclick="window.location.href='./work.php'">&emsp;&emsp;&emsp;&emsp;提交成功</h1>
        shshs;
      }
    }
    ?>
  </div>
</body>
