<?php




 
    class QuestSimples{
    	
    	private $qtdPerguntas;
        private $qtdAlternativas;
        private $newsId;
        

        
        
        public function create($conn,$Post){
			
			$this->qtdAlternativas = $Post['qtdAlternativas'];
			$this->qtdPerguntas =  $Post['qtdPerguntas'];
			$this->newsId =  $Post['newsId'];
			      
			      
			for($i=1;$i<=$this->qtdPerguntas;$i++){
				$tempEnunciado =  mysqli_real_escape_string($conn, $Post['titulo'.$i]);
				$tempDificuldade =  $Post['dif'.$i];
			
				$query = mysqli_query($conn, "INSERT INTO questionario_simples (noticia_fk, enunciado,dificuldade)VALUES ('$this->newsId', '$tempEnunciado','$tempDificuldade')");
				$lastid = mysqli_insert_id($conn);
					for($j=1;$j<=$this->qtdAlternativas;$j++){
						$tempAlternativa =  mysqli_real_escape_string($conn, $Post['alter'.$i.$j]);
						$temp = $Post['check'.$i];
						
						if($temp == $i.$j){
							$tempiscorreta = 1;
						}else{
							$tempiscorreta = 0;
						}
						
						$query2 = mysqli_query($conn, "INSERT INTO questionario_simples_alternativas (questao_fk, alternativa,is_correta)VALUES ('$lastid', '$tempAlternativa','$tempiscorreta')");
	
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
		
		
		
		public function insertAnswer($conn,$Post){
			$qtd = $Post['qtd'];
			$id = $Post['nid'];
			$arr = [];

			for($i=1;$i<=$qtd;$i++){
				$enum = $_POST['enunid'.$i];
				$alt = $_POST['alt'.$i];
				
			    mysqli_query($conn, "INSERT INTO questionario_simples_escolhas_users (enunciado_fk,alternativa_fk,user_fk)VALUES ('$enum','$alt','3')");

				$resposta = $this->corrigir($conn,$enum,$alt);
				array_push($arr, $resposta);
			}
			if (session_status() == PHP_SESSION_NONE) {
				    session_start();
				}
			$_SESSION['gab'] = $arr;
			//$query = http_build_query($arr, '', '&&');
	
		header("location:../views/avaliac/resolveResults.php?dd=".$id);	
	
			
		}

		
		public function corrigir($conn,$Id,$Answer){
			
			 $is_correta = $this->checkAltSimples($conn,$Answer);
			
			if($is_correta){
				return 0;
			}else{
				
				$erradas = $Answer;
				 return $erradas;
				
			}
			
		}
		
		
				//verifica se determinada (id) alternativa de um questionario simples é correto
		function checkAltSimples($conn,$id){
			$sql = "SELECT is_correta FROM questionario_simples_alternativas WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
			$alt = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			if($alt['is_correta'] == '1'){
				$isanswer = true;
			}else{
				$isanswer = false;
			}
			
			return $isanswer;
			
		}
		
		
		
		
		




        
        
    }
    
    
    
    
    
    
    
    
    
    
    

 
?>