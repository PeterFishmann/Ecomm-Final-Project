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
            if($newUser!=null && $newUser->access == "Yes" && password_verify($_POST['password'],$newUser->password)){
                $right = $this->model('User')->findRight($newUser->id);
                $_SESSION['id'] = $newUser->id;
                $_SESSION['username'] = $newUser->username;
                $_SESSION['email'] = $newUser->email;
                $_SESSION['right'] = $right->rights;
                $_SESSION['picture'] = $newUser->picture;
                header('location:/user/index');
            }else{
                if(!empty($newUser) && $newUser->access == "No" && password_verify($_POST['password'],$newUser->password)){
                      $this->view('user/login', 'Your account is blocked by the administration');
                }else{
                      $this->view('user/login', 'Incorrect username/password combination!');
                }
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
            if($newUser!=null && $newUser->access == "Yes" && password_verify($_POST['password'],$newUser->password)){
                $right = $this->model('User')->findRight($newUser->id);
                $_SESSION['id'] = $newUser->id;
                $_SESSION['username'] = $newUser->username;
                $_SESSION['email'] = $newUser->email;
                $_SESSION['right'] = $right->rights;
                $_SESSION['picture'] = $newUser->picture;
                header('location:/user/index');
            }else{
                if(!empty($newUser) && $newUser->access == "No"  && password_verify($_POST['password'],$newUser->password)){
                    $this->view('user/loginEmail', 'Your account is blocked by the administration');
              }else{
                    $this->view('user/loginEmail', 'Incorrect username/password combination!');
              }
            }
        }else{
            $this->view('user/loginEmail');
        }
    }
    }

    public function update($id=0){
        if($id>0 && $this->model('user')->find($id)){
            if(isset($_SESSION['username'])){
                $theNewUser = $this->model('User')->find($id);
                if($_SESSION['right'] == "Admin"){
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
                }
            }else{
                $this->view('user/login', "You're not logged in. Please login to proceed");
            }
        }else{
            if(isset($_SESSION['username'])){
                $user = $this->model('user')->find($_SESSION['id']);
                $this->view('user/index',['users'=>$user]);
                header('location: /user/index');
            }else{
                $this->view('user/login','login to perform such action.');
            }
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
                    $newUser->picture = !empty($_FILES['profPic']['name']) ? $_FILES['profPic']['name'] : "Avatar.png"; 
                    $newUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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

    public function listing(){
        if(isset($_SESSION['username'])){
            if($_SESSION != "Buyer"){
                $userCar = $this->model('car')->findByUser($_SESSION['id']);
                $this->view("user/listing", ['user'=>$userCar]);
            }else{
                header('location: /car/index');
            }
        }else{
            header("location: /user/login");
        }
        
    }
    
    public function logout(){
        session_destroy();
        header("location: /user/login");
    }

    public function AllUsers(){
        if(isset($_SESSION['username'])){
            if($_SESSION['right'] == "Admin"){
                if(isset($_POST['USN'])){
                    $user = $this->model('user')->findUserNoAdmin($_POST['uname']);
                    $this->view("user/AllUsers",$user);
                }else{
                    $user = $this->model('user')->All();
                    $this->view("user/AllUsers",$user);
                }
                if(isset($_POST['Block'])){
                    $access = $this->model('user')->block($_POST['id']);
                }
                if(isset($_POST['Access'])){
                    $access = $this->model('user')->access($_POST['id']);
                }
            }else{
                header('location: /car/index');
            }
        }else{
            header('location: /user/login');
        }
    }
}