<?php 
require_once('config/config.php');
// // LOad Libraries
// require_once ('libraries/Core.php');
// require_once ('libraries/Controller.php');
// require_once ('libraries/Database.php');

//auto loader load all libraries

spl_autoload_register(function($className){
require_once ('libraries/'.$className.'.php');
});