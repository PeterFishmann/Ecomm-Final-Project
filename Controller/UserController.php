<?php
class UserController extends Controller{
    public function index(){
        if(isset($_SESSION['username'])){
            $User = $this->model('user')->find($_SESSION['id']);
            $this->view('user/index',['users'=>$User]);
        }else{
            header("location: /user/login");
        }
    }
    public function login(){
        if(isset($_POST['login'])){
            $newUser = $this->model('User')->findUsername($_POST['username']);
            if($newUser!=null && password_verify($_POST['password'],$newUser->password)){
                $_SESSION['id'] = $newUser->id;
                $_SESSION['username'] = $newUser->username;
                $_SESSION['email'] = $newUser->email;
                header('location:/user/index');
            }else{
                $this->view('user/login', 'Incorrect username/password combination!');
            }
        }else{
            $this->view('user/login');
        }
    }


    public function loginEmail(){
        if(isset($_POST['loginEmail'])){
            $newUser = $this->model('User')->findEmail($_POST['email']);
            if($newUser!=null && password_verify($_POST['password'],$newUser->password)){
                $_SESSION['id'] = $newUser->id;
                $_SESSION['username'] = $newUser->username;
                $_SESSION['email'] = $newUser->email;
                header('location:/user/index');
            }else{
                $this->view('user/loginEmail', 'Incorrect email/password combination!');
            }
        }else{
            $this->view('user/loginEmail');
        }
    }

    public function update($id){
        $theNewUser = $this->model('User')->find($id);
        if(isset($_POST['edit'])){
            $theNewUser->username = $_POST['username'];
            $theNewUser->email = $_POST['email'];
            $theNewUser->edit();
            $_SESSION['username'] = $theNewUser->username;
            $_SESSION['email'] = $theNewUser->email;
            header('location:/user/index');
        }else{
            $this->view('user/update', $theNewUser);
        }
    }
    public function register(){
        if(isset($_POST['register'])){
            $newUser = $this->model('User');
            $theUser = $newUser->findUsername($_POST['username']);
            $theUser1 = $newUser->findEmail($_POST['email']);
            if($theUser == null && $theUser1 == null && $_POST['password'] == $_POST['Confpassword']){
                if(!empty($_POST)){
                    $newUser->username = $_POST['username'];
                    $newUser->email = $_POST['email'];
                    $newUser->phone = $_POST['phone'];
                    $newUser->fname = $_POST['fname'];
                    $newUser->lname = $_POST['lname'];
                    $newUser->password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                    $newUser->create();
                    header('location:/user/login');
                }
            }
            $this->view('user/register', 'Wrong username or passwords did not match!');
        }else{
            $this->view('user/register');
        }
    }
    public function logout(){
        session_destroy();
        header('location:/user/login');
    }
}
?>