<?php




 
    class Local{
    	
        private $id;
        private $name;
        private $coordenada;
        private $url_image;
        
        
       // public function __construct($name,$email, $password){
            
            
       // }
        
        
        public function create($conn,$Name,$Coord,$Url){
   
        
   
            
            $this->name = mysqli_real_escape_string($conn, $Name);
			$this->coordenada = mysqli_real_escape_string($conn, $Coord);
			$this->url = mysqli_real_escape_string($conn, $Url);
			
            
            
            $sql="SELECT nome FROM locais WHERE nome='$this->nome'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			if(mysqli_num_rows($result) == 1)
			{
				echo "Local duplicado"; //refazer utilizando ajax
			}
			else
			{
				$query = mysqli_query($conn, "INSERT INTO locais (nome, coordenada, url_image,create_time)VALUES ('$this->name', '$this->coordenada', '$this->url',null)");
				if($query)
				{


					$lastid = mysqli_insert_id($conn);
					
				
			
				}
			}
            
            
        }
        
            public function update($conn,$Id,$Name,$Coord,$Url){
			
		
			$this->id = $Id;
			$this->name = mysqli_real_escape_string($conn, $Name);
			$this->coordenada = mysqli_real_escape_string($conn, $Coord);
			$this->url_image = mysqli_real_escape_string($conn, $Url);
			
			
 			$query = mysqli_query($conn,"UPDATE locais SET name = '$this->name', coordenada = '$this->coordenada', url_image = '$this->url_image', updated_time = null  WHERE locais.id = '$this->id' ");
 			if($query){
 			
 			}

		}
		
		
		
		


       
        public function delete($conn,$Id){
			
			$this->id = $Id;
 			$query = mysqli_query($db,"DELETE FROM locais WHERE locais.id = '$this->id'");
		//	if($query){
			
		//	}	


		}
		
		

		




        
        
    }
    
    
    
    
    
    
    
    
    
    
    

 
?>