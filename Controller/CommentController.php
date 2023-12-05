<?php
class CommentController extends Controller{
    public function index(){
        $this->view('comment/index');
    }
    
    public function insert($id = 0){
        $car = $this->model('Car')->find($id);
        $user = $this->model('User')->find($car->user_id);
        if($car->user_id != $_SESSION['id']){
            if(isset($_POST['com'])){
            if(!empty($_POST['comment'])){
                $com = $this->model('Comment');
                $com->user_id = $_SESSION['id'];
                $com->comment = $_POST['comment'];
                $com->date = $_POST['date'];
                $com->car_id = $car->id;
                $com->receiver = $user->username;
                $com->add();
                header('location: /comment/index');
            }else{
                $this->view('comment/add','You must write a comment.');
            }
        }else{
            $this->view('comment/add',[$car,$user]);
        }
        }else{
            header('location: /comment/index');
        }
    }

    public function ReadAll(){
        $com = $this->model('comment')->viewAll();
        $this->view('comment/readAll',['comment'=>$com]);
    }

    public function viewComments(){
        $com = $this->model('comment')->find();
        $this->view('comment/myComments',['com'=>$com]);
    }
    public function reply($id = 0){
        if(isset($_SESSION['username'])){
            $com = $this->model('comment')->find();
            if(count($com)>0 && $_SESSION['right'] != "Buyer"){
                $userCom = $this->model('Comment')->findById($id);
                $this->view('comment/reply',$userCom);
            }else{
                header('location: /comment/index');
            }
        }else{
            header('location: /user/login');
        }
    }
}
?>