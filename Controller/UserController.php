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
        if(isset($_SESSION['username'])){
            $User = $this->model('user')->find($_SESSION['id']);
            $this->view('user/index',['users'=>$User]);
            header("location: /user/index");
        }else{
        if(isset($_POST['login'])){
            $newUser = $this->model('User')->findUsername($_POST['username']);
            $right = $this->model('User')->findRight($newUser->id);
            if($newUser!=null && password_verify($_POST['password'],$newUser->password)){
                $_SESSION['id'] = $newUser->id;
                $_SESSION['username'] = $newUser->username;
                $_SESSION['email'] = $newUser->email;
                $_SESSION['right'] = $right->rights;
                $_SESSION['picture'] = $newUser->picture;
                header('location:/user/index');
            }else{
                $this->view('user/login', 'Incorrect username/password combination!');
            }
        }else{
            $this->view('user/login');
        }
        }
    }


    public function loginEmail(){
        if(isset($_SESSION['username'])){
            $User = $this->model('user')->find($_SESSION['id']);
            $this->view('user/index',['users'=>$User]);
            header("location: /user/index");
        }else{
        if(isset($_POST['loginEmail'])){
            $newUser = $this->model('User')->findEmail($_POST['email']);
            $right = $this->model('User')->findRight($newUser->id);
            if($newUser!=null && password_verify($_POST['password'],$newUser->password)){
                $_SESSION['id'] = $newUser->id;
                $_SESSION['username'] = $newUser->username;
                $_SESSION['email'] = $newUser->email;
                $_SESSION['right'] = $right->rights;
                $_SESSION['picture'] = $newUser->picture;
                header('location:/user/index');
            }else{
                $this->view('user/loginEmail', 'Incorrect email/password combination!');
            }
        }else{
            $this->view('user/loginEmail');
        }
    }
    }

    public function update($id=0){
        if(isset($_SESSION['username'])){
            $id = $_SESSION['id'];
            $theNewUser = $this->model('User')->find($id);
        if(isset($_POST['edit'])){
            $theNewUser->username = isset($_POST['username']) ? $_POST['username'] : $theNewUser->username;
            $theNewUser->email = isset($_POST['email']) ? $_POST['email'] : $theNewUser->email;
            $theNewUser->edit();
            $_SESSION['username'] = $theNewUser->username;
            $_SESSION['email'] = $theNewUser->email;
            header('location:/user/index');
        }else{
            $this->view('user/update', $theNewUser);
        }
        }else{
            $this->view('user/login', "You're not logged in. Please login to proceed");
        }
    }
    public function register(){
        if(isset($_SESSION['username'])){
            $User = $this->model('user')->find($_SESSION['id']);
            $this->view('user/index',['users'=>$User]);
            header("location: /user/index");
        }else{
        if(isset($_POST['register'])){
            $newUser = $this->model('User');
            $newRight = $this->model('User_Rights');
            $theUser = $newUser->findUsername($_POST['username']);
            $theUser1 = $newUser->findEmail($_POST['email']);
            if($theUser == null && $theUser1 == null && $_POST['password'] == $_POST['Confpassword'] && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['password'])){
                    $newUser->username = $_POST['username'];
                    $newUser->email = $_POST['email'];
                    $newUser->phone = $_POST['phone'];
                    $newUser->fname = $_POST['fname'];
                    $newUser->lname = $_POST['lname'];
                    $newRight->rights_id = $_POST['right'];
                    $newUser->picture = $_FILES['profPic']['name']; 
                    $newUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    var_dump($newUser);
                    $newUser->create();
                    $id = $newUser->findUsername($_POST['username']);
                    $newRight->user_id = $id->id;
                    $newRight->insert();
                    header('location:/user/login');
            }
            $this->view('user/register', 'Wrong username, passwords did not match and not all fields are filled!');
        }else{
            $this->view('user/register');
            }
        }
    }
    
    public function logout(){
        session_destroy();
        header("location: /user/login");
    }
}