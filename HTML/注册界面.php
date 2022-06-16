<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<style>
    :root {
        font-size: 16px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
        text-align: center;
        background: url(./images/注册界面.jpg);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .btn {
        background-color: skyblue;
        background-image: linear-gradient(to right, rgb(241, 191, 147), rgb(247, 151, 72) 65%);
        border-radius: 5px;
        margin: 0px;
        border: 1px solid skyblue;
        color: #222831;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: bold;
        letter-spacing: 0.1rem;
        padding: 0.5rem 1.8rem;
        /* 过渡的时间还有样式 */
        text-transform: uppercase;
        transition: transform 80ms ease-in;

    }

    .btn:hover {
        transform: scale(0.9);
    }

    .input {
        background-color: #fff;
        border: 1px solid white;
        padding: 0.9rem 0.9rem;
        margin: 0.5rem 0;
        width: 10%;
        border-radius: 20px;
    }

    /* 设置点击没有边框 */
    input:focus {
        outline: none;
        border: 1px solid orange;
    }
</style>

<body>
    <br><br><br><br>
    <strong>
        <h1>用户注册</h1>
    </strong>
    <form action="http://localhost:63342/untitled/%E7%99%BB%E5%BD%95.html?_ijt=h2h10aoavo3j6cd9t8u550a30o" method="post">
        学号/工号：
        <input class="input" type="text" name="userNo" pattern="[0-9]" placeholder="请输入学号或工号" required="">
        <br><br>
        姓名：
        <input class="input" type="text" name="name" placeholder="请输入姓名" required="">
        <br><br>
        性别：
        <input type="radio" name="gender" value="M" checked="true"> 男 <input type="radio" name="gender" value="F"> 女
        <br><br>
        密码：
        <input class="input" type="password" name="password" placeholder="请输入密码" required="">
        <br><br>
        再次输入密码：
        <input class="input" type="password" name="password" placeholder="请确认密码" required="">
        <br><br>
        电话号码：
        <input class="input" type="phone" name="phone" pattern="[0-9]{11}" placeholder="请输入11位电话号码" >
        <br><br>
        身份：
        <input type="radio" name="userType" value="S" checked="true"> 学生 <input type="radio" name="userType" value="T"> 老师
        <br><br>
        <input class="btn" type="submit" value="提交">
    </form>

</body>

</html>
