<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 
?>


<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="../../assets/mdl/material.min.css">
        <link rel="stylesheet" href="../../assets/css/custom.css">
        <script src="../../assets/mdl/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
       
    </head>
    
    
    
    <body>
        
        
        
        <form method = "POST"  action="../../controllers/accesscontroller.php">
              
              <div class="mdl-card__supporting-text">
   
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="name" name="name">
                    <label class="mdl-textfield__label" for="name">Nome</label>
                  </div> 
                   
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="email" id="email">
                    <label class="mdl-textfield__label" for="email">E-mail</label>
                  </div> 
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="sample3">
                    <label class="mdl-textfield__label" for="sample3">Confirmar E-mail</label>
                  </div> 
                  
  
              </div>
                
                 <hr style="margin-top:">
                  <div class="mdl-card__supporting-text">
   
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" name="senha" id="senha">
                    <label  class="mdl-textfield__label" for="senha">Senha</label>
                  </div> 
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="sample3">
                    <label class="mdl-textfield__label" for="sample3">Confirmar Senha</label>
                  </div> 
            
                 </div>
                 
                 
                 
              </div>
                
                 <hr style="margin-top:">
                  <div class="mdl-card__supporting-text">
   
                    <span style="margin-left:10px" class="mdl-layout-title">Preferencias</span> 
                     <hr>
                   
                   
                   <?php
                     $count = 0;
                     $preferences = [];
                     $preferences = preferenceList($conn); 
                  
                     
                     foreach ($preferences as $preference){ 
                     $count++; ?>
                     <label for="chkbox<?php echo $count; ?>" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox<?php echo $count ?>" class="mdl-checkbox__input" value="<?php echo $preference['id'];?>"  name="check_list[]">
                      <span class="mdl-checkbox__label"><?php echo $preference['nome'] ?></span>
                    </label>
                      	
                     <?php } ?>
                   

                 </div>
    
                 
                  <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="signup"  class="btn btn-info btn-fill ">
          
        </form>

        
   
    </body>
    
      
    
</html>

