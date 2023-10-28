<?php
class Order extends Model{
    var $id;
    var $name;
    var $desc;
    var $status;

    public function get(){
        $SQL = "SELECT * FROM list";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Order');
        return $stmt->fetchAll();
    }

    public function edit(){
        $SQL = "UPDATE list SET name=:name, description=:description, status=:status WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$this->id,
                        'name'=>$this->name,
                        'description'=>$this->desc,
                        'status'=>$this->status]);
        return $stmt->rowCount();
    }

    public function find($id){
        $SQL = "SELECT * FROM list WHERE id=:id";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Order');
        return $stmt->fetch();
    }

}




?>