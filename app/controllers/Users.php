<?php
// usersController extend BaseController
class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }


    public function register(){
        //check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form
            //sanitize POST data
            
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'name'=> trim($_POST['name']),
                'email'=> trim($_POST['email']),
                'password'=> trim($_POST['password']),
                'confirm_password'=> trim($_POST['confirm_password']),
                'name_error'=> '',
                'email_error'=> '',
                'password_error'=> '',
                'confirm_password_error'=> ""
            ];

            // validate email
            if(empty($data['email'])){
                $data['email_error'] = "Please Enter Email";
            }else{
                //check meail
                if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_error'] = "This Email Is Already Taken";
                }
                
            }
            
            // validate name
            if(empty($data['name'])){
                $data['name_error'] = "Please Enter Name";
            }
            // validate password
            if(empty($data['password'])){
                $data['password_error'] = "Please Enter Password";
            }
            
            // validate password
            if(empty($data['password'])){
                $data['password_error'] = "Please Enter Password";
            }elseif(strlen($data['password']) < 6 ){
                $data['password_error'] = "Password At List 6 Character";
            }

            
            // validateconfirl
            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = "Please Enter Confirm Password";
            }elseif($data['confirm_password'] != $data['password']){
                $data['confirm_password_error'] = "Password  not match";
            }

            // make sure errors are empty
            if(empty($data['email_error']) && empty($data['confirm_password_error']) && empty($data['name_error']) && empty($data['password_error'])){
                //validate()
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                //die('SUCCESS');
                //register user
                if($this->userModel->register($data)){
                    flash('Register-success','You register You can Login');
                    redirect_to('/users/login');
                }else{
                    die('Somethig Went Wrong');
                }
            }else{
                //load view with error
                $this->view('users/register',$data);
            }

        }else{
            //init data
            $data = [
                'name'=> '',
                'email'=> '',
                'password'=> '',
                'confirm_password'=> '',
                'name_error'=> '',
                'email_error'=> '',
                'password_error'=> '',
                'confirm_password_error'=> ""
            ];
        }

        $this->view('users/register',$data);
    }

    
    public function login(){
        //check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
              $data = [
                
                'email'=> trim($_POST['email']),
                'password'=> trim($_POST['password']),
                'email_error'=> '',
                'password_error'=> ''
            ];

                // validate email
            if(empty($data['email'])){
                $data['email_error'] = "Please Enter Email";
            }
                // validate email
            if(empty($data['password'])){
                $data['password_error'] = "Please Enter pssword";
            }

            //check for users
            if($this->userModel->findUserByEmail($data['email'])){
                //user Found
                //check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                if($loggedInUser){
                    //create session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_error'] = 'password incorrect';
                    $this->view('users/login',$data);
                }

            }else{
                $data['email_error'] = 'No User Found';
            }

            //make sure error are empty
            if(empty($data['email_error']) && empty($data['password_error'])){
              
                die('SUCCESS');
                
            }else{
                $this->view('users/login',$data);
            }

        }else{
            //init data
            $data = [
                
                'email'=> '',
                'password'=> '',
                'email_error'=> '',
                'password_error'=> ''
            ];
        }

        $this->view('users/login',$data);
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        //$_SESSION['user_id'] = $user->id;
        return $this->view('pages/index');
    }
    public function logout(){
        $_SESSION['user_id'] = null;
        $_SESSION['user_email'] = null;
        $_SESSION['user_name'] = null;
        session_destroy();
        return redirect_to('users/login');
        
    }
    // check user loged in or not
    public function userLoggedIn(){
        if(iseet($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
}

?>