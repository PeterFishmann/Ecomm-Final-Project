<?php
class CarController extends Controller{
    public function index(){
        $items = $this->model('car')->get();
        $this->view('car/index', ['cars'=>$items]);
    }
    public function edit($id){
        $theNewCar = $this->model('Car')->find($id);
        if(isset($_POST['submit'])){
            $theNewCar->seller_id = $_POST['seller'];
            $theNewCar->make = $_POST['make'];
            $theNewCar->model = $_POST['model'];
            $theNewCar->year = $_POST['year'];
            $theNewCar->distance = $_POST['dist'];
            $theNewCar->VIN = $_POST['vin'];
            $theNewCar->status = $_POST['rd'];
            $theNewCar->picture = $_POST['pic'];
            $theNewCar->ext_color = $_POST['ext'];
            $theNewCar->int_color = $_POST['int'];
            $theNewCar->price = $_POST['price'];
            $theNewCar->update();
            header('location:/car/index');
        }else{
            $this->view('car/edit', $theNewCar);
        }
    }
}
?>