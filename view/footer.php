<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 23:43
 */
?>
</div>
<?php
$lastCom = getLastComment();
?>
<div class="col-lg-4 col-md-4 col-sm-4">
    <div class="latest_post">
        <h2><span>ความคิดเห็นล่าสุด</span></h2>
        <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
                <?php
                for($last=0;$last<count($lastCom);$last++) {
                    ?>
                    <li>
                        <div class="media"><a href="../controller/detail.php?idsub=<?=$lastCom[$last]['id_subject']?>" class="media-left"> <img
                                        alt="" src="../images/post_img1.jpg"> </a>
                            <div class="media-body">
                                <a href="../controller/detail.php?idsub=<?=$lastCom[$last]['id_subject']?>" class="catg_title">
                                    <?php
                                    echo "<b>".$lastCom[$last]['name']." ".$lastCom[$last]['surname']."</b> แสดงความคิดเห็นในวิชา ".$lastCom[$last]['name_th'];
                                    ?>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
        </div>
    </div>
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

</body>
</html>
