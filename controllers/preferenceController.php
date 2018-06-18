<?php

include_once "../models/Preferences.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   
   
 
if($_POST['create']){
    
    $preference = new Preferences();
    $preference->create($conn,$_POST['nome'],$_POST['image']);
    unset($preference);    
        
}





?>