<?php
/*
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 9/4/2560
 * Time: 22:41
 */
    include ("header.php");

?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>

<html>
<head>
    <script>
        $(document).ready(function () {
            $('#table_id').dataTable();
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
            $('#subject_code').keyup(function () {
                var subcode = $('#subject_code').val();
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


            $(document).on("click", ".edit_col", function () {
                $("#modal_editSubject").modal('show');

                var id = $(this).data('id');
                var data = <?=json_encode($dataSubjects);?>;
                var subject_select;
                for(var i=0;i<data.length;i++){
                    if(id == data[i]['2']){
                        subject_select = data[i];
                        break;
                    }
                }
                $('#idsub').val(subject_select['2']);
                $('#name_th').val(subject_select['1']);
                $('#subject_code').val(subject_select['0']);
                $('#description').val(subject_select['3']);
            });
        });

        function deleteSubject(id) {
            var data = <?=json_encode($dataSubjects);?>;
            var subject_select;
            for(var i=0;i<data.length;i++){
                if(id == data[i]['2']){
                    subject_select = data[i];
                    break;
                }
            }
            if(confirm("Do you want to delete "+subject_select['1']+" subject?")){
                window.location = '../controller/editSubject.php?idSubject=' + id;
            }
        }
    </script>
    <style>
        .edit_col,.delete_col{
            cursor: pointer;
        }
        .ch{
            float: left;
        }
        textarea.form-control{
            resize: none;
            height: 200px;
        }
    </style>
</head>
<boby>
    <table id="table_id" class="table table-striped" align="center">
        <thead>
            <th>No</th>
            <th>Code subject</th>
            <th>Name subject</th>
            <th>Manage subject</th>
        </thead>
        <tbody>
        <?php
        for($j=0;$j<count($dataSubjects);$j++)
        { echo
            "<tr>               
                <td>".($j+1)."</td>
                <td>".$dataSubjects[$j]['0']."</td>
                <td>".$dataSubjects[$j]['1']."</td>							
                <td>    
                        <div   class='edit_col'  data-id='".$dataSubjects[$j]['2']."'>
                            <a><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>แก้ไข</a>
                        </div>
                        <div class='delete_col' data-id='".$dataSubjects[$j]['2']."'>
                            <a onclick='deleteSubject(".$dataSubjects[$j]['2'].")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>ลบ</a>
                        </div>                           
                </td>
			</tr>";
        }
        ?>
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="modal_editSubject" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">แก้ไขข้อมูลรายวิชา</h4>
                </div>
                <div class="modal-body" align="center">
                    <form action="../model/manageSubject.php" method="post">
                        <input type="hidden" name="idsub" id="idsub"/>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" align="left">ชื่อวิชาเลือกเฉพาะ</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="name_th" id="name_th"/>
                                </div>

                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" align="left">รหัสวิชาเลือกเฉพาะ</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="subject_code" id="subject_code" minlength="8" maxlength="8"/>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" align="left">รายละเอียด</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea type="text" class="form-control" name="description" id="description" row="10" minlength="20"></textarea>
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
</boby>
<?php
    include ("footer.php");
?>
</html>