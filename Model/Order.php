<?php
class Order extends Model{
    var $id;
    var $user_id;
    var $car_id;
    var $status;
    var $price;

    public function get(){
        $SQL = "SELECT * FROM orders";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Order');
        return $stmt->fetchAll();
    }

    public function add(){
        $SQL = "INSERT INTO orders (id,user_id,car_id,status,price) VALUES (:id,:user_id,:car_id,:status,:price)";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'user_id'=>$this->user_id,
                        'car_id'=>$this->car_id,
                        'status'=>$this->status,
                        'price'=>$this->price]);
        return $stmt;
    }

    /*public function edit(){
        $SQL = "UPDATE orders SET name=:name, description=:description, status=:status WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'name'=>$this->name,
                        'description'=>$this->desc,
                        'status'=>$this->status]);
        return $stmt->rowCount();
    }*/

    public function findUser($id){
        $SQL = "SELECT * FROM orders WHERE user_id = :id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Order');
        return $stmt->fetchAll();
    }

    public function find($id){
        $SQL = "SELECT * FROM orders WHERE id = :id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Order');
        return $stmt->fetch();
    }

    public function findCar($id){
        $SQL = "SELECT * FROM orders WHERE car_id = :id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Order');
        return $stmt->fetchAll();
    }
}




?>