<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <title>做作业</title>
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
</style>
<?php
$user_id = $_GET["user_id"];
$course_id = $_GET["course_id"];
$puber_id = $_GET["puber_id"];

$title = $_GET["title"];
$pubTime = $_GET["pubTime"];
$endTime = $_GET["endTime"];
$desc = $_GET["desc"];
?>

<body>
    <div class="W">
        <form method="post" action="subWork.php" enctype="multipart/form-data">
            <div>
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
            </div>
            <div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            </div>
            <div>&emsp;
                <label>标题：</label>
                <input class="in" type="input" name="title" id="title" readonly="true" value="<?php echo $title; ?>">
            </div>
            <div>&emsp;
                <label>发布人：</label>
                <input class="in" type="input" name="puber_id" id="puber_id" readonly="true" value="<?php echo $puber_id; ?>">
            </div>
            <div>
                <input type="hidden" name="pubTime" id="pubTime" readonly="true" value="<?php echo $pubTime; ?>">
            </div>
            <div>
                <input type="hidden" name="endTime" id="endTime" readonly="true" value="<?php echo $endTime; ?>">
            </div>
            <div>&emsp;
                <label>描述：</label>
                <input class="in" type="input" name="desc" id="desc" readonly="true" value="<?php echo $desc; ?>">
            </div>
            <div>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input class="in" type="file" name="workFile" id="workFile">
            </div>
            <div>
                <input class="btn" type="submit" value="提交">
            </div>
        </form>
    </div>
</body>
