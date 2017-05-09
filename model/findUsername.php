<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/5/2560
 * Time: 22:58
 */
?>
<?php
include ("../config.inc.php");
$user = $_POST['user'];
$sql = "SELECT * FROM member WHERE username='$user'";
$result = $conn->query($sql);
if($row = $result->fetch(PDO::FETCH_ASSOC)){
    echo "false";
}
else{
    echo "true";
}
?>