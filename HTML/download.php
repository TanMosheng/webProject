<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>下载文件</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
  }

  body {
    text-align: center;
    background: url("./images/img4.jpg") fixed center no-repeat;
    background-size: cover;
  }

  html {
    width: 100%;
    height: 100%;
  }

  .down {
    width: 800px;
    height: 800px;
    position: fixed;
    top: 0;
    left: 0px;
    right: 0;
    bottom: 0;
    margin: auto;
    border-radius: 20px;
    background: grey;
    filter: alpha(Opacity=60);
    -moz-opacity: 0.6;
    opacity: 0.6;
  }

  u1 {
    list-style: none;
    left: 900px;
    top: 100px;
    position: fixed;
  }

  u1>li {
    /*float: left;*/
    /*width: 120px;*/
    /*height: 40px;*/
    line-height: 20px;
    text-align: center;
  }

  .nav a {
    display: block;
    width: 80px;
    height: 40px;
    text-decoration: none;
    color: #ffffff;
    background-color: purple;
  }

  .nav a:hover {
    background-color: orange;
  }
</style>
<?php

?>

<body>
  <br><br>
  <h1 onclick="window.history.back();">下载课件</h1>
  <div class="down">
    <u1>
      <?php
      $course_id = $_SESSION['course_id'];
      $filespath = './file/' . $course_id . '/share' . '/';
      $files = scandir($filespath);
      unset($files[0]);
      unset($files[1]);
      $files = array_values($files);
      foreach ($files as $value) {
        echo "<li>" . '<a href="' . $filespath . '' . $value . '">' . $value . '</a>' . "</li>";
        echo "<br>";
      }
      ?>
    </u1>
  </div>
</body>

</html>
