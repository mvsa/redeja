<?php




 
    class QuestSimples{
    	
    	private $qtdPerguntas;
        private $qtdAlternativas;
        private $newsId;
        
        
       // public function __construct($name,$email, $password){
            
            
       // }
        
        
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
            
      //      $sql="SELECT nome FROM locais WHERE nome='$this->nome'";
		//	$result=mysqli_query($conn,$sql);
		//	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		//	if(mysqli_num_rows($result) == 1)
		//	{
		//		echo "Local duplicado"; //refazer utilizando ajax
		//	}
		//	else
		//	{
		//		$query = mysqli_query($conn, "INSERT INTO locais (nome, ltd,lng,url_image,create_time)VALUES ('$this->name', '$this->ltd','$this->lng', '$this->url',null)");
		//		if($query)
		//		{
//
//
//					$lastid = mysqli_insert_id($conn);
//					
				
			
//				}
//			}
            
            
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