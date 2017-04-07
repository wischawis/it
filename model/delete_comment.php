<?php
$idcomment = $_POST['idcomment'];
$conn = new PDO('mysql:host=localhost;dbname=project_it;charset=utf8','root','');
$sql = "DELETE FROM  comment WHERE id_comment = '$idcomment'";
$res = $conn->exec($sql);
if($res)
	echo "success";
else
	echo "fail";
?>