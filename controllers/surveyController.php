<?php

include_once "../models/questSimples.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   
   
 
if($_POST['create']){
    
    $tipo = $_POST['type'];
  
    if($tipo == 'simples'){
            
        $questSimples = new QuestSimples();
        $questSimples->create($conn,$_POST);
        unset($questSimples);     
            
    }
       
        
}





?>