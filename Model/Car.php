<?php
class Car extends Model{
    var $id;
    var $user_id;
    var $make;
    var $model;
    var $year;
    var $ext_col;
    var $int_col;
    var $price;
    var $distance;
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
        $SQL = "UPDATE car SET user_id = :user_id, make=:make, model=:model, year=:year, ext_col=:ext_col, int_col=:int_col, price=:price, distance=:distance,status=:status, picture=:picture WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'user_id'=>$this->user_id,
                        'make'=>$this->make,
                        'model'=>$this->model,
                        'year'=>$this->year,
                        'ext_col'=>$this->ext_col,
                        'int_col'=>$this->int_col,
                        'price'=>$this->price,
                        'distance'=>$this->distance,
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

    public function findByUser($id){
        $SQL = "SELECT * FROM car WHERE user_id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

    public function findIdUser($id, $uID){
        $SQL = "SELECT * FROM car WHERE user_id=:user_id AND id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id,
                        'user_id'=>$uID]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetch();
    }

    public function findCar($make,$minYear,$maxYear,$minDistance, $maxDistance, $int, $ext, $stat){
        $SQL = "SELECT * FROM car WHERE (make like :make OR model like :make) AND (year >= :year AND year <= :Year) AND (distance >= :distance AND distance <= :Distance) AND (int_col like :color OR ext_col like :Color) AND (status like :status)";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['make'=>'%'.$make.'%',
                        'year'=>$minYear,
                        'Year'=>$maxYear,
                        'distance'=>$minDistance,
                        'Distance'=>$maxDistance,
                        'color'=>'%'.$int.'%',
                        'Color'=>'%'.$ext.'%',
                        'status'=>'%'.$stat.'%']);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

    public function findModel($make, $model,$minYear,$maxYear,$minDistance, $maxDistance, $int,$ext, $stat){
        $SQL = "SELECT * FROM car WHERE (make like :make AND model like :model) AND (year >= :year AND year <= :Year) AND (distance >= :distance AND distance <= :Distance) AND (int_col like :color OR ext_col like :Color) AND (status like :status)";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['make'=>'%'.$make.'%',
                        'model'=>'%'.$model.'%',
                        'year'=>$minYear,
                        'Year'=>$maxYear,
                        'distance'=>$minDistance,
                        'Distance'=>$maxDistance,
                        'color'=>'%'.$int.'%',
                        'Color'=>'%'.$ext.'%',
                        'status'=>'%'.$stat.'%']);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

    public function findDesc($id){
        $sql = "SELECT * FROM car WHERE user_id = :id ORDER BY id DESC";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

    public function create(){
        $sql = "INSERT INTO car (id, user_id, make, model, year, distance, ext_col, int_col, status, price, picture) VALUES (:id, :user_id, :make, :model, :year, :distance, :ext_col, :int_col, :status, :price, :picture)";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$this->id,
                        'user_id'=>$this->user_id,
                        'make'=>$this->make,
                        'model'=>$this->model,
                        'year'=>$this->year,
                        'ext_col'=>$this->ext_col,
                        'int_col'=>$this->int_col,
                        'price'=>$this->price,
                        'distance'=>$this->distance,
                        'status'=>$this->status,
                        'picture'=>$this->picture]);
        return $stmt;
    }

    public function delete($id){
        $sql = "DELETE FROM car WHERE id = :id";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt;
    }

    public function findEverything($id){
        $SQL = "SELECT * FROM car JOIN car_features ON car.id = car_features.car_id JOIN features ON car_features.feature_id = features.id WHERE car.id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Car');
        return $stmt->fetchAll();
    }

}




?>