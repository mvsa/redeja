<?php

	//Lista de preferências disponíveis (politica, culinária, etc)
	  function preferenceList($conn){
		$container = [];
		 $sql1 = "SELECT id, nome FROM preferences";
		 $result = mysqli_query($conn,$sql1);
		 while ($container = mysqli_fetch_array($result)){
			$prefList[] = $container;	
		 }
		 
			return $prefList;	
		}
		
		//Lista de localidades em formato Json
		function coordListJson($conn){
			$container=[];
			$sql = "SELECT nome,ltd,lng FROM locais";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$coordList[] = $container;	
			}
			 $aux = [];
    		foreach ($coordList as $coord) {
    			 array_push($aux, $coord);
    			}
    		$coordsJson =  json_encode($aux, JSON_UNESCAPED_SLASHES);
			return $coordsJson;
			
		}
		
		//Lista apenas id e  nomes de localidades formato array php
			function coordList($conn){
			$container=[];
			$sql = "SELECT id,nome FROM locais";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$coordList[] = $container;	
			}
			 
			return $coordList;
			
		}







    
 
?>


 