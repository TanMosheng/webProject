<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>签到页面</title>
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

    .W {
        position:absolute;
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

    .signBtn {
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

    .signBtn:hover {
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

    .signTitle {
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
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
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
    $sql_select_type = "select userType from " . $name . "  where course_id = '$course_id'";
    $result = mysqli_query($conn, $sql_select_type);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
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
        <h1 onclick="window.history.back();">
        &emsp;&emsp;&emsp;&emsp;&emsp;签到
        </h1>

        <form id="signForm" method="get" action="aSignDetail.php">
            <div>
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
            </div>
            <div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            </div>
            <div>&emsp;
                <label>
                    签到标题：
                </label>
                <input class="in" type="input" name="title" id="title" required="">
            </div>
            <div>
                <input type="hidden" name="pubTime" id="pubTime">
            </div>
            <div>&emsp;
                <label>
                    截止时间：
                </label>
                <input class="in" type="datetime-local" name="endTime" id="endTime" required="">
            </div>
            <div>&emsp;
                <label>
                    签到描述：
                </label>
                <input class="int" type="input" name="desc" id="desc" placeholder="选填">
            </div>
            <div>
                <input class="btn" type="submit" value="发布">
            </div>
        </form>

        <div id="signList" class="signList">
        </div>

        <script type="text/javascript">
            var signListHTML = "",
                signInfoList = [];

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
                echo <<<_PUB_SIGN_SCRIPT_END
    setInterval( function() {
        console.log("setting time");
        document.getElementById("pubTime").value =getNowDateTime();
    },1000);

    function showSignerDetail(index){
        var str="";
        signInfoList[index].er.forEach(function(state){
            str+=state+"\\n";
        });
        alert(str);
    }

_PUB_SIGN_SCRIPT_END;
                $signDir = opendir('file/' . $course_id . '/' . $user_id . '/.signs');
                while ($sign = readdir($signDir)) {
                    if ($sign == '.' || $sign == '..') {
                        continue;
                    }
                    $signFileRoad = 'file/' . $course_id . '/' . $user_id . '/' . '.signs/' . $sign;
                    $pubTime = strtok($sign, ' ');
                    $endTime = strtok(' ');
                    $signTitle = strtok(' ');
                    $signDesc = fread(fopen($signFileRoad, 'r'), filesize($signFileRoad));

                    echo <<<_SIGN_INFO_END
    signInfoList.push({
        pubTime:"$pubTime",
        endTime:"$endTime",
        title:"$signTitle",
        desc:"$signDesc",
        er:["学生姓名\\t签到状态"
_SIGN_INFO_END;
                    $allUsers = scandir('file/' . $course_id);
                    foreach ($allUsers as $user) {
                        if ($user == '.' || $user == '..' || $user == 'share') {
                            continue;
                        }
                        if (isStu($user, $course_id)) {
                            $stuSignFileRoad = 'file/' . $course_id . '/' . $user . '/' . '.signs/' . $sign;
                            $signState = '未签到';
                            if (file_exists($stuSignFileRoad)) {
                                $signState = fread(fopen($stuSignFileRoad, 'r'), filesize($stuSignFileRoad));
                            }
                            echo ',"' . getUserName($user) . '\\t' . $signState . '"';
                        }
                    }
                    echo <<<_NEWLINE
]});

_NEWLINE;
                }
                echo <<<_SHOW_SIGN_INFO_JS_END

    signInfoList.sort(function(a,b){return a.pubTime>b.pubTime?-1:1});
    signInfoList.forEach(function(sign,index){
        signListHTML+='<br>';
        signListHTML+='<div class="signInfoCube" onclick="showSignerDetail('+index+')">';
        signListHTML+='<div class="signTitle">&emsp;&emsp;&emsp;签到标题：'+sign.title+'</div>';
        signListHTML+='<div class="signTime">&emsp;&emsp;&emsp;发布时间：'+sign.pubTime.replace(/_/g,":").replace("T"," ")+'</div>';
        signListHTML+='<div class="signTime">&emsp;&emsp;&emsp;结束时间：'+sign.endTime.replace(/_/g,":").replace("T"," ")+'</div>';
        signListHTML+='<div class="signDesc">&emsp;&emsp;&emsp;签到内容：'+sign.desc+'</div>';
        signListHTML+='</div>';
        signListHTML+='<br>';
    });
    document.getElementById("signList").innerHTML = signListHTML;
</script>
_SHOW_SIGN_INFO_JS_END;
            } ?><?php if (isStu($user_id, $course_id)) {
                echo <<<_STU_INIT_JS_END
    document.getElementById("signForm").style.display="none";
    function submitSign(signTitle,pubTime,endTime){

        document.getElementById("title").value=signTitle;
        document.getElementById("pubTime").value=pubTime;
        document.getElementById("endTime").type="text";
        document.getElementById("endTime").value=endTime;
        document.getElementById("desc").value=endTime<getNowDateTime()?"过期后签到":"签到成功";

        document.getElementById("signForm").submit();
    }

_STU_INIT_JS_END;

                $mySignFileRoad = 'file/' . $course_id . '/' . $user_id . '/' . '.signs';

                $allUsers = scandir('file/' . $course_id);
                foreach ($allUsers as $user) {
                    if ($user == '.' || $user == '..' || $user == 'share') {
                        continue;
                    }
                    if (isTea($user, $course_id)) {
                        $signDir = opendir('file/' . $course_id . '/' . $user . '/.signs');
                        while ($sign = readdir($signDir)) {
                            if ($sign == '.' || $sign == '..') {
                                continue;
                            }

                            $signFileRoad = 'file/' . $course_id . '/' .
                                $user . '/'
                                . '.signs' . '/'
                                . $sign;
                            $pubTime = strtok($sign, ' ');
                            $endTime = strtok(' ');
                            $signTitle = strtok(' ');
                            $signDesc = fread(fopen($signFileRoad, 'r'), filesize($signFileRoad));
                            $signState = '';
                            if (file_exists($mySignFileRoad . '/' . $sign)) {
                                $signState = fread(fopen($mySignFileRoad . '/' . $sign, 'r'), filesize($mySignFileRoad . '/' . $sign));
                            }
                            $puber = getUserName($user);
                            echo <<<_SIGN_INFO_JS_OBJ
    signInfoList.push({
        pubTime:"$pubTime",
        endTime:"$endTime",
        puber:"$puber",
        title:"$signTitle",
        desc:"$signDesc",
        state:"$signState"
    });

_SIGN_INFO_JS_OBJ;
                        }
                    }
                }
                echo <<<_SHOW_STU_SIGN_LIST_JS_END
    signInfoList.sort(function(a,b){return a.pubTime>b.pubTime?-1:1});
    signInfoList.forEach(function(sign){
        signListHTML+='<br>';
        signListHTML+='<div class="signInfoCube">';
        signListHTML+='<div class="signTitle">&emsp;&emsp;&emsp;&emsp;&emsp;'+sign.title+'</div>';
        signListHTML+='<div class="signState">&emsp;&emsp;&emsp;'+sign.state+'</div>';
        signListHTML+='<div class="signPuber">&emsp;&emsp;&emsp;发布人：'+sign.puber+'</div>';
        signListHTML+='<div class="signTime">&emsp;&emsp;&emsp;发布时间：'+sign.pubTime.replace(/_/g,":").replace("T"," ")+'</div>';
        signListHTML+='<div class="signTime">&emsp;&emsp;&emsp;结束时间：'+sign.endTime.replace(/_/g,":").replace("T"," ")+'</div>';
        signListHTML+='<div class="signDesc">&emsp;&emsp;&emsp;签到内容：'+sign.desc+'</div>';
        signListHTML+='<button type="button" class="signBtn" '+
            (sign.state ? '>已' : 
                        ('onclick="'+"submitSign("+"'"+sign.title+"','"+sign.pubTime+"','"+sign.endTime+"'"+');">')
            )+'签到</button>';
        signListHTML+='</div>';
        signListHTML+='<br>';
    });
    document.getElementById("signList").innerHTML = signListHTML;
_SHOW_STU_SIGN_LIST_JS_END;
            }
            ?>
        </script>
    </div>
</body>

</html>
