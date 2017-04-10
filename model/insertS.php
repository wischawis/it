<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 10/4/2560
 * Time: 14:39
 */
    include ("../class/Member.class.php");
    include_once ("../model/getData.php");
    session_start();
    $user = $_SESSION["user"];
    $id = $user->getId();
    $name_th = $_POST['name_th'];
    $subject_code = $_POST['subject_code'];
    $description = $_POST['description'];
    $conn = new PDO('mysql:host=localhost;dbname=project_it;charset=utf8','root','');

    $dataSub = array();
    $dataSub = getListSubject();
    $sql = "INSERT INTO subject (name_th,subject_code,description,id_user)VALUES('$name_th','$subject_code','$description','$id')";
    $res = $conn->exec($sql);
    echo "<script>alert('Insert complete!')</script>";
    header("Location:../controller/home.php");
    exit();

?>