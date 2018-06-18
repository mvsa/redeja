<?php

include_once "../models/Local.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   
   
 
if($_POST['create']){
    
    $local = new Local();
    $local->create($conn,$_POST['create']['nome'],$_POST['create']['lat'],$_POST['create']['lng'],$_POST['create']['image']);
    unset($local);    
        
}





?>