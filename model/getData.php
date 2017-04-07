<?php

include ("../config.inc.php");

function getAllSubject(){
    global $conn;
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
}
function getOneSubject($idsub){
    global $conn;
    $sql = "SELECT * FROM subject INNER JOIN member ON subject.id_user=member.id_member WHERE id_subject = '$idsub'";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_subject"=>$obResult['id_subject'],
            "name_th"=>$obResult['name_th'],
            "name_en"=>$obResult['name_en'],
            "description"=>$obResult['description'],
            "id_member"=>$obResult['id_member'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getComment($subject){
    global $conn;
    $sql = "SELECT * FROM comment INNER JOIN member ON comment.id_user=member.id_member WHERE id_subject='$subject' and level=0 ORDER BY date_time";
    $res = $conn->query($sql);
    $resultArray2 = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_comment"=>$obResult['id_comment'],
            "txt_comment"=>$obResult['txt_comment'],
            "date_time"=>$obResult['date_time'],
            "level"=>$obResult['level'],
            "id_comment_parent"=>$obResult['id_comment_parent'],
            "id_user"=>$obResult['id_user'],
            "id_subject"=>$obResult['id_subject'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname']);
        array_push($resultArray2,$arrCol);
    }
    return $resultArray2;
}
function sub_comment($subject,$com){
    global $conn;
    $sql = "SELECT * FROM comment INNER JOIN member ON comment.id_user=member.id_member WHERE id_subject='$subject' and level=1 and id_comment_parent='$com' ORDER BY date_time";
    $res = $conn->query($sql);
    $resultArray2 = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_comment"=>$obResult['id_comment'],
            "txt_comment"=>$obResult['txt_comment'],
            "date_time"=>$obResult['date_time'],
            "level"=>$obResult['level'],
            "id_comment_parent"=>$obResult['id_comment_parent'],
            "id_user"=>$obResult['id_user'],
            "id_subject"=>$obResult['id_subject'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname']);
        array_push($resultArray2,$arrCol);
    }
    return $resultArray2;
}
?>
