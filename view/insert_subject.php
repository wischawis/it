<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 10/4/2560
 * Time: 14:11
 */
?>
<html>
<head>
<?php
    include ("header.php");
?>
<script>
    $(document).ready( function () {
        var check_sub1;
        var check_sub2;
        $('#name_th').keyup(function (){
            var subname = $('#name_th').val();
            $.ajax({
                url: "../model/findSubjectName.php",
                type: "POST",
                data: {name:subname}
            })
                .success(function(result) {
                    if(result == "true"){
                        $('#name_th').css("border","1px solid green");
                        check_sub1 = true;
                    }
                    else{
                        $('#name_th').css("border","1px solid red");
                        check_sub1 = false;
                    }
                });
        });
        $('#subject_code').change(function () {
            var subcode = $('#subject_code').val();
            console.log(subcode);
            $.ajax({
                url: "../model/findSubject.php",
                type: "POST",
                data: {code:subcode}
            })
            .success(function(result) {
                if(result == "true"){
                    $('#subject_code').css("border","1px solid green");
                    check_sub2 = true;
                }
                else{
                    $('#subject_code').css("border","1px solid red");
                    check_sub2 = false;
                }
            });
        });

        $('#add').click(function () {
            if(check_sub1 == false || check_sub2 == false ){
                alert("มีรหัสรายวิชานี้ในระบบแล้ว!");
                return false;
            }
            var name_th = $('#name_th').val();
            var description = $('#description').val();
            var subject_code = $('#subject_code').val();
            if(subject_code == "" || description == "" || name_th == "" ){
                alert("กรอกข้อมูลให้ครบ!");
                return false;
            }
        });

        $('#cancel').click(function () {
            $("input[type='text']").val("");
            $("textarea").val("");
            return false;
        });
    });
</script>
    <style>
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <form action="../model/insertS.php" method="post">
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อรายวิชา</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control" name="name_th" id="name_th"/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสรายวิชา</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control" name="subject_code" maxlength="8" minlength="8" id="subject_code"/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">รายละเอียดรายวิชา</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea  type="text" class="form-control" rows="10" name="description" id="description" minlength="20" ></textarea>
                </div>
            </div>
        </div>
        <br/>
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
</body>
    <?php
         include("footer.php");
    ?>
</html>
