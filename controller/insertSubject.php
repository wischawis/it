<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 10/4/2560
 * Time: 14:10
 */
include("../class/Authentication.class.php");
session_start();
if(isset($_SESSION['user'])){
    $userlogin = $_SESSION['user'];
    if ($userlogin->getTypeUser() == "ADMIN") {
        include("../model/getData.php");
        include("../view/insert_Subject.php");
    }
    else {
        header("Location: ../index.php");
        exit();
    }
}
else {
    header("Location: ../index.php");
    exit();
}


?>