<?php
class Comment extends Model{
    var $id;
    var $user_id;
    var $comment;
    var $date;
    var $car_id;
    var $receiver;

    public function add(){
        $sql = "INSERT INTO comment (id,user_id,comment,date,car_id, receiver) VALUES (:id,:user_id,:comment,:date,:car_id, :receiver)";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$this->id,
                        'user_id'=>$this->user_id,
                        'comment'=>$this->comment,
                        'date'=>$this->date,
                        'car_id'=>$this->car_id,
                        'receiver'=>$this->receiver]);
        return $stmt;
    }
    public function delete(){
        $sql = "DELETE FROM comment WHERE id=:id";
        $stmt = self::$_conn->prepare($sql);

    }
    public function edit(){

    }

    public function find(){
        $sql = "SELECT comment.id, username, comment, date,car.make, car.model,comment.car_id FROM comment join user on comment.user_id = user.id join car on comment.car_id = car.id WHERE receiver = :rec";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['rec'=>$_SESSION['username']]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Comment');
        return $stmt->fetchAll();
    }
    public function viewAll(){
        $sql = "SELECT comment.id, username, comment, date,car.make, car.model, receiver FROM comment join user on comment.user_id = user.id join car on comment.car_id = car.id";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute([]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Comment');
        return $stmt->fetchAll();
    }

    public function findById($id){
        $sql = "SELECT comment.id, comment.user_id, username, comment, date,car.make, car.model,comment.car_id FROM comment join user on comment.user_id = user.id join car on comment.car_id = car.id WHERE comment.id = :id";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Comment');
        return $stmt->fetch();
    }
}
?>