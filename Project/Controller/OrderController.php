<?php
class OrderController extends Controller{
    public function index(){
        $orders = $this->model('order')->get();
        $this->view('order/index', ['order'=>$orders]);
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