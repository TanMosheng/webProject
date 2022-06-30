<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>作业</title>
</head>
<style>
    :root {
        font-size: 16px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
        background: url(./images/sign.jpg);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .in {
        background-color: #fff;
        border: 1px solid white;
        padding: 0.9rem 0;
        margin: 0.5rem 0;
        width: 250px;
        border-radius: 10px;
        text-align: center;
        text-align-last: center;
        font-size: 16px;
    }

    .link {
        color: rgb(68 125 225);
        font-size: 0.9rem;
        margin: 1rem 0 0 0;
        text-decoration: none;
    }

    .link:hover {
        color: rgb(63, 81, 244);
    }

    .W {
        position: absolute;
        left: 40%;
        width: 400px;
        font-size: 16px;
        display: inline-block;
        text-align: left;
        margin: auto;
        border-radius: 20px;
        padding-right: 5px;
        font-weight: bold;
        background: #cad9e9;
        filter: alpha(Opacity=80);
        -moz-opacity: 0.6;
        opacity: 0.5;
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
        width: 250px;
        height: 150px;
        border-radius: 10px;
        text-align: center;
        text-align-last: center;
        font-size: 20px;
    }

    .h1 {
        margin-left: 50px;
    }

    .int:focus {
        outline: none;
        border: 1px solid orange;
    }

    .btn {
        background-color: greenyellow;
        background-image: linear-gradient(to right, rgb(223, 224, 224), rgb(152, 155, 155) 65%);
        border-radius: 5px;
        border: 1px solid skyblue;
        color: #222831;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: bold;
        margin-left: 150px;
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

    .workBtn {
        background-color: greenyellow;
        background-image: linear-gradient(to right, rgb(223, 224, 224), rgb(152, 155, 155) 65%);
        border-radius: 5px;
        border: 1px solid skyblue;
        color: #222831;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: bold;
        margin-left: 150px;
        left: 300px;
        letter-spacing: 0.1rem;
        left: 50%;
        position: inherit;
        padding: 0.4rem 1.5rem;
        /* 过渡的时间还有样式 */
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    .workBtn:hover {
        transform: scale(0.95);
    }

    label {
        font-size: 16px;
        width: 80px;
        height: 2em;
        display: inline-block;
        text-align: right;
        padding-right: 5px;
        font-weight: bold;
    }

    .workTitle{
        font-size:25px;
    }
</style>
<?php
function getUserName($user_id)
{
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
    $sql_select_userName = "select name from users where id = '$user_id'";
    $result = mysqli_query($conn, $sql_select_userName);
    $row = mysqli_fetch_assoc($result);
    return $row['name'];
}

function isTea($user_id, $course_id)
{
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
    $sql_select_name = "select name from users where id = '$user_id'";
    $result = mysqli_query($conn, $sql_select_name);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $sql_select_type = "select userType from " . $name . " where course_id = '$course_id'";
    $result = mysqli_query($conn, $sql_select_type);

    $row = mysqli_fetch_assoc($result);
    if ($row['userType'] == 'T') {
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function isStu($user_id, $course_id)
{
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
    $sql_select_name = "select name from users where id = '$user_id'";
    $result = mysqli_query($conn, $sql_select_name);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $sql_select_type = "select userType from " . $name . " where course_id = '$course_id'";
    $result = mysqli_query($conn, $sql_select_type);
    $row = mysqli_fetch_assoc($result);
    if ($row['userType'] == 'S') {
        return true;
    } else {
        return false;
    }
    $conn->close();
}

$user_id = $_SESSION['user_id'];
$course_id = $_SESSION['course_id'];
?>

<body>
    <div class="W">
        <h1 onclick="window.location.href='./home.php'";>&emsp;&emsp;&emsp;&emsp;&emsp;作业
        </h1>

        <form id="workForm" method="get" action=<?php
                                                if (isTea($user_id, $course_id)) {
                                                    echo '"pubWork.php"';
                                                } else if (isStu($user_id, $course_id)) {
                                                    echo '"doWork.php">' .
                                                        '<div><input type="hidden" name="puber_id" id="puber"/></div';
                                                } ?>>
            <div>
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
            </div>
            <div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            </div>
            <div>&emsp;
                <label>作业标题：</label>
                <input class="in" type="input" name="title" id="title" required="">
            </div>
            <div>
                <input type="hidden" name="pubTime" id="pubTime">
            </div>
            <div>&emsp;
                <label>截止时间：</label>
                <input class="in" type="datetime-local" name="endTime" id="endTime" required="">
            </div>
            <div>&emsp;
                <label>作业描述：</label>
                <input class="int" type="input" name="desc" id="desc" placeholder="选填">
            </div>
            <div>
                <input class="btn" type="submit" value="发布">
            </div>
        </form>

        <div id="workList" class="workList">
        </div>

        <script type="text/javascript">
            var workListHTML = "",
                workInfoList = [];

            function getNowDateTime() {
                var date = new Date();
                var YYYY = date.getFullYear(),
                    MM = date.getMonth() + 1,
                    DD = date.getDate(),
                    hh = date.getHours(),
                    mm = date.getMinutes(),
                    ss = date.getSeconds();

                YYYY = "" + YYYY;
                MM = (MM < 10 ? "0" : "") + MM;
                DD = (DD < 10 ? "0" : "") + DD;
                hh = (hh < 10 ? "0" : "") + hh;
                mm = (mm < 10 ? "0" : "") + mm;
                ss = (ss < 10 ? "0" : "") + ss;

                return YYYY + "-" + MM + "-" + DD + "T" + hh + ":" + mm + ":" + ss;
            }

            <?php if (isTea($user_id, $course_id)) {
                echo <<<_PUB_WORK_SCRIPT_END
    setInterval( function() {
        console.log("setting time");
        document.getElementById("pubTime").value =getNowDateTime();
    },1000);

    function showWorkerDetail(index){
        var workerDetail=document.getElementById("workerDetail_"+index);
        if(workerDetail.innerHTML!=""){
            workerDetail.innerHTML="";
            return;
        }
        var str="";
        workInfoList[index].er.forEach(function(state){
            str+='<div class="stuWorkHref">'+ state+'</div>';
        });
        workerDetail.innerHTML=str;
    }

_PUB_WORK_SCRIPT_END;
                $workDir = opendir('file/' . $course_id . '/' . $user_id . '/.works');
                while ($work = readdir($workDir)) {
                    if ($work == '.' || $work == '..') {
                        continue;
                    }
                    $workFileRoad = 'file/' . $course_id . '/' . $user_id . '/' . '.works/' . $work;
                    $pubTime = strtok($work, ' ');
                    $endTime = strtok(' ');
                    $workTitle = strtok(' ');
                    $workDesc = fread(fopen($workFileRoad, 'r'), filesize($workFileRoad));

                    echo <<<_WORK_INFO_END
    workInfoList.push({
        pubTime:"$pubTime",
        endTime:"$endTime",
        title:"$workTitle",
        desc:"$workDesc",
        er:[""
_WORK_INFO_END;
                    $allUsers = scandir('file/' . $course_id);
                    foreach ($allUsers as $user) {
                        if ($user == '.' || $user == '..' || $user == 'share') {
                            continue;
                        }
                        if (isStu($user, $course_id)) {
                            $stuWorkFileRoad = 'file/' . $course_id . '/' . $user . '/' . '.works/' . $work;
                            $workState = '';
                            if (file_exists($stuWorkFileRoad)) {
                                $workState = fread(fopen($stuWorkFileRoad, 'r'), filesize($stuWorkFileRoad));
                            }
                            $stuName = getUserName($user);
                            if ($workState == '') {
                                $stuName = $stuName . '未提交';
                            }
                            echo <<<_STU_WORK_LIST
,
'<a href="$workState">$stuName</a>'
_STU_WORK_LIST;
                        }
                    }
                    echo <<<_NEWLINE
]});

_NEWLINE;
                }
                echo <<<_SHOW_WORK_INFO_JS_END

    workInfoList.sort(function(a,b){return a.pubTime>b.pubTime?-1:1});
    workInfoList.forEach(function(work,index){
        workListHTML+='<br>';
        workListHTML+='<div class="workInfoCube" onclick="showWorkerDetail('+index+')">';
        workListHTML+='<div class="workTitle">&emsp;&emsp;&emsp;'+work.title+'</div>';
        workListHTML+='<div class="workTime">&emsp;&emsp;&emsp;发布时间：'+work.pubTime.replace(/_/g,":").replace("T"," ")+'</div>';
        workListHTML+='<div class="workTime">&emsp;&emsp;&emsp;结束时间：'+work.endTime.replace(/_/g,":").replace("T"," ")+'</div>';
        workListHTML+='<div class="workDesc">&emsp;&emsp;&emsp;作业描述：'+work.desc+'</div>';
        workListHTML+='<div class="workerDetail" id="workerDetail_'+index+'"></div>';
        workListHTML+='</div>';
        workListHTML+='<br>';
    });
    document.getElementById("workList").innerHTML = workListHTML;
</script>
_SHOW_WORK_INFO_JS_END;
            } ?><?php if (isStu($user_id, $course_id)) {
                    echo <<<_STU_INIT_JS_END
    document.getElementById("workForm").style.display="none";
    function submitWork(work){

        document.getElementById("title").value=work.title;
        document.getElementById("pubTime").value=work.pubTime;
        document.getElementById("endTime").type="input";
        document.getElementById("endTime").value=work.endTime;
        document.getElementById("puber").value=work.puber;
        document.getElementById("desc").value=work.desc;

        document.getElementById("workForm").submit();
    }

_STU_INIT_JS_END;

                    $myWorkFileRoad = 'file/' . $course_id . '/' . $user_id . '/' . '.works';

                    $allUsers = scandir('file/' . $course_id);
                    foreach ($allUsers as $user) {
                        if ($user == '.' || $user == '..' || $user == 'share') {
                            continue;
                        }
                        if (isTea($user, $course_id)) {
                            $workDir = opendir('file/' . $course_id . '/' . $user . '/.works');
                            while ($work = readdir($workDir)) {
                                if ($work == '.' || $work == '..') {
                                    continue;
                                }

                                $workFileRoad = 'file/' . $course_id . '/' .
                                    $user . '/'
                                    . '.works' . '/'
                                    . $work;
                                $pubTime = strtok($work, ' ');
                                $endTime = strtok(' ');
                                $workTitle = strtok(' ');
                                $workDesc = fread(fopen($workFileRoad, 'r'), filesize($workFileRoad));
                                $workState = '';
                                if (file_exists($myWorkFileRoad . '/' . $work)) {
                                    $workState = fread(fopen($myWorkFileRoad . '/' . $work, 'r'), filesize($myWorkFileRoad . '/' . $work));
                                }
                                $puber = getUserName($user);
                                echo <<<_work_INFO_JS_OBJ
    workInfoList.push({
        pubTime:"$pubTime",
        endTime:"$endTime",
        puber:"$puber",
        title:"$workTitle",
        desc:"$workDesc",
        state:"$workState"
    });

_work_INFO_JS_OBJ;
                            }
                        }
                    }
                    echo <<<_SHOW_STU_WORK_LIST_JS_END
    workInfoList.sort(function(a,b){return a.pubTime>b.pubTime?-1:1});
    workInfoList.forEach(function(work,index){
        workListHTML+='<br>';
        workListHTML+='<div class="workInfoCube">';
        workListHTML+='<div class="workTitle">&emsp;&emsp;&emsp;&emsp;&emsp;'+work.title+'</div>';
        workListHTML+='<div class="workState"><a href="'+work.state+'" class="link">&emsp;&emsp;&emsp;下载已提交的作业</a></div>';
        workListHTML+='<div class="workPuber">&emsp;&emsp;&emsp;发布人：'+work.puber+'</div>';
        workListHTML+='<div class="workTime">&emsp;&emsp;&emsp;发布时间：'+work.pubTime.replace(/_/g,":").replace("T"," ")+'</div>';
        workListHTML+='<div class="workTime">&emsp;&emsp;&emsp;结束时间：'+work.endTime.replace(/_/g,":").replace("T"," ")+'</div>';
        workListHTML+='<div class="workDesc">&emsp;&emsp;&emsp;作业描述：'+work.desc+'</div>';
        workListHTML+='<button type="button" class="workBtn" '
            +('onclick="submitWork(workInfoList['+index+'])">')+
            (work.state ? '重新' : '' )+'提交</button>';
        workListHTML+='</div>';
        workListHTML+='<br>';
    });
    document.getElementById("workList").innerHTML = workListHTML;
_SHOW_STU_WORK_LIST_JS_END;
                }
                ?>
        </script>
    </div>
</body>

</html>
