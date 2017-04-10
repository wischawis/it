<?php

include ("../config.inc.php");
// <-------------------------toey--------------------------------->
function getListSubject()
{
    global $conn;
    $dataSubjects = array();
    $sql= "SELECT * FROM subject";
    $res = $conn->query($sql);
    $i=0;
    while ($row = $res->fetch(PDO::FETCH_ASSOC))
    {
        $dataSubjects[$i] = array($row['subject_code'],$row['name_th'],$row['id_subject'],$row['description']);
        $i++;
    }
    return $dataSubjects;
}
function getNameSubject($id)
{
    global $conn;
    $dataSubjects = array();
    $sql= "SELECT name_th FROM subject WHEN id_subject=".$id;
    $res = $conn->query($sql);
    $i=0;
    while ($row = $res->fetch(PDO::FETCH_ASSOC))
    {
        $dataSubjects[$i] = array($row['name_th']);

    }
    return $dataSubjects;
}

//<---------------------------------------------------------------->
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
            "subject_code"=>$obResult['subject_code'],
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
function getAllUser(){
    global $conn;
    $sql = "SELECT * FROM member";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_member"=>$obResult['id_member'],
            "username"=>$obResult['username'],
            "password"=>$obResult['password'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname'],
            "tel"=>$obResult['tel'],
            "email"=>$obResult['email'],
            "type_user"=>$obResult['type_user']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getLastComment(){
    global $conn;
    $sql = "SELECT * FROM member INNER JOIN (comment INNER JOIN subject ON comment.id_subject = subject.id_subject) ON member.id_member=comment.id_user ORDER BY date_time DESC LIMIT 5";
    $res = $conn->query($sql);
    $resultArray = array();
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
            "name_th"=>$obResult['name_th'],
            "subject_code"=>$obResult['subject_code'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
?>
