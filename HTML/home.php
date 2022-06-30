<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>主页</title>
    <link rel="stylesheet" href="./styles/home.css">
</head>
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
$name = $_SESSION['name']; //用户姓名
$userType = $_SESSION['userType']; //用户是老师还是学生
$userName = $_SESSION['userName']; //学工号
$_SESSION['name'] = $name;
$_SESSION['userName'] = $userName;
$_SESSION['userType'] = $userType;
//课程表信息获取
$sql_select = "select name from " . $name . " where classday = '周一' and classtime = '08:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Mon_1 = $row['name'];
} else {
    $Mon_1 = "";
}
$sql_select = "select name from " . $name . " where classday = '周一' and classtime = '10:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Mon_2 = $row['name'];
} else {
    $Mon_2 = "";
}
$sql_select = "select name from " . $name . " where classday = '周一' and classtime = '14:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Mon_3 = $row['name'];
} else {
    $Mon_3 = "";
}
$sql_select = "select name from " . $name . " where classday = '周一' and classtime = '16:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Mon_4 = $row['name'];
} else {
    $Mon_4 = "";
}
$sql_select = "select name from " . $name . " where classday = '周一' and classtime = '19:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Mon_5 = $row['name'];
} else {
    $Mon_5 = "";
}
$sql_select = "select name from " . $name . " where classday = '周二' and classtime = '08:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Tue_1 = $row['name'];
} else {
    $Tue_1 = "";
}
$sql_select = "select name from " . $name . " where classday = '周二' and classtime = '10:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Tue_2 = $row['name'];
} else {
    $Tue_2 = "";
}
$sql_select = "select name from " . $name . " where classday = '周二' and classtime = '14:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Tue_3 = $row['name'];
} else {
    $Tue_3 = "";
}
$sql_select = "select name from " . $name . " where classday = '周二' and classtime = '16:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Tue_4 = $row['name'];
} else {
    $Tue_4 = "";
}
$sql_select = "select name from " . $name . " where classday = '周二' and classtime = '19:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Tue_5 = $row['name'];
} else {
    $Tue_5 = "";
}
$sql_select = "select name from " . $name . " where classday = '周三' and classtime = '08:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Wed_1 = $row['name'];
} else {
    $Wed_1 = "";
}
$sql_select = "select name from " . $name . " where classday = '周三' and classtime = '10:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Wed_2 = $row['name'];
} else {
    $Wed_2 = "";
}
$sql_select = "select name from " . $name . " where classday = '周三' and classtime = '14:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Wed_3 = $row['name'];
} else {
    $Wed_3 = "";
}
$sql_select = "select name from " . $name . " where classday = '周三' and classtime = '16:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Wed_4 = $row['name'];
} else {
    $Wed_4 = "";
}
$sql_select = "select name from " . $name . " where classday = '周三' and classtime = '19:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Wed_5 = $row['name'];
} else {
    $Wed_5 = "";
}
$sql_select = "select name from " . $name . " where classday = '周四' and classtime = '08:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Thu_1 = $row['name'];
} else {
    $Thu_1 = "";
}
$sql_select = "select name from " . $name . " where classday = '周四' and classtime = '10:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Thu_2 = $row['name'];
} else {
    $Thu_2 = "";
}
$sql_select = "select name from " . $name . " where classday = '周四' and classtime = '14:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Thu_3 = $row['name'];
} else {
    $Thu_3 = "";
}
$sql_select = "select name from " . $name . " where classday = '周四' and classtime = '16:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Thu_4 = $row['name'];
} else {
    $Thu_4 = "";
}
$sql_select = "select name from " . $name . " where classday = '周四' and classtime = '19:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Thu_5 = $row['name'];
} else {
    $Thu_5 = "";
}
$sql_select = "select name from " . $name . " where classday = '周五' and classtime = '08:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Fri_1 = $row['name'];
} else {
    $Fri_1 = "";
}
$sql_select = "select name from " . $name . " where classday = '周五' and classtime = '10:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Fri_2 = $row['name'];
} else {
    $Fri_2 = "";
}
$sql_select = "select name from " . $name . " where classday = '周五' and classtime = '14:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Fri_3 = $row['name'];
} else {
    $Fri_3 = "";
}
$sql_select = "select name from " . $name . " where classday = '周五' and classtime = '16:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Fri_4 = $row['name'];
} else {
    $Fri_4 = "";
}
$sql_select = "select name from " . $name . " where classday = '周五' and classtime = '19:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Fri_5 = $row['name'];
} else {
    $Fri_5 = "";
}
$sql_select = "select name from " . $name . " where classday = '周六' and classtime = '08:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sat_1 = $row['name'];
} else {
    $Sat_1 = "";
}
$sql_select = "select name from " . $name . " where classday = '周六' and classtime = '10:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sat_2 = $row['name'];
} else {
    $Sat_2 = "";
}
$sql_select = "select name from " . $name . " where classday = '周六' and classtime = '14:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sat_3 = $row['name'];
} else {
    $Sat_3 = "";
}
$sql_select = "select name from " . $name . " where classday = '周六' and classtime = '16:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sat_4 = $row['name'];
} else {
    $Sat_4 = "";
}
$sql_select = "select name from " . $name . " where classday = '周六' and classtime = '19:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sat_5 = $row['name'];
} else {
    $Sat_5 = "";
}
$sql_select = "select name from " . $name . " where classday = '周日' and classtime = '08:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sun_1 = $row['name'];
} else {
    $Sun_1 = "";
}
$sql_select = "select name from " . $name . " where classday = '周日' and classtime = '10:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sun_2 = $row['name'];
} else {
    $Sun_2 = "";
}
$sql_select = "select name from " . $name . " where classday = '周日' and classtime = '14:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sun_3 = $row['name'];
} else {
    $Sun_3 = "";
}
$sql_select = "select name from " . $name . " where classday = '周日' and classtime = '16:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sun_4 = $row['name'];
} else {
    $Sun_4 = "";
}
$sql_select = "select name from " . $name . " where classday = '周日' and classtime = '19:00:00'";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $Sun_5 = $row['name'];
} else {
    $Sun_5 = "";
}
$course_name = array();
$teacher_name = array();
$cnt = 0;
$sql_select_courses = "select name, teachername from " . $name . "";
$result = mysqli_query($conn, $sql_select_courses);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $course_name[$cnt] = $row['name'];
        $teacher_name[$cnt] = $row['teachername'];
        $cnt = $cnt + 1;
    }
}
?>

<body>
    <div class="mask"></div>
    <iframe src="./login.html" id="login-box" scrolling="no" frameborder="0"></iframe>
    <div class="topBtn" style="display:none;">返回顶部</div>
    <div class="header">
        <!-- 顶部内容 -->
        <div class="header-content w">
            <!-- logo -->
            <div class="logo"><img src="./images/logotwo.png"></div>
            <!-- 选项栏 -->
            <ul class="header-tab">
                <li>
                    <a href="javascript:;">首页</a>
                </li>
                <li>
                    <a href="javascript:;">课程页面</a>
                </li>
            </ul>
            <div class="login">
                <span>欢迎<?php echo $name; ?></span>
            </div>
        </div>
    </div>
    <!-- 顶部区域 -->
    <!-- 内容区域 isBlock控制每个内容区块显示隐藏-->
    <!-- 首页 -->
    <div class="isBlock" style="display: block;">
        <!-- 顶部模块 -->
        <div class="top">
            <!-- 轮播图 -->
            <div class="focus">
                <ul>
                    <li style="display:block"><img src="./images/focus1.jpg" alt=""></li>
                    <li><img src="./images/focus2.jpg" alt=""></li>
                    <li><img src="./images/focus3.jpg" alt=""></li>
                    <li><img src="./images/focus4.jpg" alt=""></li>
                    <li><img src="./images/focus5.jpg" alt=""></li>
                </ul>
                <div class="circle">
                </div>
            </div>
            <!-- 信息 -->
            <div class="message">
                <div class="top-left">
                    <ul>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!-- 咨询模块 -->
                <div class="top-right">
                    <div class="top-right-header">
                        <h2>最新资讯</h2>
                        <span>更多&nbsp;&nbsp;></span>
                    </div>
                    <div class="top-right-content">
                        <p>吉大超星1.0版本更新公告</p>
                        <p>平台新增上传、下载文件功能</p>
                        <p>平台新增签到功能</p>
                        <p>平台新增课程表显示</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 课表 -->
        <div class="recommend w clear">
            <table border="1">
                <caption><?php echo $name; ?>的课表</caption>
                <tr height="10" align="center">
                    <td> </td>
                    <td>周一</td>
                    <td>周二</td>
                    <td>周三</td>
                    <td>周四</td>
                    <td>周五</td>
                    <td>周六</td>
                    <td>周日</td>
                </tr>
                <tr height="60" align="center">
                    <td width="30"> 1</td>
                    <td width="120" rowspan="2" <?php if ($Mon_1 != "") {
                                                    echo 'style="background-color:#99ccff"';
                                                    echo '>' . $Mon_1;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Tue_1 != "") {
                                                    echo 'style="background-color:#84cf93"';
                                                    echo '>' . $Tue_1;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Wed_1 != "") {
                                                    echo 'style="background-color:#294872"';
                                                    echo '>' . $Wed_1;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Thu_1 != "") {
                                                    echo 'style="background-color:#aed483"';
                                                    echo '>' . $Thu_1;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Fri_1 != "") {
                                                    echo 'style="background-color:#ffcc99"';
                                                    echo '>' . $Fri_1;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sat_1 != "") {
                                                    echo 'style="background-color:#ccff99"';
                                                    echo '>' . $Sat_1;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sun_1 != "") {
                                                    echo 'style="background-color:#faef43"';
                                                    echo '>' . $Sun_1;
                                                } ?></td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">2</td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">3</td>
                    <td width="120" rowspan="2" <?php if ($Mon_2 != "") {
                                                    echo 'style="background-color:#aef422"';
                                                    echo '>' . $Mon_2;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Tue_2 != "") {
                                                    echo 'style="background-color:#535693"';
                                                    echo '>' . $Tue_2;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Wed_2 != "") {
                                                    echo 'style="background-color:#858095"';
                                                    echo '>' . $Wed_2;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Thu_2 != "") {
                                                    echo 'style="background-color:#fed483"';
                                                    echo '>' . $Thu_2;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Fri_2 != "") {
                                                    echo 'style="background-color:#afe463"';
                                                    echo '>' . $Fri_2;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sat_2 != "") {
                                                    echo 'style="background-color:#ccffe4"';
                                                    echo '>' . $Sat_2;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sun_2 != "") {
                                                    echo 'style="background-color:#fae876"';
                                                    echo '>' . $Sun_2;
                                                } ?></td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">4</td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">5</td>
                    <td width="120" rowspan="2" <?php if ($Mon_3 != "") {
                                                    echo 'style="background-color:#95ccff"';
                                                    echo '>' . $Mon_3;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Tue_3 != "") {
                                                    echo 'style="background-color:#8aff93"';
                                                    echo '>' . $Tue_3;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Wed_3 != "") {
                                                    echo 'style="background-color:#29efe2"';
                                                    echo '>' . $Wed_3;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Thu_3 != "") {
                                                    echo 'style="background-color:#a42683"';
                                                    echo '>' . $Thu_3;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Fri_3 != "") {
                                                    echo 'style="background-color:#fff399"';
                                                    echo '>' . $Fri_3;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sat_3 != "") {
                                                    echo 'style="background-color:#cabc59"';
                                                    echo '>' . $Sat_3;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sun_3 != "") {
                                                    echo 'style="background-color:#face43"';
                                                    echo '>' . $Sun_3;
                                                } ?></td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">6</td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">7</td>
                    <td width="120" rowspan="2" <?php if ($Mon_4 != "") {
                                                    echo 'style="background-color:#9acbff"';
                                                    echo '>' . $Mon_4;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Tue_4 != "") {
                                                    echo 'style="background-color:#8bbf93"';
                                                    echo '>' . $Tue_4;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Wed_4 != "") {
                                                    echo 'style="background-color:#294bb2"';
                                                    echo '>' . $Wed_4;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Thu_4 != "") {
                                                    echo 'style="background-color:#aedee3"';
                                                    echo '>' . $Thu_4;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Fri_4 != "") {
                                                    echo 'style="background-color:#ffcbb9"';
                                                    echo '>' . $Fri_4;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sat_4 != "") {
                                                    echo 'style="background-color:#ccfaa9"';
                                                    echo '>' . $Sat_4;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sun_4 != "") {
                                                    echo 'style="background-color:#fae543"';
                                                    echo '>' . $Sun_4;
                                                } ?></td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">8</td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">9</td>
                    <td width="120" rowspan="2" <?php if ($Mon_5 != "") {
                                                    echo 'style="background-color:#9aacff"';
                                                    echo '>' . $Mon_5;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Tue_5 != "") {
                                                    echo 'style="background-color:#8bcf93"';
                                                    echo '>' . $Tue_5;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Wed_5 != "") {
                                                    echo 'style="background-color:#2bdc72"';
                                                    echo '>' . $Wed_5;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Thu_5 != "") {
                                                    echo 'style="background-color:#aecc83"';
                                                    echo '>' . $Thu_5;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Fri_5 != "") {
                                                    echo 'style="background-color:#fffc99"';
                                                    echo '>' . $Fri_5;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sat_5 != "") {
                                                    echo 'style="background-color:#ccbfc9"';
                                                    echo '>' . $Sat_5;
                                                } ?></td>
                    <td width="120" rowspan="2" <?php if ($Sun_5 != "") {
                                                    echo 'style="background-color:#fabdc3"';
                                                    echo '>' . $Sun_5;
                                                } ?></td>
                </tr>
                <tr height="60" align="center">
                    <td width="30">10</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <div class="footer-content w">
                <div class="footer-message">
                    ○ 2022 吉大超星1.0
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!--学的课 -->
    <div class="isBlock" style="display: none;">
        <div class="banner"></div>
        <div class="Two-header">
            <div class="Two-content-box w">
                <div class="Two-content-header-tab w">
                    <ul>
                        <li>学习</li>
                        <li>教授</li>
                    </ul>
                </div>
                <!-- 课程内容区域 -->
                <div class="Two-content-bookshelf w clear">
                    <ul id="class_box_learn">
                    </ul>
                </div>
                <div class="Two-content-bookshelf w clear">
                    <a href="创建课程.php" class="book-message">创建课程</a>
                    <ul id="class_box">
                    </ul>
                </div>
                <!-- 隐藏表单 -->
                <form id="ClassForm" method="get" action="class.php" style="display:none">
                    <input type="hidden" name="course_name" id="course_name" value>
                    <input type="hidden" name="teacher_name" id="teacher_name" value>
                    <input type="hidden" name="userName" id="userName" value>
                </form>
            </div>
        </div>
        <!-- js脚本 -->
        <script>
            function submit(course_name, teacher_name, userName) {
                document.getElementById("course_name").value = course_name;
                document.getElementById("teacher_name").value = teacher_name;
                document.getElementById("userName").value = userName;
                document.getElementById("ClassForm").submit();
            }
            // 轮播图
            let focus = document.querySelector('.focus');
            // 轮播的每一张图片
            let focus_li = focus.querySelectorAll('li');
            // 轮播的圆点
            let circle = document.querySelector('.circle');
            // num计算每次切换的图片
            let num = 0;
            // 自动创建圆点
            for (let i = 0; i < focus_li.length; i++) {
                let span = document.createElement('span');
                circle.appendChild(span);
            }
            circle.children[num].className = 'circleColor';
            for (let i = 0; i < circle.children.length; i++) {
                circle.children[i].setAttribute('index', i);
                circle.children[i].onclick = function() {
                    let index = this.getAttribute('index');
                    for (let i = 0; i < circle.children.length; i++) {
                        circle.children[i].className = '';
                        focus_li[i].style.display = 'none';
                    }
                    this.className = 'circleColor';
                    focus_li[index].style.display = 'block';
                    num = index;
                }
            }
            // 声明一个标识符接收标识定时器
            let timer = null;
            actionInterVal();

            function actionInterVal() {
                timer = setInterval(function() {
                    num++;
                    if (num >= focus_li.length) {
                        num = 0;
                    }
                    for (let i = 0; i < focus_li.length; i++) {
                        focus_li[i].style.display = 'none';
                        circle.children[i].className = '';
                    }
                    focus_li[num].style.display = 'block';
                    circle.children[num].className = 'circleColor';
                }, 2000);
            }
            //  鼠标经过停止自动播放
            focus.onmouseover = function() {
                clearInterval(timer);
            };
            // 鼠标离开开启自动播放
            focus.onmouseout = function() {
                actionInterVal();
            };


            let index = 0;
            // 获取文字元素节点
            let topRightContent = document.querySelector('.top-right-content');
            let pAll = topRightContent.querySelectorAll('p');
            let topRightHeader = document.querySelector('.top-right-header');
            let spanMore = topRightHeader.getElementsByTagName('span');
            let hThree_span = [];
            // 获取顶部模块tab栏元素节点
            let headerContent = document.querySelector('.header-content');
            let HeaderLi = headerContent.querySelectorAll('li');
            let HeaderLiA = headerContent.querySelectorAll('a');
            HeaderLi[0].className = 'liBor';
            for (let i = 0; i < HeaderLi.length; i++) {
                HeaderLi[i].index = i;
                HeaderLi[i].onmouseover = function() {
                    index = this.index;

                    HeaderLiA[index].style.color = 'orange';
                };
                HeaderLi[i].onmouseout = function() {
                    index = this.index;
                    HeaderLiA[index].style.color = '#fff';
                };
                //设置点击显示边框
                HeaderLi[i].onclick = function() {
                    for (let i = 0; i < HeaderLi.length; i++) {
                        HeaderLi[i].className = '';
                    }
                    this.className = 'liBor';
                }
            }
            // 调用封装函数
            for (let i = 0; i < pAll.length; i++) {
                (function(i) {
                    fontColor({
                        node: pAll[i],
                        color: '#000',
                    });
                })(i);
            }
            // 更多 设置+
            fontColor({
                node: spanMore[0],
            });
            // 经过文字变化颜色
            function fontColor({
                node: node,
                outColor = "#000",
            }) {
                node.onmouseover = function() {
                    this.style.color = 'orange';
                    this.style.cursor = 'pointer'
                }
                node.onmouseout = function() {
                    node.style.color = outColor;
                }
            }

            // 模块2事件
            // tab切换
            let index_tab = 0;
            let TwoContentHeaderTab = document.getElementsByClassName('Two-content-header-tab')[0];
            let TwoTabLi = TwoContentHeaderTab.getElementsByTagName('li');
            let TwoContentBookshelf = document.getElementsByClassName('Two-content-bookshelf');
            TwoContentBookshelf[index_tab].style.display = 'block';
            TwoTabLi[0].className = 'liBor';
            var isToS = "<?php echo $isTeaorStu ?>";
            var course_cnt = "<?php echo $cnt ?>";
            var userType = "<?php echo $userType ?>";
            var userName = "<?php echo $userName ?>";
            <?php echo "var coursename=[],teachername=[];"; 
            foreach($course_name as $coursename)
            {
                echo "coursename.push('$coursename');";
            }
            foreach($teacher_name as $teachername)
            {
                echo "teachername.push('$teachername');";
            }
            ?>
            if (userType == "S") {
                for (let i = 0; i < course_cnt; i++) {
                    var div_child = '<li><div class="Two-imgs"><img src="./images/课程图标.png" alt=""></div><div class="Two-text"><a onclick="submit(\''+coursename[i]+'\',\''+teachername[i]+'\',\''+userName+'\')">'+coursename[i]+'</a><p>'+teachername[i]+'</p></div></li>';
                    var c = document.getElementById('class_box_learn');
                    c.innerHTML += div_child;
                };
            } else {
                for (let i = 0; i < course_cnt; i++) {
                    var div_child = '<li><div class="Two-imgs"><img src="./images/课程图标.png" alt=""></div><div class="Two-text"><a onclick="submit(\''+coursename[i]+'\',\''+teachername[i]+'\',\''+userName+'\')">'+coursename[i]+'</a><p>'+teachername[i]+'</p></div></li>';
                    var c = document.getElementById('class_box');
                    c.innerHTML += div_child;
                };
            }
            for (let i = 0; i < TwoTabLi.length; i++) {
                TwoTabLi[i].setAttribute('Data-index', i);
                TwoTabLi[i].onclick = function() {
                    index_tab = this.getAttribute('Data-index');
                    for (let i = 0; i < TwoTabLi.length; i++) {
                        TwoTabLi[i].className = '';
                        TwoContentBookshelf[i].style.display = 'none';
                    }
                    this.className = 'liBor';
                    TwoContentBookshelf[index_tab].style.display = 'block';
                }
            };
            // 获取分类模块
            let TwoHeaderItem = document.getElementsByClassName('Two-header-item');
            for (let i = 0; i < TwoHeaderItem.length; i++) {
                TwoHeaderItem[i].children[1].className = 'liBorDio';
                TwoHeaderItem[i].children[1].children[0].style.color = 'orange';

            }
            for (let i = 0; i < TwoHeaderItem.length; i++) {
                TwoHeaderItem[i].onclick = function(e) {
                    e = e || window.event;
                    if (e.target.getAttribute('index') == 'content') {
                        for (let j = 0; j < this.children.length; j++) {
                            this.children[j].className = '';
                            this.children[j].children[0].style.color = '#000';
                        }
                        e.target.parentNode.className = 'liBorDio';
                        e.target.style.color = 'orange';

                    }

                }
            }
            let isBlock = document.getElementsByClassName('isBlock');
            let headerTab = document.getElementsByClassName('header-tab')[0];
            let headerTab_li = headerTab.querySelectorAll('li');
            let index_header_tab = 0;
            for (let i = 0; i < headerTab_li.length; i++) {
                headerTab_li[i].id = i;
                headerTab_li[i].addEventListener('click', function() {
                    window.scroll(0, 0);
                    index_header_tab = this.index;
                    for (let i = 0; i < isBlock.length; i++) {
                        isBlock[i].style.display = 'none';
                    }
                    isBlock[index_header_tab].style.display = 'block';
                })
            }
            let ULList = document.getElementsByClassName('ULList');
            for (let i = 0; i < ULList.length; i++) {
                ULList[i].onclick = function(e) {
                    e = e || window.event;
                    if (e.target.id != 'title') {
                        let li = e.target.parentNode.children;
                        for (let i = 0; i < li.length; i++) {
                            li[i].className = '';
                        }
                        e.target.className = 'ULListLiStyle';
                    }
                }
            }

            // 返回顶部
            //1. 获取元素
            let recommend = document.querySelector('.recommend ');
            console.log(recommend);
            var recommend_banner = recommend.offsetTop;
            let TopBtn = document.querySelector('.topBtn');
            document.addEventListener('scroll', function() {

                if (window.pageYOffset >= recommend_banner) {
                    TopBtn.style.display = 'block';
                } else {
                    TopBtn.style.display = 'none';
                }
            })
            TopBtn.addEventListener('click', function() {
                animate(window, 0);
            });

            function animate(obj, target, callback) {

                clearInterval(obj.timer);
                obj.timer = setInterval(function() {
                    var step = (target - window.pageYOffset) / 10;
                    step = step > 0 ? Math.ceil(step) : Math.floor(step);
                    if (window.pageYOffset == target) {
                        clearInterval(obj.timer);
                        callback && callback();
                    }
                    window.scroll(0, window.pageYOffset + step);
                }, 5);
            }
            TopBtn.onmousedown = function() {
                this.style.background = '-webkit-linear-gradient(45deg, blue, yellow)';
            }
            TopBtn.onmouseup = function() {
                this.style.background = '-webkit-linear-gradient(45deg, skyblue, green)';
            }
        </script>
</body>

</html>
