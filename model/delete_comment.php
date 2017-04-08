<?php
include ("../config.inc.php");
$idcomment = $_POST['idcomment'];

$sql1 = "SELECT * FROM comment WHERE id_comment = '$idcomment'";
$res1 = $conn->query($sql1);
$result = array();
if($obResult = $res1->fetch(PDO::FETCH_ASSOC))
{
    $arrCol = array();
    $arrCol = array("id_comment"=>$obResult['id_comment'],
        "level"=>$obResult['level'],
        "id_comment_parent"=>$obResult['id_comment_parent']);
    array_push($result,$arrCol);
}
if($result[0]['level'] == 0){
    $sql3 = "DELETE FROM  comment WHERE id_comment_parent = '$idcomment'";
    $res3 = $conn->exec($sql3);
}
$sql = "DELETE FROM  comment WHERE id_comment = '$idcomment'";
$res = $conn->exec($sql);
if($res)
	echo "success";
else
	echo "fail";
?>