<?php
    include ("../class/Member.class.php");
    session_start();
    $user = $_SESSION["user"];
    $id = $user->getId();
    $txt = $_POST['txt'];
    $idsubject = $_POST['idsubject'];
    $idcomment = $_POST['idcomment'];
    $conn = new PDO('mysql:host=localhost;dbname=project_it;charset=utf8','root','');
    $sql = "INSERT INTO comment (txt_comment,level,id_comment_parent,id_user,id_subject)VALUES('$txt','1','$idcomment','$id','$idsubject')";
    $res = $conn->exec($sql);
    header("Location:../controller/detail.php?idsub=$idsubject");
    exit();
?>