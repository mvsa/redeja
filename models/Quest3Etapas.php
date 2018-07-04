<?php




 
    class Quest3Etapas{
    	
   
    
        public function create($conn,$First,$Second,$Third,$Fourth){
		
			
			$noticia_fk = $First[1];
			$dif = $First[2];
			$check = $Third[1];
			$enunciado1 = mysqli_real_escape_string($conn, $First[3]);
			$enunciado2 = mysqli_real_escape_string($conn, $Second[0]);
			$enunciado3 = mysqli_real_escape_string($conn, $Third[0]);
			$enunciado4 = mysqli_real_escape_string($conn, $Fourth[0]);
		
			$query = mysqli_query($conn, "INSERT INTO questionario_3etapas_1 (noticia_fk, dificuldade,enunciado)VALUES ('$noticia_fk', '$dif','$enunciado1')");
			$lastid = mysqli_insert_id($conn);	
			
			for($i=4;$i<=8;$i++){
				$tempAlternativa =  mysqli_real_escape_string($conn, $First[$i]);
				$query2 = mysqli_query($conn, "INSERT INTO questionario_3etapas_alternativas_1 (questao_fk, alternativa)VALUES ('$lastid', '$tempAlternativa')");
			}
			
			
			
			$query = mysqli_query($conn, "INSERT INTO questionario_3etapas_2 (noticia_fk,enunciado)VALUES ('$noticia_fk','$enunciado2')");
			$lastid2 = mysqli_insert_id($conn);	
			
			for($i=1;$i<=5;$i++){
				$tempAlternativa =  mysqli_real_escape_string($conn, $Second[$i]);
				$query2 = mysqli_query($conn, "INSERT INTO questionario_3etapas_alternativas_2 (questao_fk, alternativa)VALUES ('$lastid2', '$tempAlternativa')");
			}
			
			
			
			
			$query = mysqli_query($conn, "INSERT INTO questionario_3etapas_3 (noticia_fk,enunciado)VALUES ('$noticia_fk','$enunciado3')");
			$lastid3 = mysqli_insert_id($conn);	
			
			for($i=2;$i<=6;$i++){
				$tempAlternativa =  mysqli_real_escape_string($conn, $Third[$i]);
				
				if($check == $i-1){
					$is_correta = 1;
				}else{
					$is_correta = 0;
				}
				
				
				$query2 = mysqli_query($conn, "INSERT INTO questionario_3etapas_alternativas_3 (questao_fk, alternativa,is_correta)VALUES ('$lastid3', '$tempAlternativa', '$is_correta')");
			}
			
			
			
			$query = mysqli_query($conn, "INSERT INTO questionario_3etapas_4 (noticia_fk,enunciado)VALUES ('$noticia_fk','$enunciado4')");
			$lastid4 = mysqli_insert_id($conn);	
			
		
			$tempAlternativa =  mysqli_real_escape_string($conn, $Fourth[1]);
			$query2 = mysqli_query($conn, "INSERT INTO questionario_3etapas_alternativas_4 (questao_fk, alternativa)VALUES ('$lastid4', '$tempAlternativa')");
			
          
        }
        
        
        
        
        
        
        
        

		public function insertAnswer($conn,$Id,$Answer,$nId){
			
			$querys = mysqli_query($conn, "INSERT INTO questionario_3etapas_escolhas (user_fk,enunciado_fk,alternativa_fk)VALUES ('3','$Id','$Answer')");
			
		
			
			$resposta = $this->corrigir($conn,$Id,$Answer);
			if (session_status() == PHP_SESSION_NONE) {
				    session_start();
				}
			$_SESSION['gab3etp'] = $resposta;
			//$query = http_build_query($arr, '', '&&');
	
		header("location:../views/avaliac/resolve3etpResults.php?dd=".$nId);	
	
				
		}
			
			
			
		public function corrigir($conn,$Id,$Answer){
			
		    $is_correta = $this->checkAlt3Etapa($conn,$Answer);
			
			if($is_correta){
				return 0;
			}else{
				
			$erradas = $Answer;
				 return $erradas;
				
				
			}
		
			
		}
		

		
		
				//verifica se determinada (id) alternativa de um questionario 3 etapas é correta
		function checkAlt3Etapa($conn,$id){
			$sql = "SELECT is_correta FROM questionario_3etapas_alternativas_3 WHERE id = '$id'";
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