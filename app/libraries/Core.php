<?php
/*
* Main App Core Class
* Create URL and Loades core Controler
* URL Format  - /Controller/method/params
*/

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $param = [];

    public function __construct(){
       // print_r($this->getUrl());

       $url = $this->getUrl();
       //Look in Controllers For First Vaalue

       if(file_exists('../app/controllers/'. ucwords($url[0]).'.php')){
            // if exists set as controller
            $this->currentController = ucwords($url[0]); 
            //Unset 0 Index
            Unset($url[0]);
       }
       //require all Conrollers
       require_once('../app/controllers/'. $this->currentController.'.php');
       //init all controllers
       $this->currentController = new $this->currentController;
    // check for sechod part of url
    if(isset($url[1])){
        //check to see method eist in controller
        if(method_exists($this->currentController,$url[1])){
            $this->currentMethod = $url[1];
            unset($url[1]);
        }
    }
    //Get Params
    $this->param = $url ? array_values($url) : [];
    // call a callback with array of params
    call_user_func_array([$this->currentController,$this->currentMethod],$this->param);
    }
    public function getUrl(){
        if(isset($_GET['url'])){
              $url = rtrim($_GET['url'],'/');
              $url = filter_var($url,FILTER_SANITIZE_URL);
              $url = explode('/',$url);
              return $url;   
        } 
    }
}

