<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 9/4/2560
 * Time: 23:57
 */
    include ("../config.inc.php");
    function deleteSubject($id){
        global $conn;
        $sql = "DELETE FROM subject WHERE id_subject=".$id;
        $res = $conn -> prepare($sql);
        $res -> execute();
        header("location: ../controller/editSubject.php");
    }
?>