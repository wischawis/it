<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 11/4/2560
 * Time: 14:55
 */
include ("../config.inc.php");
include("../class/Member.class.php");
if(isset($_POST['edit'])) {
    $idmem = $_POST['idmem'];
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $img = $_POST['img'];
    $sql = "UPDATE member SET username='$username',password='$pass',name='$name',surname='$surname',tel='$tel',email='$email',id_img='$img' WHERE id_member='$idmem'";
    $result = $conn->exec($sql);
    if ($result) {
        session_start();
        $user = $_SESSION['user'];
        $user->setUsername($username);
        $user->setPassword($pass);
        $user->setName($name);
        $user->setSurname($surname);
        $user->setTel($tel);
        $user->setEmail($email);
        $user->setIdImg($img);
        echo "<script>alert('SUCCESS')</script>";
    } else {
        echo "<script>alert('FAIL')</script>";
    }
    echo "<script>window.location = '../controller/profile.php';</script>";
}