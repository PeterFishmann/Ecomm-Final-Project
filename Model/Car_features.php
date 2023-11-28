<?php
class Car_features extends Model{
    var $id;
    var $car_id;
    var $feature_id;

    public function add(){
        $sql = "INSERT INTO car_features (id, car_id, feature_id) VALUES(:id, :car_id, :feature_id)";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$this->id,
                        'car_id'=>$this->car_id,
                        'feature_id'=>$this->feature_id]);
        return $stmt;
    }

    public function remove($car){
        $sql = "DELETE FROM car_features WHERE car_id = :id";
        $stmt = self::$_conn->prepare($sql);
        $stmt->execute(['id'=>$car]);
        return $stmt;
    }

}


?>