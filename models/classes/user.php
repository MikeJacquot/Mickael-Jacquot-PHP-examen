<?php

class User {

    private $id;
    private $username;
    private $password;


    function __construct($id, $username,$password){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;


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




}
