<?php

include_once "../models/Task.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   
   
 
if($_POST['create']){
    
    $task = new Task();
    $task->create($conn,$_POST['enunciado'],$_POST['titulo'],$_POST['local'],$_POST['url'],$_POST['dificuldade'],$_POST['preferencia'],$_POST['alter1'],
    $_POST['alter2'],$_POST['alter3'],$_POST['alter4'],$_POST['alter5'],$_POST['answer']);
    unset($task);    
        


}


?>