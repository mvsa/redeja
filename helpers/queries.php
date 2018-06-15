<?php

	
	  function preferenceList($conn){
		$container = [];
		 $sql1 = "SELECT id, nome FROM preferences";
		 $result = mysqli_query($conn,$sql1);
		 while ($container = mysqli_fetch_array($result)){
			$prefList[] = $container;	
		 }
		 
			return $prefList;	
		}
		

   
 
?>


 