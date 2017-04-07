<!DOCTYPE html>
<html>
<head>
    <title>NewsFeed | Pages | Contact</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
        .main-subject,.sub-subject,.more{
            display: block;
            padding: 5px 5px 5px 5px;
        }
        .subject{
            border: 1px solid #cccccc;
            height: auto;
            margin: 15px 10px 15px 10px;
        }
        .more{
            text-align: right;
        }
        .sub-subject{
            height: 65px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .detail{

        }
    </style>
    <?php
        include ("config.inc.php");
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
                    <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                    <li><a href="#"></a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">เกี่ยวกับเรา</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Android</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><a href="#">Nokia</a></li>
                            <li><a href="#">Walton Mobile</a></li>
                            <li><a href="#">Sympony</a></li>
                        </ul>
                    </li>

                    <li><a href="pages/contact.html">ติดต่อ</a></li>
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
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a></li>
                    <li><a href="#" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"> <span><strong>รายวิชาเเลือกเฉพาะ</strong></span>
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
            <div class="col-lg-8 col-md-8 col-sm-8">
                <?php
                    for ($i=0;$i<count($resultArray);$i++) {
                        ?>
                        <div class="subject">
                            <div class="main-subject">
                                <span><b><?=$resultArray[$i]['code']?></b></span>
                                <span><b><?=$resultArray[$i]['name_th']?></b></span>
                            </div>
                            <div class="sub-subject">
                                <p class="detail"><?=$resultArray[$i]['description']?></p>
                            </div>
                            <div class="more"><a href="controller/detail.php?idsub=<?=$resultArray[$i]['id_subject']?>" >more</a></div>
                        </div>
                        <?php
                    }
                ?>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>ความคิดเห็นล่าสุด</span></h2>
                    <div class="latest_post_container">
                        <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                        <ul class="latest_postnav">
                            <li>
                                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                </div>
                            </li>
                        </ul>
                        <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                    </div>
                </div>
            </div>
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
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInLeftBig">
                        <h2>Social Contact</h2>

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

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInDown">
                        <h2>Subject</h2>
                        <ul class="tag_nav">
                            <li><a href="#">OOP</a></li>
                            <li><a href="#">Web Application</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Contact</h2>
                        <address>
                            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p class="copyright">Copyright &copy; 2045 <a href="index.html">NewsFeed</a></p>
            <p class="developer">Developed By Wpfreeware</p>
        </div>
    </footer>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.li-scroller.1.0.js"></script>
<script src="js/jquery.newsTicker.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/custom.js"></script>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body" align="center">
                <form action="controller/home.php" method="post">
                    <input type="text" id="user" name="user" placeholder="ชื่อผู้ใช้"/>
                    <br/>
                    <br/>
                    <input type="password" id="pass" name="pass" placeholder="รหัสผ่าน"/>
                    <br/>
                    <br/>
                    <input type="submit" name="login" id="login" value="Login"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>