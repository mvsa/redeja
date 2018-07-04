<?php

session_start();
$user_check=$_SESSION['username'];

if(!isset($user_check))
{
header("Location: ../views/index.html");
}


 function getUserType($conn,$Id){
 	
 }

?>