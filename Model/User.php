<?php
class User extends Model{
    var $id;
    var $username;
    var $email;
    var $password;
    var $lname;
    var $fname;
    var $phone;
    var $picture;

    public function get(){
        $SQL = "SELECT * FROM user";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetchAll();
    }

    public function edit(){
        $SQL = "UPDATE user SET username=:username, email=:email WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'username'=>$this->username,
                        'email'=>$this->email]);
        return $stmt->rowCount();
    }

    public function find($id){
        $SQL = "SELECT * FROM user WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetch();
    }

    public function findUsername($username){
        $SQL = "SELECT * FROM user WHERE username=:username";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['username'=>$username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetch();
    }

    public function findEmail($email){
        $SQL = "SELECT * FROM user WHERE email=:email";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['email'=>$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetch();
    }


    public function create(){
        $sql = "INSERT INTO user (id, username,fname, lname, email, password,phone, picture) VALUES (:id, :username, :fname, :lname, :email, :password, :phone, :picture)";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$this->id,
                        'username'=>$this->username,
                        'fname'=>$this->fname,
                        'lname'=>$this->lname,
                        'email'=>$this->email,
                        'password'=>$this->password,
                        'phone'=>$this->phone,
                        'picture'=>$this->picture]);
        return $stmt;
    }
    public function findRight($id){
        $sql = "SELECT rights FROM user JOIN user_rights ON user.id = user_rights.user_id JOIN rights ON user_rights.rights_id = rights.id WHERE user.id = :id";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetch();
    }

    public function findBuyer(){
        $sql = "SELECT user.id, username, email, phone, fname, lname, picture FROM user JOIN user_rights ON user.id = user_rights.user_id JOIN rights ON user_rights.rights_id = rights.id WHERE rights.rights = 'Buyer'";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute([]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetchAll();
    }

    public function findSeller(){
        $sql = "SELECT user.id, username, email, phone, fname, lname, picture FROM user JOIN user_rights ON user.id = user_rights.user_id JOIN rights ON user_rights.rights_id = rights.id WHERE rights.rights = 'Seller'";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute([]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetchAll();
    }
    public function All($id){
        $sql = "SELECT * FROM user WHERE id != :id";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        return $stmt->fetchAll();
    }
}
?>