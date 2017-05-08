<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 23:42
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        $path = "../";
        $userlogin;
        if(isset($_SESSION['user'])){
            $userlogin = $_SESSION['user'];
        }
        function minDiff($strTime1,$strTime2)
        {
            if($strTime1>=$strTime2){
                return $strTime1-$strTime2;
            }
            else{
                return (60-$strTime2)+$strTime1;
            }
        }
        function TimeDiff($strTime1,$strTime2)
        {
            return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
        }
        function DateTimeDiff($strDateTime1,$strDateTime2)
        {
            return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
        }
        function echo_date_time($com){
            $dt = DateTimeDiff($com,date("Y-m-d H:i:s",strtotime('+5 hours')))/24;
            if($dt<1){
                $dt = TimeDiff(date("H:i",strtotime($com)),date("H:i",strtotime('+5 hours')));
                if($dt<1){
                    $dt = minDiff(date("i"),date("i",strtotime($com)));
                    if($dt<1){
                        return "เมื่อสักครู่";
                    }
                    else{
                        $dt = floor($dt);
                        return $dt." นาที";
                    }
                }
                else{
                    $dt = floor($dt);
                    return $dt." ชั่วโมง";
                }
            }
            else{
                if($dt<30){
                    $dt = floor($dt);
                    return $dt." วัน";
                }
                else{
                    $dt = floor($dt/30);
                    return $dt." เดือน";
                }
            }
        }
    ?>
    <title>NewsFeed | Pages | Contact</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/font.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?=$path?>css/style.css">
    <!--[if lt IE 9]>
    <script src="<?=$path?>js/html5shiv.min.js"></script>
    <script src="<?=$path?>js/respond.min.js"></script>
    <![endif]-->

    <script src="<?=$path?>js/jquery.min.js"></script>
    <script src="<?=$path?>js/wow.min.js"></script>
    <script src="<?=$path?>js/bootstrap.min.js"></script>
    <script src="<?=$path?>js/slick.min.js"></script>
    <script src="<?=$path?>js/jquery.li-scroller.1.0.js"></script>
    <script src="<?=$path?>js/jquery.newsTicker.min.js"></script>
    <script src="<?=$path?>js/jquery.fancybox.pack.js"></script>
    <script src="<?=$path?>js/custom.js"></script>
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container" style="padding-top: 20px">
    <header id="header">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <div class="header_top_left">


                    </div>
                    <div class="header_top_right">
                        <p>

                        </p>

                    </div>
                </div>
            </div>

        </div>
    </header>
    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="../index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                    <li><a href="../view/about.php">เกี่ยวกับเรา</a></li>
                    <li class="dropdown"><a href="#">หน่วยงานต่างๆ</a>
                        <ul class="dropdown-menu">
                            <li><a href="http://eng.kps.ku.ac.th/v3/" target="_blank">คณะวิศวกรรมศาสตร์ กพส.</a></li>
                            <li><a href="http://www.lib.kps.ku.ac.th/g4/" target="_blank">ห้องสมุด มก.กพส.</a></li>
                            <li><a href="http://www.lib.ku.ac.th/" target="_blank">ห้องสมุด มก.บางเขน</a></li>
                            <li><a href="http://esdpsd.psd.kps.ku.ac.th/" target="_blank">กองบริหารวิชาการและนิสิต</a></li>

                        </ul>

                    </li>
                    <li>
                        <form class="navbar-form navbar-left" method="post" action="../index.php">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" id="search" name="search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
                <?php
                    if(isset($_SESSION['user'])) {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$userlogin?></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?=$path?>controller/profile.php">Profile</a></li>
                                    <li><a href="<?=$path?>controller/home.php?logout=1">Log out</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                        if($userlogin->getTypeUser()=="ADMIN")
                        {
                            ?>
                            <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการรายวิชา</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?=$path?>controller/editSubject.php">แก้ไขรายวิชา</a></li>
                                    <li><a href="<?=$path?>controller/insertSubject.php">เพิ่มรายวิชา</a></li>
                                </ul>
                            </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการผู้ใช้</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?=$path?>controller/edituser.php">แก้ไขข้อมูลผู้ใช้</a></li>
                                        <li><a href="<?=$path?>controller/adduser.php">เพิ่มผู้ใช้</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <?php
                        }
                    }
                    else{
                        ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" data-target="#myModalRegistor" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a></li>
                                <li><a href="#" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>
                            </ul>
                        <?php
                    }
                ?>
            </div>
        </nav>
    </section>
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"> <span><strong>รายวิชาเลือกเฉพาะ</strong></span>
                    <ul id="ticker01" class="news_sticker">

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="sliderSection">
        <div class="row" id="test-list">
            <div class="col-lg-8 col-md-8 col-sm-8">