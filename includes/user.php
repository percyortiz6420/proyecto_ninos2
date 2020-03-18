<?php

include_once 'db.php';

class user extends DB{
    private $username;
    private $privilegio;

    public function userExist($user,$pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE usuario= :user AND contrasena= :pass');
        $query ->execute(['user'=>$user,'pass'=>$md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE usuario= :user');
        $query ->execute(['user'=>$user]);

        foreach ($query as $currenUser) {
            $this->username = $currenUser['id'];
            $this->privilegio = $currenUser['id_servidor'];  
        }
    }

    public function getNombre(){
        return $this->username;
    }
    public function getUsername()
    {
        return $this->privilegio;
    }
}


?>