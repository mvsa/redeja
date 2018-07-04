<?php

include_once "../models/User.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   
   

if($_POST['login']){
    $user = new User();
    $user->login($conn,$_POST['email'],$_POST['senha']);
    unset($user);
}




if($_POST['signup']){
    
    $user = new User();
    $user->createUser($conn,$_POST['name'],$_POST['email'],$_POST['senha'],$_POST['check_list']);
    unset($user);
}


?>