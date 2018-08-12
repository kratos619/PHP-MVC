<?php 
class Posts extends Controller {

    public function __construct(){
        if(!userLoggedIn()){
            redirect_to('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index(){
        // get all posts 
        $posts = $this->postModel->getPosts();
        $data = [
            "posts" => $posts
        ];
        $this->view('posts/index',$data);
    }
}