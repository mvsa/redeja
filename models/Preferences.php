<?php




 
    class Preferences{
    	
        private $id;
        private $nome;
       
        
        
   
        
        
        public function create($conn,$Nome){
   
        
   
            
            $this->nome = mysqli_real_escape_string($conn, $Nome);
		
            
            
            
       
				$query = mysqli_query($conn, "INSERT INTO preferences (nome)VALUES('$this->nome')");
				if($query)
				{


					//$lastid = mysqli_insert_id($conn);
					
				
				
				}
			
            
            
        }
        
            public function update($conn,$Nome){
			
		
			$this->id = $Id;
			 $this->nome = mysqli_real_escape_string($conn, $Nome);
		
			
			
 			$query = mysqli_query($conn,"UPDATE preferences SET nome = '$this->nome' WHERE preferences.id = '$this->id' ");
 			if($query){
 			
 			}

		}
		
		
		
		
		
        
       
        public function delete($conn,$Id){
			
			$this->id = $idi;
 			$query = mysqli_query($db,"DELETE FROM preferences WHERE preferences.id = '$this->id'");
			if($query){
			
			}	


		}
		
		
	


        
        
    }
    
    
    
    
    
    
    
    
    
    
    

 
?>