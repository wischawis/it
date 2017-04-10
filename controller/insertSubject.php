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
}

include ("../model/getData.php");
    include ("../view/insert_Subject.php");
?>