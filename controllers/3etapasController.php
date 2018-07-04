<?php

include_once "../models/Quest3Etapas.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   session_start(); 
   
 
if($_POST['first']){
    
    $tipo = $_POST['type'];
    $newId = $_POST['newsId'];
    $dif = $_POST['dif'];
    $titulo1 = $_POST['titulo1'];
    $alter1 = $_POST['alter1'];
    $alter2 = $_POST['alter2'];
    $alter3 = $_POST['alter3'];
    $alter4 = $_POST['alter4'];
    $alter5 = $_POST['alter5'];
    
    $firstForm = array($tipo,$newId,$dif,$titulo1,$alter1,$alter2,$alter3,$alter4,$alter5);
   
    $_SESSION['firstF'] = $firstForm;

   header("location:../views/avaliac/new3Etapas1.php");

}



 
if($_POST['second']){
    
    $titulo2 = $_POST['titulo'];
    $alter6 = $_POST['alter6'];
    $alter7 = $_POST['alter7'];
    $alter8 = $_POST['alter8'];
    $alter9 = $_POST['alter9'];
    $alter10 = $_POST['alter10'];
    
     $secondForm = array($titulo2,$alter6,$alter7,$alter8,$alter9,$alter10);
    
    $_SESSION['secondF'] = $secondForm;
    
   header("location:../views/avaliac/new3Etapas2.php");
}





if($_POST['third']){
    
    $titulo3 = $_POST['titulo'];
    $check = $_POST['answer'];
    $alter11 = $_POST['alter11'];
    $alter12 = $_POST['alter12'];
    $alter13 = $_POST['alter13'];
    $alter14 = $_POST['alter14'];
    $alter15 = $_POST['alter15'];
    
     $thirdForm = array($titulo3,$check,$alter11,$alter12,$alter13,$alter14,$alter15);
    
    $_SESSION['thirdF'] = $thirdForm;
    
   header("location:../views/avaliac/new3Etapas3.php");
}



if($_POST['fourth']){
    
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    
    
     $fourthForm = array($titulo,$texto);
    
    $_SESSION['fourthF'] = $fourthForm;
    
    $quest = new Quest3Etapas();
    $quest->create($conn,$_SESSION['firstF'],$_SESSION['secondF'],$_SESSION['thirdF'],$_SESSION['fourthF']);
    unset($quest);
    $_SESSION['firstF'] = "";
    $_SESSION['secondF'] = "";
    $_SESSION['thirdF'] = "";
    $_SESSION['fourthF'] = "";
    
  // header("location:../views/avaliac/new3Etapas3.php");
}



?>