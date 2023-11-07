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

    public function edit($id) {
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
                $items = $this->model('car')->get();
                $this->view('car/index', ['cars'=>$items]);
        }
}

    public function buy($id) {
        $theNewCar = $this->model('Car')->find($id);
        $this->view("car/buy", $theNewCar);
    }

    public function create(){
        $this->view('car/create');
    }
}
?>
