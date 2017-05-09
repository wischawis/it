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
        $('#table_id').dataTable();
        $(document).on("click", ".edit_col", function () {
            $("#modal_edit").modal('show');
            var id = $(this).data('id');
            var data = <?=json_encode($data);?>;
            var user_select;
            for(var i=0;i<data.length;i++){
                if(id == data[i]['id_member']){
                    user_select = data[i];
                    break;
                }
            }
            $('#idmem').val(user_select['id_member']);
            $('#username').val(user_select['username']);
            $('#pass').val(user_select['password']);
            $('#name').val(user_select['name']);
            $('#surname').val(user_select['surname']);
            $('#tel').val(user_select['tel']);
            $('#email').val(user_select['email']);
            if(user_select['type_user'] == "USER"){
                $('#us').prop('checked',true);
            }
            else{
                $('#ad').prop('checked',true);
            }
        });
        $(document).on("click", ".delete_col", function () {
            var id = $(this).data('id');
            //window.location = '../model/manageUser.php?iduser='+id;
            $.ajax({
                url: "../model/manageUser.php" ,
                type: "POST",
                data: {iduser:id},
                dataType: "json"
            })
            .success(function(result) {
                if(result){
                    alert("SUCCESS");
                    location.reload();
                }
                else {
                    alert("FAIL");
                }
            });
        });

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
<!-- ------------ตาราง--------------- -->
<table class="display" id="table_id">
    <thead>
    <tr>
        <th width="5%">ลำดับ</th>
        <th width="15%">ชื่อ</th>
        <th width="20%">นามสกุล</th>
        <th width="10%">เบอร์โทรศัพท์</th>
        <th width="20%">อีเมล</th>
        <th width="10%">ชนิดผู้ใช้</th>
        <th width="15%">การกระทำ</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0;$i<count($data);$i++){
        $list = $i +1;
        echo "<tr>
                    <td>".$list."</td>
                    <td>".$data[$i]['name']."</td>
                    <td>".$data[$i]['surname']."</td>
                    <td>".$data[$i]['tel']."</td>
                    <td>".$data[$i]['email']."</td>
                    <td>".$data[$i]['type_user']."</td>
                    <td>
                        <div class='edit_col' data-id='".$data[$i]['id_member']."'>
                            <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\">
                                <span>แก้ไข</span>
                            </i>
                        </div>
                        <div class='delete_col' data-id='".$data[$i]['id_member']."'>
                            <i class=\"fa fa-trash-o\" aria-hidden=\"true\">
                                <span>ลบ</span>
                            </i>
                        </div>
                    </td>
                </tr>";
    }
    ?>
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">แก้ไขข้อมูล</h4>
            </div>
            <div class="modal-body" align="center">
                <form action="../model/manageUser.php" method="post">
                    <input type="hidden" name="idmem" id="idmem"/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อผู้ใช้</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" name="username" id="username" readonly/>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสผ่าน</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="password" class="form-control" name="password" id="pass"/>
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
                                <input type="text" class="form-control" name="tel" id="tel" minlength="10" maxlength="10"/>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">อีเมล</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" name="email" id="email"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <div class="control-label col-md-2 col-sm-2 col-xs-12">ชนิดผู้ใช้</div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="radio" style="float: left" name="type_user" value="USER" id="us"/> <span class="ch"> USER</span><br>
                                <input type="radio" style="float: left" name="type_user" value="ADMIN" id="ad"/><span class="ch"> ADMIN</span>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4 col-sm-4 col-xs-12"></div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="submit" class="btn btn-default" name="edit" id="submit" value="submit"/>
                            </div>
                            <div class="col-md-4 col-sm-3 col-xs-12"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include ("footer.php");
?>

