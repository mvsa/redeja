<?php

include_once "../models/Task.php";
include_once "../models/QuestSimples.php";
include_once "../models/Quest3Etapas.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 

   
 
if($_GET['id']){
    
    $tipo = exercicioType($conn,$_GET['id']);
    
    if($tipo == 'interpMidia' ){
        
        	header("location:../views/task/resolve.php?dd=".$_GET['id']);
        
    }else{
        if($tipo == 'noticia_simples'){
            	header("location:../views/avaliac/show.php?dd=".$_GET['id']);
            
        }
        
        if($tipo == 'noticia_3etapas'){
            
            	header("location:../views/avaliac/resolve3Etapas1.php?dd=".$_GET['id']);
        }
    }



}

if($_POST['submittask']){
    $task = new Task();
    $task->insertAnswer($conn,$_POST['id'],$_POST['answer']);
    unset($task);
    
}


if($_POST['submitQs']){
   $QuestSimples = new QuestSimples();
   $QuestSimples->insertAnswer($conn,$_POST);
   unset($questSimples);
    
}

if($_POST['submit3etp']){
   $Etp3 = new Quest3Etapas();
   $Etp3->insertAnswer($conn,$_POST['id'],$_POST['answer'],$_POST['nId']);
   unset($Quest3Etapas);
    
}




?>