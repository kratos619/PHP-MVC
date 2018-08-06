<?php 

// base controller
//loads models and Views

class Controller {
    //load Model
    public function model($model){
        //requir model requir once
        require_once('../app/models/'.$model .'.php');
    return new $model;
    }

    //view data
public function view($view,$data=[]){
//check for View
if(file_exists('../app/views/'.$view.'.php')){
    require_once('../app/views/'.$view.'.php');
}else{
    //view Does Not Exist
    die('view DoseNot exist');
}
}
    
}
