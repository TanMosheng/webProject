<!DOCTYPE html>
<html lang="zh_CN">

<head>
    <meta charset="UTF-8">
    <title>注册界面</title>
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

    input::-ms-input-placeholder {
        text-align: center;
        color: red;
        font-weight: bold;
    }

    input::-webkit-input-placeholder {
        text-align: center;
        font-weight: bold;
    }

    option {
        text-align: center;
        font-weight: bold;
    }

    label {
        font-size: 16px;
        width: 150px;
        height: 2em;
        display: inline-block;
        text-align: right;
        padding-right: 5px;
        font-weight: bold;
    }

    .W {
        text-align: center;
        width: 600px;
        height: 300px;
        position: relative;
        left: 34%;
    }

    .wrap {
        width: 450px;
        height: 250px;
        position: relative;
        top: 25%;

    }

    .item {
        height: 30px;
    }

    .top {
        width: 180px;
    }

    .in {
        background-color: #fff;
        border: 1px solid white;
        padding: 0.9rem 0;
        margin: 0.5rem 0;
        width: 200px;
        border-radius: 10px;
        text-align: center;
    }

    /* 设置点击没有边框 */
    .in:focus {
        outline: none;
        border: 1px solid orange;
    }

    .btn {
        background-color: yellow;
        background-image: linear-gradient(to right, rgb(238, 178, 113), rgb(252, 238, 117) 65%);
        border-radius: 5px;
        border: 1px solid skyblue;
        color: #222831;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: bold;
        left: 300px;
        letter-spacing: 0.1rem;
        left: 50%;
        position: inherit;
        padding: 0.5rem 1.8rem;
        /* 过渡的时间还有样式 */
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    .btn:hover {
        transform: scale(0.9);
    }
</style>

<body>
    <div class="W">
        <br><br><br><br>
        <strong>
            <h1>用户注册</h1>
        </strong>
        <div class="wrap">
            <form action="注册界面.php" method="POST">
                <div class="item">
                    <label>
                        学工号：
                    </label>
                    <input class="in" type="text" name="userName" pattern="[0-9]{8}" placeholder="请输入学工号" required="">
                </div>
                <br><br>
                <div class="item">
                    <label>
                        姓名：
                    </label>
                    <input class="in" type="text" name="name" placeholder="请输入姓名" required="">
                </div>
                <br><br>
                <div class="item">
                    <label>
                        性别：
                    </label>
                    <select class="in" name="gender">
                        <option value="M">男</option>
                        <option value="F">女</option>
                    </select>
                </div>
                <br><br>
                <div class="item">
                    <label>
                        密码：
                    </label>
                    <input class="in" type="password" name="password" placeholder="请输入密码" required="">
                </div>
                <br><br>
                <div class="item">
                    <label>
                        再次输入密码：
                    </label>
                    <input class="in" type="password" name="password1" placeholder="请确认密码" required="">
                </div>
                <br><br>
                <div class="item">
                    <label>
                        电话号码：
                    </label>
                    <input class="in" type="phone" name="phone" pattern="^(13[0-9]|15[0-9]|18[0-9])([0-9]{8})$" placeholder="请输入11位电话号码">
                </div>
                <br><br>
                <div class="item">
                    <label>
                        身份：
                    </label>
                    <select class="in" name="userType">
                        <option value="S">学生</option>
                        <option value="T">教师</option>
                    </select>
                </div>
                <br><br>
                <div class="item">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input class="btn" type="submit" value="提交">
                    <input class="btn" type="reset" value="重置">
                </div>
                <br><br>
            </form>
        </div>
    </div>
</body>

</html>

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

if (!empty($_POST['userName'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $userType = $_POST['userType'];

    $sql = "select userName from user where userName = '$userName'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //判断用户名是否存在
    if ($userName != $row['userName']) {
        //用户名不存在 将注册的账号密码加入数据库
        if ($password != $_POST['password1']) {
            echo "<script>alert('两次输入密码不同！请重新输入！')</script>";
        } else {
            $sql_insert = "insert into user(userName,name,gender,password,phone,userType) values('$userName','$name','$gender','$password','$phone','$userType')";
            if (mysqli_query($conn, $sql_insert)) {
                $userName = $_POST['userName'];
                $name = $_POST['name'];
                $userType = $_POST['userType'];
                echo <<<_GOTO_HOMEPAGE_END
            <form id="registerForm" action="注册成功界面.php" method="GET">
            <input type="hidden" name="userName" value="$userName">
            <input type="hidden" name="name" value="$name">
            <input type="hidden" name="userType" value="$userType">
            </form>
            <script type="text/javascript">
            document.getElementById("registerForm").submit();
            </script>
            _GOTO_HOMEPAGE_END;
            } else {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        }
    } else {

        echo "<script>alert('用户名.$userName.已经存在!请重新注册')</script>";
    }
}
?>
