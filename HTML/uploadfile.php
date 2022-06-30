<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>上传文件</title>
</head>
<style>body{text-align: center}</style>
<style>*{
  margin:0;
  padding:0;
}
html{
  width:100%;
  height:100%;
}
body {
  text-align: center;
  background: url("./images/img4.jpg") fixed center no-repeat;
  background-size: cover;
}
  .main{
    width: 700px;
    height: 450px;
    background: rgba(0, 0, 0, 0.3);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    /*边框圆角*/
    border-radius: 10px;
    /*添加边框挤下去*/
    padding: 70px 0;
    box-sizing: border-box;
    /*加阴影*/
    box-shadow: 0 0 5px 5px rgba(0,0,0,0.4);
  }
 .sbt {
  width:80px;
  height:40px;
  background-color: blueviolet;
  background-image: linear-gradient(to right, #c29957, #e3ad1e);
  /*圆角*/
  border-radius: 10px;
  border: 1px solid skyblue;
  text-align: center;
  padding-top: 0;
  box-sizing: border-box;
  font-size: 1.0rem;
  cursor: auto;
  font-weight: bold;
  left: 300px;
  letter-spacing: 0.1rem;
  position: center;
}
 .sbt:hover {
  transform: scale(0.9);
}
  .sel{
    width: 150px;
    height: 50px;
    background-color: transparent;
    border:none;
    outline: none;
    color: black;

  }
  .sym>h1{
    text-align: center;
    color: black;
    font-size: 45px;
  }
    input{
      font-variant-position: initial;
      position: center;
  }
</style>
<body>
<div class="main">
  <div class="sym">
    <h1 onclick="window.history.back();">上传课件</h1>
  </div>
  <br>
  <h2 >请选择要上传的文件</h2>
  <br>
  <form action="uploadfile.php"  enctype="multipart/form-data"  method="post">
      <input  class="sel" type="file" value="请选择上传的文件" name="upfile[]" multiple="multiple">
    <br>
      <input class="sbt" type="submit"  name="submit" value="上 传">
  </form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
  for($i=0;$i<=count($_FILES['upfile']['tmp_name']);$i++){
    $errno=$_FILES['upfile']['error'][$i];
    //var_dump($_FILES['upfile']['name'],$_FILES['upfile']['tmp_name']);
    if($errno!=UPLOAD_ERR_OK){
      echo "<h4>{$_FILES['upfile']['name'][$i]}上传错误<h4>";
      switch($errno){
        case 1:
          die('上传文件超过了php.ini配置文件中upload_max_filesize设置的值');
        case 2:
          die('上传文件超过了HTML表单中设置的MAX_FILE_SIZE指定的值');
        case 3:
          die('文件只有部分上传');
        case 4:
          die('没有文件上传');
        case 6:
          die('找不到临时文件夹');
        case 7:
          die('文件写入失败');
      }
      break;
    }
    else{
      $course_id = $_SESSION['course_id'];
      $tmpName=$_FILES['upfile']['tmp_name'][$i];
      $upfileName=$_FILES['upfile']['name'][$i];
      $upfileName=mb_convert_encoding($upfileName,'GB18030','utf-8');
      if(file_exists($tmpName)){
        $dir = 'file/'.$course_id.'/share'.'/';
        move_uploaded_file($tmpName,$dir.$upfileName);
      }
    }
  }
  echo "<h3>恭喜你，文件上传成功<h3>";
}
?>

