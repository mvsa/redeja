<?php




 
    class Task{
    	
        private $id;
        private $enunciado;
        private $titulo;
        private $local;
        private $url;
        private $dificuldade;
        private $preferencia;
        
       
   
        
        
        public function create($conn,$Enunciado,$Titulo,$Local,$Url,$Dificuldade,$Preferencia,$Alt1,$Alt2,$Alt3,$Alt4,$Alt5,$Answer){
   
        
   
            
            $this->titulo = mysqli_real_escape_string($conn, $Titulo);
			$this->enunciado = mysqli_real_escape_string($conn, $Enunciado);
			$this->url =  mysqli_real_escape_string($conn, $Url);

       
				$query = mysqli_query($conn, "INSERT INTO interp_midia (titulo, enunciado, url,local_fk,dificuldade,preference_fk)VALUES ('$this->titulo', '$this->enunciado', '$this->url','$Local', '$Dificuldade','$Preferencia')");
				if($query)
				{
					$lastid = mysqli_insert_id($conn);
					
					for($i=1;$i<=5;$i++){
						
						if($Answer == $i){
							$tempiscorreta = 1;	
						}else{
							$tempiscorreta = 0;
						}						
						$query2 = mysqli_query($conn, "INSERT INTO interp_midia_alternativas (questao_fk, alternativa,is_answer)VALUES ('$lastid', '${Alt . $i}','$tempiscorreta')");
					}
					
					
					
				mysqli_query($conn, "INSERT INTO locais_exercicios (local_fk, exercicio_id,tipo,preference_fk)VALUES ('$Local','$lastid','interpMidia','$Preferencia')");

					
					
					
				
				
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
		
		
		public function insertAnswer($conn,$Id,$Answer){
	
		mysqli_query($conn, "INSERT INTO interpm_escolhas_users (questao_fk,user_fk,alternativa_fk)VALUES ('$Id','3','$Answer')");


		    $resposta = $this->corrigir($conn,$Id,$Answer);
			if (session_status() == PHP_SESSION_NONE) {
				    session_start();
				}
			$_SESSION['gabtask'] = $resposta;
			//$query = http_build_query($arr, '', '&&');
	
		header("location:../views/task/resolveResults.php?dd=".$Id);	
			
		}
		
		
		
		public function corrigir($conn,$Id,$Answer){
			
			 $is_correta = $this->checkAltInterp($conn,$Answer);
			
			if($is_correta){
				return 0;
			}else{
				
				$erradas = $Answer;
				 return $erradas;
				
				
			}
			
		}
		
		
			//verifica se determinada (id) alternativa de uma interpretação de midia é correta
		function checkAltInterp($conn,$id){
			$sql = "SELECT is_answer FROM interp_midia_alternativas WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
			$alt = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			if($alt['is_answer'] == '1'){
				$isanswer = true;
			}else{
				$isanswer = false;
			}
			
			return $isanswer;
			
		}
		
		
		
	


        
        
    }
    
    
    
    
    
    
    
    
    
    
    

 
?>