<?php
class Car extends Model{
    var $seller_id;
    var $make;
    var $model;
    var $year;
    var $ext_color;
    var $int_color;
    var $price;
    var $distance;
    var $VIN;
    var $status;
    var $picture;

    public function get(){
        $SQL = "SELECT * FROM cars";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

    public function update(){
        $SQL = "UPDATE cars SET seller_id=:seller_id, make=:make, model=:model, year=:year, ext_color=:ext_color, int_color=:int_color, price=:price, dist_traveled=:dist_traveled, VIN=:VIN,status=:status, picture=:picture WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'seller_id'=>$this->seller_id,
                        'make'=>$this->make,
                        'model'=>$this->model,
                        'year'=>$this->year,
                        'ext_color'=>$this->ext_color,
                        'int_color'=>$this->int_color,
                        'price'=>$this->price,
                        'dist_traveled'=>$this->distance,
                        'VIN'=>$this->VIN,
                        'status'=>$this->status,
                        'picture'=>$this->picture]);
        return $stmt->rowCount();
    }

    public function find($id){
        $SQL = "SELECT * FROM cars WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetch();
    }

}




?>