<?php
class Users extends Controller {
    public function __construct(){

    }
    public function register(){
        //check for Post
        if($_SERVER['REQUEST_METHOD'] == 'post'){
            //process form
        }else{
            //init data
            $data = [
                'name'=> '',
                'email'=> '',
                'password'=> '',
                'confirm_password'=> '',
                'name_error'=> '',
                'email_error'=> '',
                'password_error'=> ' ',
                'confirm_password'=> ""
            ];
        }

        $this->view('users/register',$data);
    }
}

?>