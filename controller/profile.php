<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 12:34
 */
?>
<?php
include("../class/Authentication.class.php");
session_start();
$userlogin = $_SESSION['user'];
include ("../model/getData.php");
include ("../view/view_profile.php");
?>
