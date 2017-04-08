<script src="../lib/sweetalert-master/dist/sweetalert.min.js"></script>
<script src="../js/jquery-3.2.0.min.js"></script>
<link rel="stylesheet" href="../lib/sweetalert-master/dist/sweetalert.css">
<script>
    function error(){
        swal("Here's a message!");
        return false;
    };
    </script>
<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 14:04
 */
include("../class/Authentication.class.php");
session_start();
?>
<?php

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $mem = Authentication::login($user, $pass);
    if (is_a($mem, "Member")) {
        if($mem->getTypeUser() == "ADMIN"){
            $_SESSION["user"] = $mem;
            include ("../view/admin_page.php");
            exit();
        }
        else{
            $_SESSION["user"] = $mem;
            header("Location:../view/admin_page.php");
            exit();
        }
    }
    else{

        echo "<script>error();</script>";
        echo "<script>window.location='../index.php'</script>";
    }
}
if(isset($_GET["logout"])){
    Authentication::logout($_SESSION["user"]);
    session_unset();
    session_destroy();
    if (ini_get("session.use_cookies")) {
        setcookie(session_name(),'',time() -3600,"/");
    }
    header("Location: ../index.php");
    exit();
}
if(isset($_SESSION["user"])){
    if($_SESSION["user"]->getTypeUser() == "ADMIN"){
        include ("../view/admin_page.php");
        exit();
    }
    else{
        header("Location:../index.php");
        exit();
    }
}
else{
    header("Location:../index.php");
    exit();
}
?>
