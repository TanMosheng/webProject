<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="4; charset=UTF-8">
    <title>注册成功</title>
    <style type="text/css">
        #div1 {
            margin: 0 auto;
            width: 400px;
            height: 200px
        }

        body {
            text-align: center;
            align-items: center;
            background-color: #e9e9e9;
            background: url(./images/注册成功界面.jpg);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: grid;
            height: 100vh;
            place-items: center;
        }

        .link {
            color: rgb(157, 138, 244);
            font-size: 0.9rem;
            margin: 1rem 0 0 0;
            text-decoration: none;
        }

        .link:hover {
            color: rgb(99, 81, 181);
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div id="div1">
        <br />
        <br />
        <br />
        恭喜您，<?php echo $_GET['name']; ?>(<?php echo $_GET['userName']; ?>)注册成功!<br>
        <h4>（8秒后自动跳转）<a href="./登录界面.php" class="link">点击立即进入登录界面</a></h4>
    </div>
    <script language="javascript" type="text/javascript">
        setTimeout("javascript:location.href='./登录界面.php'", 8000);
    </script>

</body>

</html>
