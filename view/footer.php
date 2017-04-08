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


<!-- Modal Login-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body" align="center">
                <form action="controller/home.php" method="post">
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
                <form id ="register" method="post" name="register" action="">
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

</body>
</html>
