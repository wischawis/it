<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 1:50
 */
?>

<?php
include("../class/Authentication.class.php");
session_start();

if(isset($_SESSION['user'])){
    $userlogin = $_SESSION['user'];
    $p_img = $userlogin->getPathImg();
}
else{
    $userlogin = null;
    $p_img = null;
}

include ("../model/getData.php");
$idsub = $_GET["idsub"];
$resultArray = getOneSubject($idsub);
$resultArray2 = getComment($idsub);

include ("../view/comment.php");

?>