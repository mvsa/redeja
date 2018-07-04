<?php

include_once "../models/Noticia.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
   
   
 
if($_POST['create']){
    
    $noticia = new Noticia();
    $noticia->create($conn,$_POST['titulo'],$_POST['texto'],$_POST['url'],$_POST['dificuldade'],$_POST['local'],$_POST['imagem'],$_POST['avaliac'],$_POST['pref']);
    unset($noticia);    
        
}





?>