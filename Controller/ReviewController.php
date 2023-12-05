<?php
class ReviewController extends Controller{
    public function index(){
        $review = $this->model('review')->view();
        $this->view('review/index',['review'=>$review]);
    }
    
    public function insert(){
        if(isset($_SESSION['username'])){
            if($_SESSION['right'] == "Admin"){
                $rev = $this->model('review');
                $review = $this->model('review')->view();
                if(count($review) <= 5){
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
                    if(isset($_POST['delete'])){
                        $rev = $this->model('review')->delete($_POST['id']);
                        header('location: /review/index');
                    }
                    $this->view('review/edit',$rev);
                }
            }else{
                header('location: /user/index');
            }
        }else{
            header('location: /user/login');
        }
    }
}
?>