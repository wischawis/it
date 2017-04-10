<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 10/4/2560
 * Time: 16:41
 */
?>
<?php
    include ("../config.inc.php");
    $name = $_POST['name'];
    $sql = "SELECT * FROM subject WHERE name_th='$name'";
    $result = $conn->query($sql);
    if($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo "false";
    }
    else{
        echo "true";
    }
?>
