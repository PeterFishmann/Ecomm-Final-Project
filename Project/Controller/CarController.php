<?php
class CarController extends Controller {
    public function index() {
        $items = $this->model('car')->get();
        if(!isset($_POST['filter'])){
            $this->view('car/index', ['cars'=>$items]);
        }else{
                $trim = explode(" ", $_POST['search']);
                $status = isset($_POST['US']) ? $_POST['US'] : "";
                if(count($trim) == 2){
                    if($this->model('car')->findModel($trim[0],$trim[1],$_POST['minYEAR'],$_POST['maxYEAR'],$_POST['min'],$_POST['max'], $_POST['color'], $_POST['color'], $status)){
                        $items = $this->model('car')->findModel($trim[0],$trim[1],$_POST['minYEAR'],$_POST['maxYEAR'],$_POST['min'],$_POST['max'], $_POST['color'], $_POST['color'], $status);
                        $this->view("car/index", ['cars'=>$items]);
                    }else{
                        if($this->model('car')->findModel($trim[1],$trim[0],$_POST['minYEAR'],$_POST['maxYEAR'],$_POST['min'],$_POST['max'], $_POST['color'], $_POST['color'], $status)){
                            $items = $this->model('car')->findModel($trim[1],$trim[0],$_POST['minYEAR'],$_POST['maxYEAR'],$_POST['min'],$_POST['max'], $_POST['color'], $_POST['color'], $status);
                            $this->view("car/index", ['cars'=>$items]);
                        }else{
                            $this->view("car/index", "Nothing found with the inputted filters");
                        }
                    }
                }else if(count($trim) == 1){
                    if($this->model('car')->findCar($_POST['search'],$_POST['minYEAR'],$_POST['maxYEAR'],$_POST['min'],$_POST['max'], $_POST['color'], $_POST['color'], $status)){
                        $items = $this->model('car')->findCar($_POST['search'],$_POST['minYEAR'],$_POST['maxYEAR'],$_POST['min'],$_POST['max'], $_POST['color'], $_POST['color'], $status);
                        $this->view("car/index", ['cars'=>$items]);
                    }else{
                        $this->view("car/index", "Nothing found with the inputted filters");
                    }
                }else{
                    $this->view("car/index", "Nothing found with the inputted filters");
                } 
                
            }
    }

    public function edit($id = 0) {
        if(isset($_SESSION['username']) && $_SESSION['right'] != "Buyer"){
        if($id>0 && $this->model('Car')->find($id)){
            $theNewCar = $this->model('Car')->find($id);
            if (isset($_POST['submit']) && $theNewCar) {
                $theNewCar->make = !empty($_POST['make']) ? $_POST['make'] : $theNewCar->make;
                $theNewCar->model = !empty($_POST['model']) ? $_POST['model'] : $theNewCar->model;
                $theNewCar->year = !empty($_POST['year']) ? $_POST['year'] : $theNewCar->year;
                $theNewCar->distance = !empty($_POST['dist']) ? $_POST['dist'] : "0";
                $theNewCar->features = !empty($_POST['vin']) ? $_POST['vin'] : $theNewCar->features;
                $theNewCar->status = !empty($_POST['rd']) ? $_POST['rd'] : "Used";
                $theNewCar->picture = !empty($_POST['pic']) ? $_POST['pic'] : "NoImage.png";
                $theNewCar->ext_col = !empty($_POST['ext']) ? $_POST['ext'] : $theNewCar->ext_col;
                $theNewCar->int_col = !empty($_POST['int']) ? $_POST['int'] : $theNewCar->int_col;
                $theNewCar->price = !empty($_POST['price']) ? $_POST['price'] : $theNewCar->price;
                $theNewCar->update();
                header('location:/car/index');
            } else{
                $this->view("car/edit", $theNewCar);
            }
        }else{
            header('location:/car/index');
        }
    }else{
            header('location:/user/login');
    }
}

    public function buy($id) {
        $theNewCar = $this->model('Car')->find($id);
        $this->view("car/buy", $theNewCar);
    }

    public function create(){
        if(isset($_SESSION['username']) && $_SESSION['right'] != "Buyer"){
            if(isset($_POST['insert'])){
                if(!empty($_POST['make']) && !empty($_POST['model']) && !empty($_POST['year']) && !empty($_POST['price']) && !empty($_POST['ext']) && !empty($_POST['int'])){
                $NewCar = $this->model('car');
                $NewCar->user_id = $_SESSION['id'];
                $NewCar->make = $_POST['make'];
                $NewCar->model = $_POST['model'];
                $NewCar->year = $_POST['year'];
                $NewCar->distance = empty($_POST['dist']) ? 0 : $_POST['dist'];
                $NewCar->int_col = $_POST['int'];
                $NewCar->ext_col = $_POST['ext'];
                $NewCar->price = $_POST['price'];
                $NewCar->status = $_POST['rd'];
                $NewCar->picture = empty($_POST['pic']) ? "NoImage.png" : $_POST['pic'];
                $NewCar->create();
                header('location: /car/addFeature');
            }else{
                $this->view('car/create', "Please fill every field to be able to create a car!");
            }
            }else{
                $this->view('car/create');
            }
        }else{
            header('location: /car/index');
        }
    }

    public function addFeature(){
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
                $this->view("car/addFeature",['features'=>$features]);
            }
        }else{
            header('location: /car/index');
        }
    }

    public function delete($id = 0){
        if(isset($_SESSION['username']) && $_SESSION['right'] == "Admin" || ($_SESSION['right'] == "Seller" && $_SESSION['id']==$this->model('car')->findIdUser($id,$_SESSION['id'])->user_id)){
            if($id>0 && $this->model('Car')->find($id)){
                $car = $this->model('car_features')->remove($id);
                $car = $this->model('car')->delete($id);
                header("location: /car/index");
            }else{
                header("location: /car/index");
            }
        }else{
            header("location: /user/login");
        }
    }

    public function detail($id = 0){
        $car = $this->model('car')->find($id);
        $this->view("car/detail",$car);
    }
}
?>
