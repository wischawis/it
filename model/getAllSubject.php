<?php
include ("config.inc.php");

$sql = "SELECT * FROM subject";
$res = $conn->query($sql);
$resultArray = array();
while($obResult = $res->fetch(PDO::FETCH_ASSOC))
{
    $arrCol = array();
    $arrCol = array("id_subject"=>$obResult['id_subject'],
        "name_th"=>$obResult['name_th'],
        "code"=>$obResult['subject_code'],
        "description"=>$obResult['description']);
    array_push($resultArray,$arrCol);
}
return $resultArray;
?>
