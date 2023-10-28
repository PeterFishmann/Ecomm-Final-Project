<?php
class User extends Model{
    var $id;
    var $username;
    var $email;
    var $password;

    public function get(){
        $SQL = "SELECT * FROM users";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetchAll();
    }

    public function edit(){
        $SQL = "UPDATE users SET username=:username, email=:email WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'username'=>$this->username,
                        'email'=>$this->email]);
        return $stmt->rowCount();
    }

    public function find($id){
        $SQL = "SELECT * FROM users WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetch();
    }

    public function findUsername($username){
        $SQL = "SELECT * FROM users WHERE username=:username";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['username'=>$username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetch();
    }

    public function findEmail($email){
        $SQL = "SELECT * FROM users WHERE email=:email";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['email'=>$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetch();
    }


    public function create(){
        $sql = "INSERT INTO users (id, username, email, password) VALUES (:id, :username, :email, :password)";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$this->id,
                        'username'=>$this->username,
                        'email'=>$this->email,
                        'password'=>$this->password]);
        return $stmt;
    }
}




?>