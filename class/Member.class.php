<?php

/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 22/2/2560
 * Time: 23:35
 */
class Member
{
    private $id;
    private $username;
    private $password;
    private $name;
    private $surname;
    private $tel;
    private $email;
    private $type_user;
    private $path_img;

    /**
     * Member constructor.
     * @param $id
     * @param $username
     * @param $password
     * @param $name
     * @param $surname
     * @param $tel
     * @param $email
     * @param $type_user
     * @param $id_img
     */
    public function __construct($id, $username, $password, $name, $surname, $tel, $email, $type_user, $path_img)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->tel = $tel;
        $this->email = $email;
        $this->type_user = $type_user;
        $this->path_img = $path_img;
    }


    public  function __toString()
    {
        return $this->name." ".$this->surname;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTypeUser()
    {
        return $this->type_user;
    }

    /**
     * @param mixed $type_user
     */
    public function setTypeUser($type_user)
    {
        $this->type_user = $type_user;
    }

    /**
     * @return mixed
     */
    public function getPathImg()
    {
        return $this->path_img;
    }

    /**
     * @param mixed $id_img
     */
    public function setPathImg($path_img)
    {
        $this->path_img = $path_img;
    }


}