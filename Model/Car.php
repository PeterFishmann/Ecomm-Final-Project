<?php
class Car extends Model{
    var $seller_id;
    var $make;
    var $model;
    var $year;
    var $ext_col;
    var $int_col;
    var $price;
    var $distance;
    var $features;
    var $status;
    var $picture;

    public function get(){
        $SQL = "SELECT * FROM car";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

    public function update(){
        $SQL = "UPDATE car SET seller_id=:seller_id, make=:make, model=:model, year=:year, ext_col=:ext_col, int_col=:int_col, price=:price, distance=:distance, features=:features,status=:status, picture=:picture WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'seller_id'=>$this->seller_id,
                        'make'=>$this->make,
                        'model'=>$this->model,
                        'year'=>$this->year,
                        'ext_col'=>$this->ext_col,
                        'int_col'=>$this->int_col,
                        'price'=>$this->price,
                        'distance'=>$this->distance,
                        'features'=>$this->features,
                        'status'=>$this->status,
                        'picture'=>$this->picture]);
        return $stmt->rowCount();
    }

    public function find($id){
        $SQL = "SELECT * FROM car WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetch();
    }

    public function findCar($make){
        $SQL = "SELECT * FROM car WHERE make like :make OR model like :make";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['make'=>'%'.$make.'%']);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

    public function findModel($make, $model){
        $SQL = "SELECT * FROM car WHERE make like :make AND model like :model";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['make'=>'%'.$make.'%',
                        'model'=>'%'.$model.'%']);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }
}




?>