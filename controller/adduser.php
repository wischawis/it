<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 0:36
 */
?>
<?php
include("../class/Authentication.class.php");
session_start();
$userlogin = $_SESSION['user'];
if($userlogin->getTypeUser()=="ADMIN"){
    include ("../model/getData.php");
    include ("../view/add_user.php");
    exit();
}
else{
    header("Location: ../index.php");
    exit();
}


?>
