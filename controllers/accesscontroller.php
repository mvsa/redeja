<?php

include_once "../models/User.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   
   

if($_POST['login']){
    echo "oi";
}




if($_POST['signup']){
    
    $user = new User();
    $user->createUser($conn,$_POST['name'],$_POST['email'],$_POST['senha'],$_POST['check_list']);
    
}


?>