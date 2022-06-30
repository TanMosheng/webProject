<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>创建课程</title>
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

<body>
    <div class="W">
        <br><br><br>
        <strong>
            <h1>创建课程</h1>
        </strong>
        <div class="wrap">
            <form action="创建课程.php" method="post">
                <input class="in" type="text" name="course_name" placeholder="请输入课程名称" required="">
                <br>
                <select class="in" name="classday">
                    <option value="周一">周一</option>
                    <option value="周二">周二</option>
                    <option value="周三">周三</option>
                    <option value="周四">周四</option>
                    <option value="周五">周五</option>
                    <option value="周六">周六</option>
                    <option value="周日">周日</option>
                </select>
                <br>
                <select class="in" name="classtime">
                    <option value="08:00:00">08:00:00</option>
                    <option value="10:00:00">10:00:00</option>
                    <option value="14:00:00">14:00:00</option>
                    <option value="16:00:00">16:00:00</option>
                    <option value="19:00:00">19:00:00</option>
                </select>
                <br>
                <input class="int" type="text" name="str" placeholder="请以,为分隔输入学生学号" required="">
                <br>
                <input class="btn" type="submit" name="创建" value="创建">
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
if (!empty($_POST['course_name'])) {
    //从表单获取课程信息
    $course_name = $_POST['course_name'];
    $classday = $_POST['classday'];
    $classtime = $_POST['classtime'];
    $stu_str = $_POST['str'];
    $stu_no = explode(',', $stu_str);
    //从界面获得当前用户信息
    $name = $_SESSION['name']; //用户姓名
    $userType = $_SESSION['userType']; //用户是老师还是学生
    $userName = $_SESSION['userName']; //学工号
    //查找老师id
    $sql_select_teacherid = "select id from users where userName = '$userName'";
    $result = mysqli_query($conn, $sql_select_teacherid);
    $row = mysqli_fetch_assoc($result);
    $teacher_id = $row['id'];
    //将该课程信息插入所有课程的数据表中
    $sql_insert_to_allcourses = "insert into courses(name, teacher_id, create_date, classday, classtime) values('$course_name', '$teacher_id', CURDATE(), '$classday', '$classtime')";
    if (mysqli_query($conn, $sql_insert_to_allcourses)) {
    } else {
        echo "Error: " . $sql_insert_to_allcourses . "<br>" . mysqli_error($conn);
        exit();
    }
    //查找该课程的id
    $sql_select_courseid = "select id from courses";
    $result = mysqli_query($conn, $sql_select_courseid);
    $re = mysqli_num_rows($result);
    $course_id = $re;
    //创建该课程的所有学生的数据表
    $tablename = $course_name . '_' . $course_id;
    $sql_create_course = "create table " . $tablename . " (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        course_id  INT(11) NOT NULL COMMENT '课程id',
        teacher_id INT(11) NOT NULL COMMENT '老师id',
        teacherName VARCHAR(255) NOT NULL COMMENT '老师姓名'COLLATE 'utf8_unicode_ci',
        student_id INT(11) NOT NULL COMMENT '学生id',
        studentNo VARCHAR(10) NOT NULL COMMENT '学生学号'COLLATE 'utf8_unicode_ci',
        studentName VARCHAR(255) NOT NULL COMMENT '学生姓名'COLLATE 'utf8_unicode_ci'
    )COMMENT='该课程的所有学生' COLLATE='utf8_unicode_ci' ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    if (mysqli_query($conn, $sql_create_course)) {
    } else {
        echo "Error: " . $sql_create_course . "<br>" . mysqli_error($conn);
        exit();
    }
    //创建课程文件夹和share文件夹
    $dir = 'file/' . $course_id;
    mkdir($dir, 0777);
    $dir = 'file/' . $course_id . '/share';
    mkdir($dir, 0777);
    $dir = 'file/' . $course_id . '/' .$teacher_id;
    mkdir($dir, 0777);
    $dir = 'file/' . $course_id . '/' .$teacher_id.'/.works';
    mkdir($dir, 0777);
    $dir = 'file/' . $course_id . '/' .$teacher_id.'/.signs';
    mkdir($dir, 0777);
    //向老师的数据表中插入课程信息
    $type = 'T';
    $sql_insert_to_stu = "insert into " . $name . "(user_id, course_id, name, teachername, classday, classtime, userType) values('$teacher_id', '$course_id', '$course_name', '$name', '$classday', '$classtime', '$type')";
    if (mysqli_query($conn, $sql_insert_to_stu)) {
    } else {
        echo "Error: " . $sql_insert_to_stu . "<br>" . mysqli_error($conn);
        exit();
    }
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
        $dir = 'file/' . $course_id . '/' . $student_id .'/.works';
        mkdir($dir, 0777);
        $dir = 'file/' . $course_id . '/' . $student_id .'/.signs';
        mkdir($dir, 0777);
        $dir = 'file/' . $course_id . '/' . $student_id .'/.workfiles';
        mkdir($dir, 0777);
    }
    echo <<<_GOTO_HOMEPAGE_END
            <form id="registerForm" action="创建课程成功界面.php" method="GET">
                <input type="hidden" name="coursename" value="$course_name">
                <input type="hidden" name="courseid" value="$course_id">
                <input type="hidden" name="classday" value="$classday">
                <input type="hidden" name="classtime" value="$classtime">
                <input type="hidden" name="teachername" value="$name">
            </form>
            <script type="text/javascript">
            document.getElementById("registerForm").submit();
            </script>
            _GOTO_HOMEPAGE_END;
}
$conn->close();
?>
