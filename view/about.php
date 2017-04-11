<!DOCTYPE html>
<html>
<head>
    <title>เกี่ยวกับเรา</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="../css/theme.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

    <style>


    </style>
    <?php

    include ("../config.inc.php");
    include ("../class/Member.class.php");
    function getLastComment(){
        global $conn;
        $sql = "SELECT * FROM member INNER JOIN (comment INNER JOIN subject ON comment.id_subject = subject.id_subject) ON member.id_member=comment.id_user ORDER BY date_time DESC LIMIT 5";
        $res = $conn->query($sql);
        $resultArray = array();
        while($obResult = $res->fetch(PDO::FETCH_ASSOC))
        {
            $arrCol = array();
            $arrCol = array("id_comment"=>$obResult['id_comment'],
                "txt_comment"=>$obResult['txt_comment'],
                "date_time"=>$obResult['date_time'],
                "level"=>$obResult['level'],
                "id_comment_parent"=>$obResult['id_comment_parent'],
                "id_user"=>$obResult['id_user'],
                "id_subject"=>$obResult['id_subject'],
                "name_th"=>$obResult['name_th'],
                "subject_code"=>$obResult['subject_code'],
                "name"=>$obResult['name'],
                "surname"=>$obResult['surname']);
            array_push($resultArray,$arrCol);
        }
        return $resultArray;
    }
    $sql = "SELECT * FROM subject";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_subject"=>$obResult['id_subject'],
            "name_th"=>$obResult['name_th'],
            "code"=>$obResult['subject_code'],
            "description"=>$obResult['description']);
        array_push($resultArray,$arrCol);
    }
    $userlogin;
    $lastCom = getLastComment();
    session_start();
    if(isset($_SESSION['user'])){
        $userlogin = $_SESSION['user'];
    }


    ?>
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
                    <li><a href="#"></a></li>
                    <li><a href="about.php">เกี่ยวกับเรา</a></li>
                    <li>
                        <form class="navbar-form navbar-left">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
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
                                <li><a href="../controller/profile.php">Profile</a></li>
                                <li><a href="../controller/home.php?logout=1">Log out</a></li>
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
                                    <li><a href="../controller/edituser.php">แก้ไขรายวิชา</a></li>
                                    <li><a href="../controller/edituser.php">เพิ่มรายวิชา</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการผู้ใช้</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="../controller/edituser.php">แก้ไขข้อมูลผู้ใช้</a></li>
                                    <li><a href="../controller/edituser.php">เพิ่มผู้ใช้</a></li>
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
                <div class="latest_newsarea"> <span><strong>ภาควิชาวิศวกรรมคอมพิวเตอร์</strong></span>
                    <ul id="ticker01" class="news_sticker">

                    </ul>
                    <!--<div class="social_area">
                      <ul class="social_nav">
                        <li class="facebook"><a href="https://www.facebook.com"></a></li>
                        <li class="twitter"><a href="https://www.twitter.com"></a></li>
                        <li class="flickr"><a href="#"></a></li>
                        <li class="pinterest"><a href="#"></a></li>
                        <li class="googleplus"><a href="#"></a></li>
                        <li class="vimeo"><a href="#"></a></li>
                        <li class="youtube"><a href="#"></a></li>
                        <li class="mail"><a href="#"></a></li>
                      </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <section id="sliderSection">

        <div class="row" id="test-list">
            <br class="col-lg-12 col-md-12 col-sm-12">
                <img src="../images/band_eng.jpg" align="center" class="img-center img-responsive">




                <table style="height: 40px;width: 80%;" border="0" align="center">
                    <tbody style="text-align: left;">
                    <tr style="text-align: left;">
                        <td style="text-align: left;" colspan="2">
                            <h3>วิสัยทัศน์</h3>
                            "เป็นผู้นำการผลิตวิศวกรคอมพิวเตอร์ที่มีคุณภาพ และการพัฒนาเทคโนโลยีสารสนเทศเพื่อสังคมไทย"
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <td style="text-align: left;" colspan="2">
                            <h3>ภารกิจ</h3>
                            "ผลิต บัณฑิตในสาขาวิชาวิศวกรรมคอมพิวเตอร์ที่มีคุณภาพ คุณธรรม และจริยธรรม รวมทั้งให้บริการวิชาการในด้านเทคโนโลยีสารสนเทศกับสังคมไทย"
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <td style="text-align: left;" colspan="2">
                            <h3>ปรัชญาและปณิธาน</h3>
                            "ผลิตวิศวกรคอมพิวเตอร์คุณภาพดี เทคโนโลยีสารสนเทศก้าวหน้า เพื่อพัฒนาสังคม"</br></br>
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <td style="text-align: left;" colspan="2">
                            <p style="text-align: left;">
                                   &nbsp; &nbsp; &nbsp; &nbsp;สาขาวิชาวิศวกรรมคอมพิวเตอร์ เป็นสาขาวิชาหนึ่ง
                                ภายใต้กำกับของคณะวิศวกรรมศาสตร์ กำแพงแสน มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน ซึ่งดำเนินงานตาม ปรัชญปณิธานของคณะฯ <span style="color: #ff6600;">"<strong>ผลิตวิศวกรคุณภาพดี เทคโนโลยีและนวัตกรรมก้าวหน้า เพื่อพัฒนาสังคม</strong>"</span> โดยมุ่งหวังที่จะขยายโอกาสทางการศึกษาต่อในระดับปริญญาตรีสาขาวิชาวิศวกรรมคอมพิวเตอร์ ในแถบภาคตะวันตกซึ่งพบว่ายังมีน้อยอยู่ และยังเป็นอีกทางเลือกหนึ่งสำหรับนิสิตนักศึกษาอื่นๆที่สนใจอีกด้วย
                            </p>
                            <p style="text-align: center;">&nbsp;</p>
                        </td>
                    </tr>
                    <tr style="text-align: left;">
                        <td style="text-align: left;" colspan="2">
                            <p style="text-align: left;">
                            &nbsp; &nbsp; &nbsp; &nbsp;สาขาวิชาวิศวกรรมคอมพิวเตอร์ทำการเปิดรับนิสิตรุ่นแรกในปีการศึกษา 2550 ด้วยความพร้อมทั้งทางด้านบุคลากรและอุปกรณ์ที่ครบครัน เพื่อผลิตบัณฑิตที่มีความรู้ทางด้านวิศวกรรมคอมพิวเตอร์ สำหรับพัฒนาประเทศ โดยเฉพาะอย่างยิ่งทางด้านเทคโนโลยีคอมพิวเตอร์ ทั้งด้านฮาร์ดแวร์และ
                            ซอฟต์แวร์ในสาขาต่างๆ เช่น สถาปัตยกรรมคอมพิวเตอร์ เครือข่ายคอมพิวเตอร์และการสื่อสารข้อมูล การประยุกต์ใช้งานไมโครโปรเซสเซอร์ การโปรแกรมระบบ ปัญญาประดิษฐ์ วิศวกรรมซอฟต์แวร์ การพัฒนาระบบงานคอมพิวเตอร์ ระบบการจัดการฐานข้อมูล และเทคโนโลยีสารสนเทศเพื่อการจัดการ ฯลฯ โดยมุ่งหวังให้บัณฑิตที่สำเร็จการศึกษา สามารถประกอบอาชีพเป็นนักวิเคราะห์และพัฒนาระบบงาน วิศวกรคอมพิวเตอร์ วิศวกรระบบ และผู้บริหารระบบงานสารสนเทศในหน่วยงานต่างๆได้
                            </p>
                            <p style="text-align: center;">&nbsp;</p>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>


           <!-- <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>ความคิดเห็นล่าสุด</span></h2>
                    <div class="latest_post_container">
                        <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                        <ul class="latest_postnav">

                        </ul>
                        <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <!-- <aside class="right_content">
                     <div class="single_sidebar">
                         <h2><span>Popular Post</span></h2>
                         <ul class="spost_nav">
                             <li>
                                 <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                     <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                     <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                     <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                 </div>
                             </li>
                             <li>
                                 <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                     <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                 </div>
                             </li>
                         </ul>
                     </div>
                     <div class="single_sidebar">
                         <ul class="nav nav-tabs" role="tablist">
                             <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                             <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
                             <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
                         </ul>
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="category">
                                 <ul>
                                     <li class="cat-item"><a href="#">Sports</a></li>
                                     <li class="cat-item"><a href="#">Fashion</a></li>
                                     <li class="cat-item"><a href="#">Business</a></li>
                                     <li class="cat-item"><a href="#">Technology</a></li>
                                     <li class="cat-item"><a href="#">Games</a></li>
                                     <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                                     <li class="cat-item"><a href="#">Photography</a></li>
                                 </ul>
                             </div>
                             <div role="tabpanel" class="tab-pane" id="video">
                                 <div class="vide_area">
                                     <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                                 </div>
                             </div>
                             <div role="tabpanel" class="tab-pane" id="comments">
                                 <ul class="spost_nav">
                                     <li>
                                         <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                             <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                             <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                             <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                         </div>
                                     </li>
                                     <li>
                                         <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                                             <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                         </div>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </aside>-->
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_widget wow fadeInLeftBig">
                        <h2>Social Contact</h2>

                        <ul class="social_nav">
                            <li class="facebook"><a href="https://www.facebook.com"></a></li>
                            <li class="twitter"><a href="https://www.twitter.com"></a></li>
                            <li class="pinterest"><a href="https://www.pinterest.com/login/"></a></li>
                            <li class="googleplus"><a href="https://plus.google.com/"></a></li>
                            <li class="youtube"><a href="https://www.youtube.com/"></a></li>
                            <li class="mail"><a href="https://mail.google.com/"></a></li>
                        </ul>

                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Contact</h2>
                        <address>
                            ภาควิชาวิศวกรรมคอมพิวเตอร์ อาคาร 8 คณะวิศวกรรมศาสตร์ กำแพงแสน มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน อ.กำแพงแสน จ.นครปฐม 73140 </br>
                            โทรศัพท์: 034-281074 ต่อ 7523 หรือ 099-6954159 | โทรสาร: 099-6954159  </br>
                            ติดต่อผู้ดูแลระบบ : wis-chawis@hotmail.com
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p class="copyright">Copyright &copy; 2017 <a href="../index.php">Computer Engineering KPS</a></p>
            <p class="developer">Developed By Wis Chawis</p>
        </div>
    </footer>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/jquery.li-scroller.1.0.js"></script>
<script src="../js/jquery.newsTicker.min.js"></script>
<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/custom.js"></script>

<!-- Modal Login-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body" align="center">
                <form action="../controller/home.php" method="post">
                    <input type="text" id="user" class="form-control" name="user" placeholder="ชื่อผู้ใช้"/>
                    <br/>
                    <br/>
                    <input type="password" id="pass" class="form-control" name="pass" placeholder="รหัสผ่าน"/>
                    <br/>
                    <br/>
                    <input type="submit" class="btn btn-info" name="login" id="login" value="Login"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Registor-->
<div class="modal fade" id="myModalRegistor" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body" align="center">
                <form id ="register" method="post" name="register" action="../model/register.php">
                    <table>
                        <tr>
                            <td><label for="username" style="color: darkviolet">Username</label></td>
                            <td><input type="text" class="form-control" name="username" id="username" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="password" style="color: navy">Password</label></td>
                            <td><input type="text" class="form-control" name="password" id="password" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="name" style="color: deepskyblue">Name</label></td>
                            <td><input type="text" class="form-control" name="name" id="name" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="surname" style="color: greenyellow">Surname</label></td>
                            <td><input type="text" class="form-control" name="surname" id="surname" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="tel" style="color: yellow">Tel. No.</label></td>
                            <td><input type="text" class="form-control" name="tel" id="tel" maxlength="10"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="email" style="color: orange">E-mail</label></td>
                            <td><input type="text" class="form-control" name="email" id="email" minlength="9" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="email" style="color: orange">Picture</label></td>
                            <td><div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="radio" style="float: left" name="img" value="1"/><img src="../images/user_1.jpg"/>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="radio" style="float: left" name="img" value="2"/><img src="../images/user_2.jpg"/>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="radio" style="float: left" name="img" value="3"/><img src="../images/user_3.jpg"/>
                                </div></td>
                        </tr>
                    </table>
                    <br/>
                    <input type="submit" class="btn btn-success" name="regis" id="regis" value="Regis"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#login").click(function () {
            var user = $("#user").val();
            var pass = $("#pass").val();
            if(user == "" || pass == ""){
                if(user == ""){
                    $("#user").css("border","1px solid red");
                }
                else{
                    $("#user").css("border","1px solid #ccc");
                }
                if(pass == ""){
                    $("#pass").css("border","1px solid red");
                }
                else{
                    $("#pass").css("border","1px solid #ccc");
                }
                return false;
            }
        });
        $("#regis").click(function () {
            var user = $("#username").val();
            var pass = $("#password").val();
            var name = $("#name").val();
            var surname = $("#surname").val();
            var tel = $("#tel").val();
            var email = $("#email").val();
            var type = $("input[name=img]:checked").val();
            if(user == "" || pass == "" || name == "" || surname == "" || tel == "" || email == "" || type == undefined){
                alert("กรุณากรอกข้อมูลให้ครบ");
                return false;
            }
        });
    });
</script>
</body>
</html>