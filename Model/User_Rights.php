<?php
class User_Rights extends Model{
    var $id;
    var $user_id;
    var $rights_id;

    public function insert(){
        $sql = "INSERT INTO user_rights (id,  user_id, rights_id) VALUES (:id, :user_id, :rights_id)";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$this->id,
                        'user_id'=>$this->user_id,
                        'rights_id'=>$this->rights_id]);
        return $stmt;
    }




}




?>