<?php
class CarController extends Controller{
    public function index(){
        $items = $this->model('car')->get();
        if(!isset($_POST['sch'])){
            $this->view('car/index', ['cars'=>$items]);
        }else{
                $trim = explode(" ", $_POST['search']);
                if(count($trim) == 2){
                    if($this->model('car')->findModel($trim[0],$trim[1])){
                        $items = $this->model('car')->findModel($trim[0],$trim[1]);
                        $this->view("car/index", ['cars'=>$items]);
                    }else{
                        $items = $this->model('car')->findModel($trim[1],$trim[0]);
                        $this->view("car/index", ['cars'=>$items]);
                    }
                }else if(count($trim) == 1){
                    $items = $this->model('car')->findCar($_POST['search']);
                    $this->view("car/index", ['cars'=>$items]);
                }else{
                    $this->view("car/index", ['cars'=>array()]);
                }
                
            }
    }
    public function edit($id){
        $theNewCar = $this->model('Car')->find($id);
        if(isset($_POST['submit'])){
            $theNewCar->seller_id = $_POST['seller'];
            $theNewCar->make = $_POST['make'];
            $theNewCar->model = $_POST['model'];
            $theNewCar->year = $_POST['year'];
            $theNewCar->distance = $_POST['dist'];
            $theNewCar->features = $_POST['vin'];
            $theNewCar->status = $_POST['rd'];
            $theNewCar->picture = $_POST['pic'];
            $theNewCar->ext_col = $_POST['ext'];
            $theNewCar->int_col = $_POST['int'];
            $theNewCar->price = $_POST['price'];
            $theNewCar->update();
            header('location:/car/index');
        }else{
            $this->view('car/edit', $theNewCar);
        }
    }
    public function buy($id){
        $theNewCar = $this->model('Car')->find($id);
        $this->view("car/buy", $theNewCar);
    }
}
?>