<?php
/**
 * Created by PhpStorm.
 * User: b.krittiphong
 * Date: 10/4/2560
 * Time: 15:40
 */
?>
<?php
    include ("../config.inc.php");
    $code = $_POST['code'];
    $sql = "SELECT * FROM subject WHERE subject_code='$code'";
    $result = $conn->query($sql);
    if($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo "false";
    }
    else{
        echo "true";
    }
?>