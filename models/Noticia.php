<?php




 
    class Noticia{
    	
        private $id;
        private $dificuldade;
        private $titulo;
        private $texto;
        private $url;
        private $local_fk;
        private $url_image;
        private $metodo;
        
        
    
        
        
        public function create($conn,$Titulo,$Texto,$Url,$Dificuldade,$Local,$UrlI,$Ava,$Pref){
   
        
   
            
            $this->titulo = mysqli_real_escape_string($conn, $Titulo);
			$this->texto = mysqli_real_escape_string($conn, $Texto);
			$this->url = mysqli_real_escape_string($conn, $Url);
			$this->dificuldade = mysqli_real_escape_string($conn, $Dificuldade);
			$this->local_fk = $Local;
			$this->url_image = mysqli_real_escape_string($conn, $UrlI);
        		$this->metodo = $Ava;
            
        
				$query = mysqli_query($conn, "INSERT INTO noticias (titulo, texto, url,dificuldade,url_image,create_time)VALUES ('$this->titulo', '$this->texto', '$this->url', '$this->dificuldade','$this->url_image',null)");
				if($query)
				{

				$newInserted = mysqli_insert_id($conn);	

				if($this->metodo == '1'){
					mysqli_query($conn, "INSERT INTO locais_exercicios (local_fk, exercicio_id,tipo,preference_fk)VALUES ('$this->local_fk','$newInserted','noticia_simples','$Pref')");
					header("location:../views/avaliac/new.php?dd=".$newInserted);
				}else{
					if($this->metodo == '2'){
						mysqli_query($conn, "INSERT INTO locais_exercicios (local_fk, exercicio_id,tipo,preference_fk)VALUES ('$this->local_fk','$newInserted','noticia_3etapas','$Pref')");
						header("location:../views/avaliac/new3Etapas.php?dd=".$newInserted);
					}
				}
				
					
				
				}
			
            
            
        }
        
            public function update($conn,$Titulo,$Texto,$Url,$Dificuldade,$UrlI){
			
		
			$this->id = $Id;
			 $this->titulo = mysqli_real_escape_string($conn, $Titulo);
			$this->texto = mysqli_real_escape_string($conn, $Texto);
			$this->url = mysqli_real_escape_string($conn, $Url);
			$this->dificuldade = mysqli_real_escape_string($conn, $Dificuldade);
			$this->local_fk = $Local;
			$this->url_image = mysqli_real_escape_string($conn, $UrlI);
			
 			$query = mysqli_query($conn,"UPDATE noticias SET titulo = '$this->titulo', texto = '$this->texto', url = '$this->url', url_image = '$this->url_image',dificuldade = '$this->dificuldade', updated_time = null  WHERE noticias.id = '$this->id' ");
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