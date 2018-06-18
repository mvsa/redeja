<?php




 
    class Local{
    	
    	private $type
        private $id;
        private $name;
        private $ltd;
        private $lng;
        private $url_image;
        
        
       // public function __construct($name,$email, $password){
            
            
       // }
        
        
        public function create($conn,$Name,$Ltd,$Lng,$Url){
   
        
   
            
            $this->name = mysqli_real_escape_string($conn, $Name);
			$this->url = mysqli_real_escape_string($conn, $Url);
			$this->ltd = $Ltd;
			$this->lng = $Lng;
            
            
            $sql="SELECT nome FROM locais WHERE nome='$this->nome'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			if(mysqli_num_rows($result) == 1)
			{
				echo "Local duplicado"; //refazer utilizando ajax
			}
			else
			{
				$query = mysqli_query($conn, "INSERT INTO locais (nome, ltd,lng,url_image,create_time)VALUES ('$this->name', '$this->ltd','$this->lng', '$this->url',null)");
				if($query)
				{


					$lastid = mysqli_insert_id($conn);
					
				
			
				}
			}
            
            
        }
        
            public function update($conn,$Id,$Name,$Ltd,$Lng,$Url){
			
		
			$this->id = $Id;
			$this->name = mysqli_real_escape_string($conn, $Name);
			$this->ltd = $Ltd;
			$this->lng = $Lng;
			$this->url_image = mysqli_real_escape_string($conn, $Url);
			
			
 			$query = mysqli_query($conn,"UPDATE locais SET name = '$this->name', ltd = '$this->ltd',lng = '$this->lng', url_image = '$this->url_image', updated_time = null  WHERE locais.id = '$this->id' ");
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