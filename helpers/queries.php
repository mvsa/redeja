<?php
       //rtorna alternativa correta de qyestionario siples
		function getSimplesAnswer($conn,$id){
			$sql = "SELECT id FROM questionario_simples_alternativas WHERE questao_fk = '$id' AND is_correta = '1' ";
			$result = mysqli_query($conn,$sql);
			$alt = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $alt;
			
		}
		
	
	
	
	//Lista de preferências disponíveis (politica, culinária, etc)
	  function preferenceList($conn){
		$container = [];
		 $sql1 = "SELECT id, nome FROM preferences";
		 $result = mysqli_query($conn,$sql1);
		 while ($container = mysqli_fetch_array($result)){
			$prefList[] = $container;	
		 }
		 
			return $prefList;	
		}
		
		//Lista de localidades em formato Json
		function coordListJson($conn){
			$container=[];
			$sql = "SELECT id,nome,ltd,lng FROM locais";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$coordList[] = $container;	
			}
			 $aux = [];
    		foreach ($coordList as $coord) {
    			 array_push($aux, $coord);
    			}
    		$coordsJson =  json_encode($aux, JSON_UNESCAPED_SLASHES);
			return $coordsJson;
			
		}
		
		//Lista apenas id e  nomes de localidades formato array php
			function coordList($conn){
			$container=[];
			$sql = "SELECT id,nome FROM locais";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$coordList[] = $container;	
			}
			 
			return $coordList;
			
		}


		//lista o tipo de determinada atividade dado o id
		function exercicioType($conn,$id){
			$sql = "SELECT tipo FROM locais_exercicios WHERE exercicio_id = '$id'";
			$result = mysqli_query($conn,$sql);
			$tipo = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $tipo['tipo'];
		}

		//carrega o exercicio de interpretação de midia dado o id
		function getIntMidi($conn,$id){
			$sql = "SELECT titulo,enunciado,dificuldade,url FROM interp_midia WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
			$question = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $question;
		}	
		
		
		
		function getUrl($Url){
			$url = urldecode(rawurldecode($Url));
   
		    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
		    return $matches[1];
		}
		
		
		function getNoticia($conn,$id){
			$sql = "SELECT dificuldade,titulo,texto,url_image FROM noticias WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
			$new = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $new;
			
			
		}
		
		
		
			//carrega as alternativas da questão de interpretação de midia dado o id
		function getIntMidiAlts($conn,$id){
			$container=[];
			$sql = "SELECT id,alternativa,is_answer FROM interp_midia_alternativas WHERE interp_midia_alternativas.questao_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$alterList[] = $container;	
			}
			 
			return $alterList;
		}
		
		
		
		//carrega os enunciados de determinado questionario simples
		 function getQsQuestions($conn,$Id){
			$container = [];
			 $sql1 = "SELECT id, enunciado FROM questionario_simples WHERE questionario_simples.noticia_fk = '$Id'";
			 $result = mysqli_query($conn,$sql1);
			 while ($container = mysqli_fetch_array($result)){
				$enumList[] = $container;	
			 }
			 
				return $enumList;	
		}


		//carrega as alternativas de determinado questionario simples
		 function getQsAlts($conn,$Id){
			$container = [];
			 $sql1 = "SELECT id, alternativa,is_correta FROM questionario_simples_alternativas WHERE questionario_simples_alternativas.questao_fk = '$Id'";
			 $result = mysqli_query($conn,$sql1);
			 while ($container = mysqli_fetch_array($result)){
				$altList[] = $container;	
			 }
			 
				return $altList;	
		}
		
		
		
		
		//carrega o exercicio de avaliação de um questionario 3 etapas
		function get3etpEnum($conn,$id){
			$sql = "SELECT id,enunciado FROM questionario_3etapas_3 WHERE noticia_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			$question = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $question;
		}	

				//carrega as alternativas de uma avaliação de questionario 3 etapas
		function get3etpAlts($conn,$id){
			$container=[];
			$sql = "SELECT id,alternativa,is_correta FROM questionario_3etapas_alternativas_3 WHERE questao_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$alterList[] = $container;	
			}
			 
			return $alterList;
		}
		
			
		//carrega a aprte 1 do de 3etapas
		function get3etpEnum1($conn,$id){
			$sql = "SELECT id,enunciado,dificuldade FROM questionario_3etapas_1 WHERE noticia_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			$question = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $question;
		}	

				//carrega as alternativas parte 1 de um questionario 3 etapas
		function get3etpAlts1($conn,$id){
			$container=[];
			$sql = "SELECT id,alternativa FROM questionario_3etapas_alternativas_1 WHERE questao_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$alterList[] = $container;	
			}
			 
			return $alterList;
		}
		
		
			function get3etpEnum2($conn,$id){
			$sql = "SELECT id,enunciado FROM questionario_3etapas_2 WHERE noticia_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			$question = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $question;
		}	

				//carrega as alternativas parte 1 de um questionario 3 etapas
		function get3etpAlts2($conn,$id){
			$container=[];
			$sql = "SELECT id,alternativa FROM questionario_3etapas_alternativas_2 WHERE questao_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$alterList[] = $container;	
			}
			 
			return $alterList;
		}
		
		
		
		
		
		
			function get3etpEnum3($conn,$id){
			$sql = "SELECT id,enunciado FROM questionario_3etapas_4 WHERE noticia_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			$question = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $question;
		}	

				//carrega as alternativas parte 1 de um questionario 3 etapas
		function get3etpAlts3($conn,$id){
			$container=[];
			$sql = "SELECT id,alternativa FROM questionario_3etapas_alternativas_4 WHERE questao_fk = '$id'";
			$result = mysqli_query($conn,$sql);
			$dica = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			return $dica;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		//carrega TODAS as atividades de determinada localização
		function getAllExe($conn,$id){
			$container=[];
			$sql = "SELECT id,titulo FROM noticias WHERE noticias.id  IN  (SELECT exercicio_id FROM locais_exercicios WHERE local_fk = '$id' AND tipo = 'noticia_simples')";
		   $result = mysqli_query($conn,$sql);
			while ($container = mysqli_fetch_array($result)){
				$alterList[] = $container;	
			}
		    $sql2 = "SELECT id,titulo FROM interp_midia WHERE interp_midia.id  IN  (SELECT exercicio_id FROM locais_exercicios WHERE local_fk = '$id' AND tipo = 'interpMidia')";
		   $result2 = mysqli_query($conn,$sql2);
			while ($container = mysqli_fetch_array($result2)){
				$alterList[] = $container;	
			} 
			
			
			$sql2 = "SELECT id,titulo FROM noticias WHERE noticias.id  IN  (SELECT exercicio_id FROM locais_exercicios WHERE local_fk = '$id' AND tipo = 'noticia_3etapas')";
		   $result2 = mysqli_query($conn,$sql2);
			while ($container = mysqli_fetch_array($result2)){
				$alterList[] = $container;	
			} 

			return ($alterList);
			
		}
		
		
		
	
		
		
		
			
		
		
	
		
    
 
?>


 