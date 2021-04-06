<?php

class UserManager extends DbManager
{

    function __construct()
    {
        parent::__construct();
    }

    public function getUsers()
    {
        $query = $this->bdd->prepare('SELECT * FROM user');
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    public function getUserById($id)
    {
        $query = $this->bdd->prepare('SELECT * FROM user WHERE id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $res = $query->fetch();
        return $res;
    }

    public function addUser($username, $password)
    {
        try {
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $this->bdd->prepare('INSERT INTO user (username, password) VALUES (?, ?)');
            $query->bindParam(1, $username);
            $query->bindParam(2, $password);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();

        }

    }

//    public function updateUser($id,$user){
//        $query = $this->bdd->prepare('UPDATE user SET username = ? ,password = ? ,avatar = ? WHERE id = ?');
//
//        $query->bindParam(1,$user['username']);
//        $query->bindParam(2,$user['password']);
//        $query->bindParam(3,$user['avatar']);
//        $query->bindParam(4,$id);
//        $query->execute();
//
//    }

    public function checkUser($username, $password)
    {
        $query = $this->bdd->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        $query->execute();
        $result = $query->fetch();

        $error = null;
        $user = null;

        if (!$result) {
            $error = 'Utilisateur inconnu !';
        } else {
            $user = new User($result['id'], $result['username'], $result['password'], $result['avatar']);
        }

        return ['error' => $error, 'user' => $user];

    }
}
