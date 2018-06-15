<?php




 
    class Notica{
    	
        private $id;
        private $dificuldade;
        private $titulo;
        private $texto;
        private $url;
        private $local_fk;
        
        
        
    
        
        
        public function create($conn,$Titulo,$Texto,$Url,$Dificuldade,$Local){
   
        
   
            
            $this->titulo = mysqli_real_escape_string($conn, $Titulo);
			$this->texto = mysqli_real_escape_string($conn, $Texto);
			$this->url = mysqli_real_escape_string($conn, $Url);
			$this->dificuldade = mysqli_real_escape_string($conn, $Dificuldade);
			$this->local_fk = $Local;
            
            
        
				$query = mysqli_query($conn, "INSERT INTO noticias (titulo, texto, url,local_fk,dificuldade,create_time)VALUES ('$this->titulo', '$this->texto', '$this->url', '$this->local_fk', '$this->dificuldade,'null)");
				if($query)
				{


					$lastid = mysqli_insert_id($conn);
					
				
				}
			
            
            
        }
        
            public function update($conn,$Titulo,$Texto,$Url,$Dificuldade,$Local){
			
		
			$this->id = $Id;
			 $this->titulo = mysqli_real_escape_string($conn, $Titulo);
			$this->texto = mysqli_real_escape_string($conn, $Texto);
			$this->url = mysqli_real_escape_string($conn, $Url);
			$this->dificuldade = mysqli_real_escape_string($conn, $Dificuldade);
			$this->local_fk = $Local;
			
			
 			$query = mysqli_query($conn,"UPDATE noticias SET titulo = '$this->titulo', texto = '$this->texto', url = '$this->url',dificuldade = '$this->dificuldade',local_fk = '$this->local_fk', updated_time = null  WHERE noticias.id = '$this->id' ");
 			if($query){
 			
 			}

		}
		
		
		
		
		
	
		
		

			
        
       
        public function delete($conn,$Id){
			
			$this->id = $Id;
 			$query = mysqli_query($db,"DELETE FROM noticias WHERE noticias.id = '$this->id'");
			


		}
		
		
		
	public function checkAvailableQuests($Id){
		
		
	}	
		
		
	
		
	



        
        
    }
    
    
    
    
    
    
    
    
    
    
    

 
?>