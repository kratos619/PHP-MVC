<?php
//page redirect
function redirect_to($location){
    return header('location:'.APPROOT.'/'.$location);
}