<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 9/4/2560
 * Time: 22:31
 */

    include_once ("../model/getData.php");
    include_once ("../model/editDataSubject.php");
    include("../class/Authentication.class.php");
    session_start();
    if(isset($_SESSION['user'])){
        $userlogin = $_SESSION['user'];
        if($userlogin->getTypeUser()=="ADMIN") {
            $dataSubjects = array();
            $dataSubjects = getListSubject();
            if (isset($_POST["edit"])) {
                $id = $_POST["edit"];

            }
            if (isset($_GET["idSubject"])) {
                $id = $_GET["idSubject"];
                $de = deleteSubject($id);
            }
            include_once("../view/edit_subject.php");
        }
        else{
            header("Location: ../index.php");
            exit();
        }
    }
    else{
        header("Location: ../index.php");
        exit();
    }
?>


