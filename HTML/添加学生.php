<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>添加学生</title>
</head>

<style>
    :root {
        font-size: 16px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
        text-align: center;
        background: url(./images/创建课程界面.jpg);
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

    .W {
        text-align: center;
        width: 600px;
        height: 300px;
        position: relative;
        left: 34%;
    }

    .wrap {
        width: 600px;
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
        width: 300px;
        border-radius: 10px;
        text-align: center;
        text-align-last: center;
        font-size: 16px;
    }

    /* 设置点击没有边框 */
    .in:focus {
        outline: none;
        border: 1px solid orange;
    }

    .int {
        background-color: #fff;
        border: 1px solid white;
        padding: 0.9rem 0;
        margin: 0.5rem 0;
        width: 300px;
        height: 200px;
        border-radius: 10px;
        text-align: center;
        text-align-last: center;
        font-size: 20px;
    }

    .int:focus {
        outline: none;
        border: 1px solid orange;
    }

    .btn {
        background-color: yellow;
        background-image: linear-gradient(to right, rgb(243, 249, 167), rgb(240, 202, 107) 65%);
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
$course_id = $_SESSION['course_id'];
if (!empty($_POST['str'])) {
    //从表单获取课程信息
    $stu_str = $_POST['str'];
    $stu_no = explode(',', $stu_str);
    //从界面获得当前用户信息
    $name = $_SESSION['name']; //用户姓名
    $userType = $_SESSION['userType']; //用户是老师还是学生
    $userName = $_SESSION['userName']; //学工号
    //查找课程名称
    $sql_select_teacherid = "select name,teacher_id from courses where id = '$course_id'";
    $result = mysqli_query($conn, $sql_select_teacherid);
    $row = mysqli_fetch_assoc($result);
    $course_name = $row['name'];
    $tablename = $course_name . '_' . $course_id;
    $teacher_id = $row['teacher_id'];
    //逐个插入学生信息
    for ($i = 0; $i < sizeof($stu_no); $i++) {
        //查找学生id
        $sql_select_stuid = "select id,name from users where userName = '$stu_no[$i]'";
        $result = mysqli_query($conn, $sql_select_stuid);
        $row = mysqli_fetch_assoc($result);
        $student_id = $row['id'];
        $studentName = $row['name'];
        //向课程所有学生数据表中插入信息
        $sql_insert_to_course = "insert into " . $tablename . "(course_id, teacher_id, teacherName, student_id, studentNo, studentName) values('$course_id', '$teacher_id', '$name', '$student_id', '$stu_no[$i]', '$studentName')";
        if (mysqli_query($conn, $sql_insert_to_course)) {
        } else {
            echo "Error: " . $sql_insert_to_course . "<br>" . mysqli_error($conn);
            exit();
        }
        //向该学生的数据表中插入课程信息
        $type = 'S';
        $sql_insert_to_stu = "insert into " . $studentName . "(user_id, course_id, name, teachername, classday, classtime, userType) values('$student_id', '$course_id', '$course_name', '$name', '$classday', '$classtime', '$type')";
        if (mysqli_query($conn, $sql_insert_to_stu)) {
        } else {
            echo "Error: " . $sql_insert_to_stu . "<br>" . mysqli_error($conn);
            exit();
        }
        //创建学生文件夹
        $dir = 'file/' . $course_id . '/' . $student_id;
        mkdir($dir, 0777);
        $dir = 'file/' . $course_id . '/' . $student_id . '/.works';
        mkdir($dir, 0777);
        $dir = 'file/' . $course_id . '/' . $student_id . '/.signs';
        mkdir($dir, 0777);
        $dir = 'file/' . $course_id . '/' . $student_id . '/.workfiles';
        mkdir($dir, 0777);
    }
    echo <<<_GOTO_HOMEPAGE_END
            <form id="registerForm" action="添加学生成功界面.php" method="GET">
                <input type="hidden" name="coursename" value="$course_name">
                <input type="hidden" name="courseid" value="$course_id">
            </form>
            <script type="text/javascript">
            document.getElementById("registerForm").submit();
            </script>
            _GOTO_HOMEPAGE_END;
}
$conn->close();
?>

<body>
    <div class="W">
        <br><br><br>
        <strong>
            <h1>添加学生</h1>
        </strong>
        <div class="wrap">
            <form action="添加学生.php" method="post">
                <input class="int" type="text" name="str" placeholder="请以,为分隔输入学生学号" required="">
                <br>
                <input class="btn" type="submit" name="添加" value="添加">
            </form>
        </div>
    </div>
</body>

</html>