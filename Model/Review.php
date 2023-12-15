<?php
class Review extends Model{

var $id;
var $stars;
var $term;

public function delete($id){
    $sql = "DELETE FROM review WHERE id=:id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return $stmt;
}

public function edit(){
    $sql = "UPDATE review SET stars=:stars, term=:term WHERE id=:id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$this->id,
                    'stars'=>$this->stars,
                    'term'=>$this->term]);
    return $stmt;
}

public function view(){
    $sql = "SELECT * FROM review ORDER BY stars asc";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute([]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Review');
    return $stmt->fetchAll();
}

public function add(){
    $sql = "INSERT INTO review (id,stars,term) VALUES (:id,:stars,:term)";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$this->id,
                    'stars'=>$this->stars,
                    'term'=>$this->term]);
    return $stmt;
}
public function find($id){
    $sql = "SELECT * FROM review WHERE id=:id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Review');
    return $stmt->fetch();
}
}
?>