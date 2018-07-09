<?php




 
    class User{
    	
        private $id;
        private $name;
        private $email;
        private $password;
        
        
      
        
        
        public function createUser($conn,$Name,$Email,$Password,$Preferences){
   
        
   
            
            $this->name = mysqli_real_escape_string($conn, $Name);
			$this->email = mysqli_real_escape_string($conn, $Email);
			$this->password = mysqli_real_escape_string($conn, $Password);
			$this->password = md5($this->password);
            
            
            
            $sql="SELECT email FROM users WHERE email='$email'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			if(mysqli_num_rows($result) == 1)
			{
				echo "E-mail duplicado"; //refazer utilizando ajax
			}
			else
			{
				$query = mysqli_query($conn, "INSERT INTO users (name, email, password,create_time)VALUES ('$this->name', '$this->email', '$this->password',null)");
				if($query)
				{


					$userInserted = mysqli_insert_id($conn);
				
					
					
					 mysqli_query($conn, "INSERT INTO user_roles (user_fk, role_fk)VALUES ('$userInserted',1)");
                   // session_start();
					//$_SESSION['username'] = $name; // Initializing Session
				
				//	mysqli_close($con);
					
					
					foreach ($Preferences as $preference) {
						    
						 mysqli_query($conn, "INSERT INTO users_preferences (preferences_fk,user_fk)VALUES ('$preference', '$userInserted')");
 
						    
						}
					
				
							header("location: ../views/home.php"); // Redirecting To Other Page	
				}
			}
            
            
        }
        
        
        
        
        
           public function createAdmin($conn,$Name,$Email,$Password){
   
        
   
            
            $this->name = mysqli_real_escape_string($conn, $Name);
			$this->email = mysqli_real_escape_string($conn, $Email);
			$this->password = mysqli_real_escape_string($conn, $Password);
			$this->password = md5($this->password);
            
            
            
            $sql="SELECT email FROM users WHERE email='$email'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			if(mysqli_num_rows($result) == 1)
			{
				echo "E-mail duplicado"; //refazer utilizando ajax
			}
			else
			{
				$query = mysqli_query($conn, "INSERT INTO users (name, email, password,create_time)VALUES ('$this->name', '$this->email', '$this->password',null)");
				if($query)
				{


					$userInserted = mysqli_insert_id($conn);
					
					
					 mysqli_query($conn, "INSERT INTO user_roles (user_fk, role_fk)VALUES ('$userInserted',2)");
                   // session_start();
					//$_SESSION['username'] = $name; // Initializing Session
					//header("location: home.php"); // Redirecting To Other Page
				//	mysqli_close($con);
					
				
					
				
					
				}
			}
            
            
        }
        
            public function update($conn,$Id,$Name,$Email){
			
		
			$this->id = $Id;
			$this->name = mysqli_real_escape_string($conn, $Name);
			$this->email = mysqli_real_escape_string($conn, $Email);
			
			
 			$query = mysqli_query($conn,"UPDATE users SET name = '$this->name', email = '$this->email', updated_time = null  WHERE users.id = '$this->id' ");
 			if($query){
 			
 			}

		}
		
		
		
		
		
			public function changepass($conn,$Id,$Old,$New,$Confirmation){
		
			//CHECK MYSQL INJECTION
			$o = md5($Old);
			$n = $New;
			$password = md5($n);
			$c = $Confirmation;
			$this->id = $Id;

			$sql = "SELECT password FROM users WHERE users.id = '$this->id'";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

			if ($o == $row['password']) {
				if ($n == $c) {
					$query = mysqli_query($conn,"UPDATE users SET password = '$password' WHERE users.id = '$this->id'");
					if($query){
 					echo "senha alterada";
 					}
				}else{
					echo "Senhas digitadas não são iguais";
				}
			}else{
				echo "Senha atual não confere";
			}

			

			
		}
		
		
	
        
       
        public function delete($conn,$Id){
			
			$this->id = $Id;
 			$query = mysqli_query($db,"DELETE FROM users WHERE users.id = '$this->id'");
			if($query){
			echo "usuário deletado";
			}	


		}
		
		
		public function login($conn,$Email,$Password){
		
			
			//if(empty($_POST["username"]) || empty($_POST["password"]))
	//	{
	//		$error = "Both fields are required.";
	//	}else
	//	{
		
			 
            $this->email = mysqli_real_escape_string($conn, $Email);
			$this->password = mysqli_real_escape_string($conn, $Password);
			$this->password = md5($this->password);
			
			//Check username and password from database
			$sql="SELECT id,name FROM users WHERE email='$this->email' and password='$this->password'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				session_start();
				$_SESSION['username'] = $row['name']; // Initializing Session
				header("location: ../views/home.php"); // Redirecting To Other Page
				$_SESSION['errol'] = '';
			}else
			{
				echo  'Usuário não encontrado'; // retornar erros com front.

			}

		}
		
		
		
			public function logout(){
			session_start();
			if(session_destroy())
			{
			     header("location: index.php");
			}

		}



        
        
    }
    
    
    
    
    
    
    
    
    
    
    

 
?>