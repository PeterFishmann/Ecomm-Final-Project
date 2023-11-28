<?php
class Car_review extends Model{
    var $id;
    var $car_id;
    var $review_id;
    var $user_id;

   public function add(){
    $sql = "INSERT INTO car_review (id, car_id, review_id, user_id) VALUES(:id, :car_id, :review_id, :user_id)";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$this->id,
                    'car_id'=>$this->car_id,
                    'review_id'=>$this->review_id,
                    'user_id'=>$this->user_id]);
    return $stmt;
   }

   public function delete($id){
    $sql = "DELETE FROM car_review WHERE id=:id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return $stmt;
   }

   public function update(){
    $sql = "UPDATE car_review SET review_id = :review_id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['review_id'=>$this->review_id]);
    return $stmt;
   }
}   
?>