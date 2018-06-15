<?php




 
    class Questao{
    	
        private $id;
        private $nome_questao;
        private $enunciado;
        private $url_midia;
        private $noticia_fk;
        private $dificuldade;
        
        
   
        
        
        public function create($conn,$Nome,$Enunciado,$Url,$Noticia_fk,$Dificuldade){
   
        
   
            
            $this->nome_questao = mysqli_real_escape_string($conn, $Nome);
			$this->enunciado = mysqli_real_escape_string($conn, $Enunciado);
			$this->url_midia = mysqli_real_escape_string($conn, $Url);
			$this->noticia_fk = $Noticia_fk;
			$this->dificuldade = $Dificuldade;
            
            
            
       
				$query = mysqli_query($conn, "INSERT INTO questoes (nome_questao, enunciado, url_midia,noticia_fk,dificuldade,create_time)VALUES ('$this->nome_questao', '$this->enunciado', '$this->url_midia','$this->noticia_fk', '$this->dificuldade' null)");
				if($query)
				{


					$lastid = mysqli_insert_id($conn);
					
				
				
				}
			
            
            
        }
        
            public function update($conn,$Id,$Nome,$Enunciado,$Url,$Noticia_fk,$Dificuldade){
			
		
			$this->id = $Id;
			 $this->nome_questao = mysqli_real_escape_string($conn, $Nome);
			$this->enunciado = mysqli_real_escape_string($conn, $Enunciado);
			$this->url_midia = mysqli_real_escape_string($conn, $Url);
			$this->noticia_fk = $Noticia_fk;
			$this->dificuldade = $Dificuldade;
			
			
 			$query = mysqli_query($conn,"UPDATE questoes SET nome_questao = '$this->nome_questao', enunciado = '$this->enunciado', url_midia = '$this->url_midia',noticia_fk = '$this->noticia_fk',dificuldade = '$this->dificuldade', updated_time = null  WHERE questoes.id = '$this->id' ");
 			if($query){
 			
 			}

		}
		
		
		
		
		
        
       
        public function delete($conn,$Id){
			
			$this->id = $idi;
 			$query = mysqli_query($db,"DELETE FROM questoes WHERE questoes.id = '$this->id'");
			if($query){
			//check cascade
			}	


		}
		
		
	


        
        
    }
    
    
    
    
    
    
    
    
    
    
    

 
?>