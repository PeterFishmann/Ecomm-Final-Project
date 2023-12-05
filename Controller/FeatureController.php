<?php
class FeatureController extends Controller{

    public function index(){
        if(isset($_SESSION['username']) && $_SESSION['right'] != "Buyer"){
            if(isset($_POST['confirm'])){
                $i = 1;
                while($i<=20){
                    if(isset($_POST["$i"])){
                        $car = $this->model('Car')->findDesc($_SESSION['id']);
                        $id = $this->model('features')->findByFt($_POST["$i"]);
                        $newFeat = $this->model('car_features');
                        $newFeat->car_id = $car[0]->id;
                        $newFeat->feature_id = $id->id;
                        $newFeat->add();
                        header('location: /car/index');
                    }
                    $i++;
                }
            }else{
                $features = $this->model('Features')->get();
                $this->view("feature/index",['features'=>$features]);
            }
        }else{
            header('location: /user/login');
        }
    }

    public function add(){
        if(isset($_SESSION['username']) && $_SESSION['right'] != "Buyer"){
        if(isset($_POST['add'])){
           $newFeat = $this->model('features');
           $newFeat->features = $_POST['feat'];
           $newFeat->description = $_POST['desc'];
           $newFeat->add();
           header('location: /feature/index');
        }else{
            $this->view('feature/add');
            }
        }else{
            header('location: /car/index');
        }
    }
}
?>