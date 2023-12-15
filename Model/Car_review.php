<?php
class Car_review extends Model{
    var $id;
    var $car_id;
    var $review_id;
    var $user_id;
    var $comment;

   public function add(){
    $sql = "INSERT INTO car_review (id, car_id, review_id, user_id, comment) VALUES(:id, :car_id, :review_id, :user_id, :comment)";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$this->id,
                    'car_id'=>$this->car_id,
                    'review_id'=>$this->review_id,
                    'user_id'=>$this->user_id,
                    'comment'=>$this->comment]);
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

   public function getAll(){
    $sql = "SELECT car_review.id,car_review.review_id, comment, username, car_review.user_id, car_id, make, model, stars, term FROM car_review JOIN car ON car_review.car_id = car.id
    JOIN user ON car_review.user_id = user.id
    Join review ON car_review.review_id = review.id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute([]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Car_review');
    return $stmt->fetchAll();
   }

   public function avg($id){
    $sql = "SELECT avg(stars) as avg FROM car_review JOIN car ON car_review.car_id = car.id
    JOIN user ON car_review.user_id = user.id
    Join review ON car_review.review_id = review.id WHERE car.id = :id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Car_review');
    return $stmt->fetch();
   }

   public function mine(){
    $sql = "SELECT car_review.id,car_review.review_id, comment, username, car_review.user_id, car_id, make, model, stars, term FROM car_review JOIN car ON car_review.car_id = car.id
    JOIN user ON car_review.user_id = user.id
    Join review ON car_review.review_id = review.id WHERE car_review.user_id = :id";
    $stmt = self::$_conn->prepare($sql);
    $stmt->execute(['id'=>$_SESSION['id']]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Car_review');
    return $stmt->fetchAll();
   }
}   
?>