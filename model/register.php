<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 9/4/2560
 * Time: 11:58
 */
include "../config.inc.php";

if(isset($_POST['regis'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $img = $_POST['img'];
    $sql = "INSERT INTO member (username, password, name, surname, tel, email, type_user,id_img) VALUES('$username','$password','$name','$surname','$tel','$email','USER','$img')";
    $res = $conn->exec($sql);
    if($res){
        echo "<script>alert('SUCCESS')</script>";
    }
    else{
        echo "<script>alert('FAIL')</script>";
    }
    echo "<script>window.location = '../index.php';</script>";
}
?>