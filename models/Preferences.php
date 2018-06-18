<?php




 
    class Preferences{
    	
        private $id;
        private $nome;
        private $imagem;
       
        
        
   
        
        
        public function create($conn,$Nome,$Imagem){
   
        
   
            
            $this->nome = mysqli_real_escape_string($conn, $Nome);
			$this->imagem = mysqli_real_escape_string($conn,$Imagem);
            
            
            
       
				$query = mysqli_query($conn, "INSERT INTO preferences (nome,imagem)VALUES('$this->nome','$this->imagem')");
				if($query)
				{


				header("location:../../home.php");
					
				
				
				}
			
            
            
        }
        
            public function update($conn,$Id,$Nome,$Imagem){
			
		
			$this->id = $Id;
			 $this->nome = mysqli_real_escape_string($conn, $Nome);
			$this->imagem = mysqli_real_escape_string($conn,$Imagem);
			
			
 			$query = mysqli_query($conn,"UPDATE preferences SET nome = '$this->nome',imagem = '$this->image' WHERE preferences.id = '$this->id' ");
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