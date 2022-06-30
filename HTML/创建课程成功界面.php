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
            color:  rgb(80, 146, 245);
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
        <h4>恭喜您，课程创建成功!课程<?php echo $_GET['coursename']; ?>的课程编号为<?php echo $_GET['courseid']; ?></h4><br>
        <h4>扫描二维码可以获得更多课程信息</h4><br>
        <?php
        $courseid = $_GET['courseid'];
        $coursename = $_GET['coursename'];
        $teachername = $_GET['teachername'];
        $classtime = $_GET['classtime'];
        $classday = $_GET['classday'];
        if($coursename == '微积分')
        {
            $introduction = '微积分是高等数学中研究函数的微分、积分以及有关概念和应用的数学分支。它是数学的一个基础学科。内容主要包括极限、微分学、积分学及其应用。微分学包括求导数的运算，是一套关于变化率的理论。它使得函数、速度、加速度和曲线的斜率等均可用一套通用的符号进行讨论。积分学，包括求积分的运算，为定义和计算面积、体积等提供一套通用的方法。';
        }
        else if ($coursename == '概率论')
        {
            $introduction = '概率论是研究随机现象数量规律的数学分支，是一门研究事情发生的可能性的学问。随机现象是事前不可预言的现象，即在相同条件下重复进行试验，每次结果未必相同，或知道事物过去的状况，但未来的发展却不能完全肯定。事件的概率是衡量该事件发生的可能性的量度。虽然在一次随机试验中某个事件的发生是带有偶然性的，但那些可在相同条件下大量重复的随机试验却往往呈现出明显的数量规律。';
        }
        else if ($coursename == '程序设计基础')
        {
            $introduction = '程序设计基础是一门理论与实践密切相关、以培养学生程序设计能力为目标的课程，它的任务是培养学生应用高级程序设计语言求解问题的基本能力。通过该课程使学生了解高级程序设计语言的结构，掌握基本的应用计算机求解问题的思维方法以及基本的程序设计过程和方法。从提出问题、选定数据表示方式、设计算法，到编写代码、调试和测试程序，以及分析结果的过程中，培养学生抽象问题、设计与选择解决方案的能力，以及用程序设计语言实现方案并进行测试和评价的能力。';
        }
        else if ($coursename == '数据结构')
        {
            $introduction = '数据结构是研究数据的关系学科，主要介绍和讨论数据基于问题的逻辑结构、基于内存物理存储结构，和基于结构的数据各种操作的实现及分析。数据结构的不仅是程序设计的基础，也是设计和实现编译程序、操作系统、数据系统及其它系统程序以及各种大型应用程序的重要基础。课程介绍几种逻辑结构的数据，分析它们的特点，以及在计算机中的存储方法，和常规操作的实现。';
        }
        else if ($coursename == '算法分析与设计')
        {
            $introduction ='算法分析与设计通过对一些基本算法的分析与设计，引导学生掌握组合算法设计的基本技术，掌握算法分析的基本方法，了解计算复杂性理论和基本概念及其应用。';
        }
        else if ($coursename == '计算机组成原理')
        {
            $introduction = '计算机组成原理是计算机专业本科教学中一门重要的技术基础课程，旨在使学生掌握计算机硬件各子系统的组成原理及实现技术，建立计算机系统的整体概念。';
        }
        else if ($coursename == '基础物理')
        {
            $introduction = '基础物理是研究物质的基本结构、相互作用和物质最基本最普遍的运动形式及其转化规律的学科，不仅向学生们介绍物理学的基本原理只是、基本思想方法，同时培养学生的探索创新精神。';
        }
        else if ($coursename == '大学体育')
        {
            $introduction = '大学体育是大学生以身体练习为主要手段，通过合理的体育教育和科学的体育锻炼过程，达到增强体质、增进健康和提高体育素养为主要目标的课程。在教导学生发展自身体能的同时，努力学习并掌握一至两项体育技能，为今后的体育锻炼打下基础，养成终身体育习惯，使体育成为生活中不可或缺的一部分。';
        }
        else if ($coursename == '离散数学')
        {
            $introduction = '离散数学是一门随着计算机科学的发展而形成的一门工具性学科。它以离散量的结构和相互关系作为主要研究对象，充分描述了计算机离散型的特点。在奠定计算机科学必备的数学知识外，还培养了学生逻辑思维能力，对学生日后专业知识的学习打下了坚实的基础';
        }
        $setcode = "课程编号：" .$courseid. "\n课程名称：" .$coursename. "\n授课教师：" .$teachername. "\n上课时间：" .$classday. " " .$classtime. "\n课程介绍：" .$introduction;
        include_once './phpqrcode/phpqrcode.php';
        $value = $setcode;                    //二维码内容

        $errorCorrectionLevel = 'L';    //容错级别 
        $matrixPointSize = 5;            //生成图片大小  

        //生成二维码图片
        $filename = 'qrcode/' . $courseid . '.png';
        QRcode::png($value, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

        $QR = $filename;                //已经生成的原始二维码图片文件  


        $QR = imagecreatefromstring(file_get_contents($QR));
        echo <<< imgend
        <img src="$filename" width="240vh" height="240vh">
        imgend;
        ?>
        <br>
        <a href="./home.php" class="link">点击返回主页</a>
    </div>

</body>

</html>
