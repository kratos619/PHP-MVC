<?php 
class Posts extends Controller {

    public function __construct(){
        if(!userLoggedIn()){
            redirect_to('users/login');
        }
    }

    public function index(){
        $data = [];
        $this->view('posts/index',$data);
    }
}