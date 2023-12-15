<?php
class ReviewController extends Controller{
    public function index(){
        if(isset($_POST['delete'])){
            $rv = $this->model('review')->delete($_POST['id']);
            header("location: /review/index");
        }else{
            $review = $this->model('review')->view();
            $this->view('review/index',['review'=>$review]);
        }
    }
    
    public function insert(){
        if(isset($_SESSION['username'])){
            if($_SESSION['right'] == "Admin"){
                $rev = $this->model('review');
                $review = $this->model('review')->view();
                if(count($review) < 5){
                    if(isset($_POST['add'])){
                        if(!empty($_POST['num']) && !empty($_POST['TRM'])){
                        $rev->stars = intval($_POST['num']);
                        $rev->term = $_POST['TRM'];
                        $rev->add();
                        header('location: /review/index');
                        }else{
                            $this->view('review/add',"Please fill everything before inserting");
                        }
                    }else{
                        $this->view('review/add');
                    }
                }else{
                    header('location: /review/index');
                }
            }else{
                header('location: /user/index');
            }
        }else{
            header('location: /user/login');
        }
    }

    public function edit($id = 0){
        if(isset($_SESSION['username'])){
            if($_SESSION['right'] == "Admin"){
                $rev = $this->model('review')->find($id);
                if(isset($_POST['edit'])){
                    if(!empty($_POST['stars']) && !empty($_POST['term'])){
                        $rev->stars = intval($_POST['stars']);
                        $rev->term = $_POST['term'];
                        $rev->edit();
                        header('location: /review/index');
                    }else{
                        $this->view('review/edit', 'Invalid inputs');
                    }
                }else{
                    $this->view('review/edit',$rev);
                }
            }else{
                header('location: /user/index');
            }
        }else{
            header('location: /user/login');
        }
    }

    public function write($id = 0){
        if(isset($_SESSION['username'])){
            if($id>0 && $this->model('car')->find($id) && $_SESSION['right'] != "Seller"){
                if($this->model('car')->find($id)->user_id != $_SESSION['id']){
                    $rev = $this->model('car_review');
                    if(isset($_POST['write'])){
                        $rev->car_id = $id;
                        $rev->user_id = $_SESSION['id'];
                        $rev->review_id = $_POST['rev'];
                        $rev->comment = $_POST['com'];
                        $rev->add();
                        header("location: /review/index");
                    }else{
                        $rvw = $this->model('review')->view();
                        $this->view("review/leave_review",$rvw);
                    }
                }else{
                    header('location: /user/index');
                }
            }else{
                header('location: /user/index');
            }
        }else{
            header('location: /user/login');
        }
    }

    public function readAll(){
        if(isset($_SESSION['username'])){
            if($_SESSION['right'] == "Admin"){
                $rview = $this->model('car_review')->getAll();
                $this->view("review/readAll",$rview);
            }else{
                header('location: /user/index');
            }
        }else{
            header('location: /user/login');
        }
    }

    public function readMine(){
        if(isset($_SESSION['username'])){
                $rv = $this->model('car_review')->mine();
                $this->view("review/myReview",$rv);
        }else{
            header('location: /user/login');
        }
    }
}
?>