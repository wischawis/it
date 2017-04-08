<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 0:36
 */
?>
<?php
include ("header.php");
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {

    });
</script>
<style>
    .edit_col,.delete_col{
        cursor: pointer;
    }
    .ch{
        float: left;
    }
</style>
<form action="../model/manageUser.php" method="post">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อผู้ใช้</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="username" id="username"/>
            </div>
            <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสผ่าน</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="password" id="pass"/>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="name" id="name"/>
            </div>
            <label class="control-label col-md-2 col-sm-2 col-xs-12">นามสกุล</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" class="form-control" name="surname" id="surname"/>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">เบอร์โทรศัพท์</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="tel" class="form-control" name="tel" id="tel" minlength="10" maxlength="10"/>
            </div>
            <label class="control-label col-md-2 col-sm-2 col-xs-12">อีเมล</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="email" class="form-control" name="email" id="email"/>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="form-group">
            <div class="control-label col-md-2 col-sm-2 col-xs-12">ชนิดผู้ใช้</div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="radio" style="float: left" name="type_user" value="USER"/> <span class="ch"> USER</span><br>
                <input type="radio" style="float: left" name="type_user" value="ADMIN"/><span class="ch"> ADMIN</span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="form-group">
            <div class="control-label col-md-2 col-sm-2 col-xs-12">รูปภาพ</div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="radio" style="float: left" name="img" value="1"/><img src="../images/user_1.jpg"/>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="radio" style="float: left" name="img" value="2"/><img src="../images/user_2.jpg"/>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="radio" style="float: left" name="img" value="3"/><img src="../images/user_3.jpg"/>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="form-group">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="submit" class="btn btn-default" name="cancel" id="cancel" value="ยกเลิก"/>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="submit" class="btn btn-default" name="add" id="add" value="บันทึก"/>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
</form>
<?php
include ("footer.php");
?>

