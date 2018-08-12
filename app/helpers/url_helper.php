<?php
//page redirect
function redirect_to($location){
    echo APPROOT;
    return header('Location: '. URLROOT .'/'.$location);
}