<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 10/4/2560
 * Time: 0:40
 */
    include "../config.inc.php";

    if(isset($_POST['edit'])){
        $idSub = $_POST['idsub'];
        $subject_code = $_POST['subject_code'];
        $description = $_POST['description'];
        $name_th = $_POST['name_th'];
        if($name_th == "" || $subject_code == "" || $description == ""){
            echo "<script>alert('กรุณาใส่ข้อมูลให้ครบ!')</script>";
        }
        else {
            $sql = "UPDATE subject SET subject_code = '$subject_code',description = '$description',name_th = '$name_th' WHERE id_subject = '$idSub'";
            $res = $conn->exec($sql);
            if ($res) {
                echo "<script>alert('SUCCESS')</script>";
            } else {
                echo "<script>alert('FAIL')</script>";
            }

        }
        echo "<script>window.location = '../controller/editSubject.php';</script>";
    }

?>