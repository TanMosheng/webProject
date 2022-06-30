<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="4; charset=UTF-8">
    <title>创建成功</title>
    <style type="text/css">
        #div1 {
            margin: 0 auto;
            width: 600px;
            height: 400px
        }

        body {
            text-align: center;
            align-items: center;
            background-color: #e9e9e9;
            background: url(./images/创建课程成功界面.jpg);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: grid;
            height: 100vh;
            place-items: center;
        }

        .link {
            color: rgb(80, 146, 245);
            font-size: 1.2rem;
            margin: 1rem 0 0 0;
            text-decoration: none;
        }

        .link:hover {
            color: rgb(63, 81, 244);
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div id="div1">
        <h4>恭喜您，添加学生成功!课程<?php echo $_GET['coursename']; ?>的课程编号为<?php echo $_GET['courseid']; ?></h4><br>
        <h4>现有学生：</h4><br>
        <?php
        $courseid = $_GET['courseid'];
        $coursename = $_GET['coursename'];
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
        $student_no = array();
        $student_name = array();
        $cnt = 0;
        $tablename = $coursename.'_'.$courseid;
        $sql_select_courses = "select studentName,studentNo from " . $tablename . "";
        $result = mysqli_query($conn, $sql_select_courses);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "学号：".$row['studentNo']."  姓名：".$row['studentName']."<br>";
            }
        }
        ?>
        <br>
        <a href="./home.php" class="link">点击返回主页</a>
    </div>

</body>

</html>