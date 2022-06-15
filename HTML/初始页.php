<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="4; charset=UTF-8">
<title>导航页</title>
<style type="text/css">
#div1{margin:0 auto;width:400px;height:200px}
body{
    text-align:center;
    align-items: center;
    background-color: #e9e9e9;
    background: url(../images/初始页.jpg);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: grid;
    height: 100vh;
    place-items: center;
}
</style>

</head>
<body>

<div id="div1">
<br/>
<br/>
<br/>
<h1>欢迎进入学生信息管理系统</h1>
<h4>（5秒后自动跳转）<a href="./登录界面.html">点击立即进入</a></h4>
</div>
<script language="javascript" type="text/javascript">
setTimeout("javascript:location.href='./登录界面.html'", 5000);
</script>

</body>
</html>
