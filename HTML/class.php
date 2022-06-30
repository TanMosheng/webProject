<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/home.css">
    <title>课程界面</title>
</head>
<?php
session_start();
$name = $_SESSION['name']; //用户姓名
$userType = $_SESSION['userType']; //用户是老师还是学生
$userName = $_SESSION['userName']; //学工号
$_SESSION['name'] = $name;
$_SESSION['userName'] = $userName;
$_SESSION['userType'] = $userType;
$coursename = $_GET['course_name'];
$teachername = $_GET['teacher_name'];
//获取数据库信息
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
$sql_select_courseid = "select id from courses where name = '$coursename'";
$result = mysqli_query($conn, $sql_select_courseid);
$row = mysqli_fetch_assoc($result);
$course_id = $row['id'];
$sql_select_studentid = "select id from users where userName = '$userName'";
$result = mysqli_query($conn, $sql_select_studentid);
$row = mysqli_fetch_assoc($result);
$user_id = $row['id'];
?>

<body>
    <div class="mask"></div>
    <iframe src="./login.html" id="login-box" scrolling="no" frameborder="0"></iframe>
    <div class="topBtn" style="display:none;">返回顶部</div>
    <div class="header">
        <!-- 顶部内容 -->
        <div class="header-content w">
            <!-- logo -->
            <div class="logo"><img src="./images/logotwo.png" onclick="window.history.back();"></div>
            <!-- 选项栏 -->
            <ul class="header-tab">
                <li>
                    <a href="javascript:;">首页</a>
                </li>
                <li>
                    <a href="sign.php">签到</a>
                </li>
                <li>
                    <a href="uploadfile.php">上传文件</a>
                </li>
                <li>
                    <a href="download.php">下载文件</a>
                </li>
                <li>
                    <a href="work.php">作业</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="isBlock" style="display: block;">
        <!-- 内容区域 -->
        <div class="prefecture-author">
            <!-- 头部 -->
            <div class="pre-aut-header w">
                <h2><?php echo $coursename; ?></h2>
                <h3><?php echo $teachername; ?></h3>
                <div class="aut-btn" onclick="window.location.href='./添加学生.php'";>添加学生</div>
            </div>
            <div class="pre-aut-content w clear">
                <div class="pre-aut-content-left">
                    <div class="pre-aut-left-List-box">
                        <div class="pre-aut-left-title">
                            章节一
                        </div>
                        <div class="pre-aut-List-left-item">
                            任务点1
                        </div>
                        <div class="pre-aut-List-left-item">任务点2</div>
                    </div>
                    <div class="pre-aut-left-List-box">
                        <div class="pre-aut-left-title">章节二</div>
                        <div class="pre-aut-List-left-item">任务点1</div>
                        <div class="pre-aut-List-left-item">任务点2</div>
                    </div>
                    <div class="pre-aut-left-List-box">
                        <div class="pre-aut-left-title">章节三</div>
                        <div class="pre-aut-List-left-item">任务点1</div>
                        <div class="pre-aut-List-left-item">任务点2</div>
                        <div class="pre-aut-List-left-item">任务点3</div>
                    </div>
                </div>
                <div class="pre-aut-content-right">课程简介</div>
            </div>
        </div>
    </div>
    <script>
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
    </script>
</body>

</html>
<?php
$_SESSION['course_id'] = $course_id;
$_SESSION['user_id'] = $user_id;
?>
