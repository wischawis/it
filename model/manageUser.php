<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 1:07
 */
?>
<?php

include "../config.inc.php";

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $type_user = $_POST['type_user'];
    $img = $_POST['img'];
    $sql = "INSERT INTO member (username, password, name, surname, tel, email, type_user,id_img) VALUES('$username','$password','$name','$surname','$tel','$email','$type_user','$img')";
    $res = $conn->exec($sql);
    if($res){
        echo "<script>alert('SUCCESS')</script>";
    }
    else{
        echo "<script>alert('FAIL')</script>";
    }
    echo "<script>window.location = '../controller/edituser.php';</script>";
}
if(isset($_POST['edit'])){
    $idmem = $_POST['idmem'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $type_user = $_POST['type_user'];
    $sql = "UPDATE member SET username = '$username',password = '$password',name = '$name',surname = '$surname',tel = '$tel',email = '$email',type_user = '$type_user' WHERE id_member = '$idmem'";
    $res = $conn->exec($sql);
    if($res){
        echo "<script>alert('SUCCESS')</script>";
    }
    else{
        echo "<script>alert('FAIL')</script>";
    }
    echo "<script>window.location = '../controller/edituser.php';</script>";
}
if(isset($_POST['iduser'])){
    $iduser = $_POST['iduser'];
    $sql = "DELETE FROM member WHERE id_member='$iduser'";
    $res = $conn->exec($sql);
    if($res){
        echo true;
    }
    else{
        echo false;
    }
}
?>

