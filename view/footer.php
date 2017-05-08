<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 23:43
 */
?>
</div>
<style>
    .time_com{
        font-size: 12px;
        color: #aaa;
        margin-top: 0;
        display: inline;
    }
    .footer_top{
        padding:10px 20px 10px;
    }
</style>
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
                        <div class="media"><a href="../controller/detail.php?idsub=<?=$lastCom[$last]['id_subject']?>" class="media-left">
                                <img alt="" src="<?=$lastCom[$last]['path_img']?>"/> </a>
                            <div class="media-body">
                                <a href="../controller/detail.php?idsub=<?=$lastCom[$last]['id_subject']?>" class="catg_title">
                                    <?php
                                    echo "<b>".$lastCom[$last]['name']." ".$lastCom[$last]['surname']."</b> แสดงความคิดเห็นในวิชา <b>".$lastCom[$last]['name_th']."</b><br/>";
                                    ?>
                                </a>
                                <?="<h5 class='time_com'>".echo_date_time($lastCom[$last]['date_time'])."</h5>"?>
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

<footer id="footer">
    <div class="footer_top">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="footer_widget wow fadeInRightBig">
                    <h2>Contact</h2>
                    <address>
                        ภาควิชาวิศวกรรมคอมพิวเตอร์ อาคาร 8 คณะวิศวกรรมศาสตร์ กำแพงแสน มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน อ.กำแพงแสน จ.นครปฐม 73140 <br>
                        โทรศัพท์: 034-281074 ต่อ 7523 หรือ 099-6954159 | โทรสาร: 099-6954159
                        ติดต่อผู้ดูแลระบบ : wis-chawis@hotmail.com
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <ul class="social_nav">
                <li class="facebook"><a href="https://www.facebook.com" target="_blank"></a></li>
                <li class="twitter"><a href="https://www.twitter.com" target="_blank"></a></li>
                <li class="pinterest"><a href="https://www.pinterest.com/login/" target="_blank"></a></li>
                <li class="googleplus"><a href="https://plus.google.com/" target="_blank"></a></li>
                <li class="youtube"><a href="https://www.youtube.com/" target="_blank"></a></li>
                <li class="mail"><a href="https://mail.google.com/" target="_blank"></a></li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right">
            <p>Copyright &copy; 2017 <a href="http://cpe.eng.kps.ku.ac.th" target="_blank" style="color: mediumpurple;">Computer Engineering KPS</a></p>
        </div>
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
