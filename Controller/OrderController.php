<?php
class OrderController extends Controller{
    public function index(){
        $orders = $this->model('order')->findUser($_SESSION['id']);
        $this->view('order/index', ['order'=>$orders]);
    }

    public function insert($id=0){
        if(!isset($_POST['Add'])){
            $car = $this->model('car')->find($id);
            $this->view('order/insert',$car);
        }else{
            if($this->model('order')->findCar($id, $_SESSION['id']) == null){
                $car = $this->model('car')->find($id);
                $newOrder = $this->model('order');
                $newOrder->user_id = $_SESSION['id'];
                $newOrder->car_id = intval($id);
                $newOrder->status = "In process";
                $newOrder->price = $car->price;
                $newOrder->add();
                header('location: /order/index');
            }else{
                header('location: /order/insert/'.$id);
            }
            
        }
    }

    public function detail($id=0){
        $feat = $this->model('car')->findEverything($id);
        $this->view('order/detail',['feat'=>$feat]);
    }

    public function update($id){
        $theNewOrder = $this->model('Order')->find($id);
        if(isset($_POST['edit'])){
            $theNewOrder->name = $_POST['name'];
            $theNewOrder->desc = $_POST['description'];
            $theNewOrder->status = $_POST['status'];
            $theNewOrder->edit();
            header('location:/order/index');
        }else{
            $this->view('order/update', $theNewOrder);
        }
    }
}
?>