<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 12:34
 */
?>
<?php
include ("header.php");
?>

<style>
    label{
        text-align: right;
        padding-top: 5px;
    }
    .mm{
        margin: 20px 20px 20px 20px;
    }
</style>
<script>
    $(document).ready(function () {
        $("#edit_profile").click(function () {
           $("input").removeAttr("disabled");
           $("#cancel,#edit").attr("type","submit");
        });
        $("#cancel").click(function () {
            $("input").attr("disabled","disabled");
            $("#edit_profile").removeAttr("disabled");
            $("#cancel,#edit").attr("type","hidden");
        });
    });
</script>
<div class="mm">
    <center><h2>ข้อมูลส่วนตัว</h2></center>
    <br/>
    <div style="text-align: right">
        <input type="submit" class="btn btn-warning" name="cancel" id="edit_profile" value="แก้ไข"/>
    </div>
    <br/>
    <form action="../model/updateProfile.php" method="post">
        <input type="hidden"  name="idmem" id="idmem" value="<?=$userlogin->getId()?>"/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อผู้ใช้</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control" name="user" id="user" value="<?=$userlogin->getUsername()?>" disabled/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสผ่าน</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control" name="pass" id="pass" value="<?=$userlogin->getPassword()?>" disabled/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อ</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control" name="name" id="name" value="<?=$userlogin->getName()?>" disabled/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">นามสกุล</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control" name="surname" id="surname" value="<?=$userlogin->getSurname()?>" disabled/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">เบอร์โทรศัพท์</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="tel" class="form-control" name="tel" id="tel" value="<?=$userlogin->getTel()?>" disabled/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">อีเมล</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="email" class="form-control" name="email" id="email" value="<?=$userlogin->getEmail()?>" disabled/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">รูปภาพ</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="radio" style="float: left" name="img" value="1" <?php $userlogin->getIdImg() == "1"? $ch='checked' : $ch="";  echo $ch; ?> disabled/><img src="../images/user_1.jpg"/>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="radio" style="float: left" name="img" value="2" <?php $userlogin->getIdImg() == "2"? $ch='checked' : $ch="";  echo $ch; ?> disabled/><img src="../images/user_2.jpg"/>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="radio" style="float: left" name="img" value="3" <?php $userlogin->getIdImg() == "3"? $ch='checked' : $ch="";  echo $ch; ?> disabled/><img src="../images/user_3.jpg"/>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <div class="col-md-2 col-sm-2 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="hidden" class="form-control btn-warning" name="cancel" id="cancel" value="ยกเลิก"/>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="hidden" class="form-control btn-info" name="edit" id="edit" value="บันทึก"/>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12"></div>
            </div>
        </div>
    </form>

</div>
<?php
include ("footer.php");
?>
