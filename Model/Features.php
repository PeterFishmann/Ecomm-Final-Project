<?php
class Features extends Model{
 var $id;
 var $features;
 var $description;


 public function get(){
    $sql = "SELECT * FROM features";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Features');
    return $stmt->fetchAll();
 }
 public function findByFt($features){
    $sql = "SELECT * FROM features WHERE features = :features";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['features'=>$features]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Features');
    return $stmt->fetch();
 }

 public function add(){
   $sql = "INSERT INTO features (id, features, description) VALUES (:id, :features, :description)";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$this->id,
                    'features'=>$this->features,
                    'description'=>$this->description]);
    return $stmt;
 }



    
}



?>