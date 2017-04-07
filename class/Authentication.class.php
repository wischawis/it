<?php

/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 22/2/2560
 * Time: 23:33
 */
require_once "../config.inc.php";
require_once "Member.class.php";
class Authentication
{
    public static function login($username,$password){
        global $conn;
        $sql = "SELECT * FROM member WHERE username='$username' and password='$password'";
        $result = $conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            return new Member($row['id_member'],$row['username'],$row['password'],$row['name'],$row['surname'],$row['tel'],$row['email'],$row['type_user'],$row['id_img']);
        }
        else{
            return null;
        }
    }
    public static function logout($t_user){
        unset($t_user);
    }
}