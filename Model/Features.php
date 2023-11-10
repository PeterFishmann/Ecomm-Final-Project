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



    
}



?>