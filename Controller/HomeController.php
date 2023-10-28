<?php
class HomeController extends Controller{
    public function index(){
        //$items = $this->model('car')->get();
    $this->view('home/index', [/*'cars'=>$items*/]);
    }
    /*public function detail($id){
        $TheItem = $this->model('Car')->find($id);
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
            header('location:/home/index');
        }else{
            $this->view('home/edit', $theNewCar);
        }
    }*/
}



?>