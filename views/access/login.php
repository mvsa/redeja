<!DOCTYPE html>
<html>
    
    <head>
     <meta charset="utf-8" />
        <link rel="stylesheet" href="../../assets/mdl/material.min.css">
        <script src="../../assets/mdl/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    </head>
    
    
    
    <body>
        
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Log In</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>

  <main class="mdl-layout__content">
    <div style="padding-top:30%" class="page-content">
     
      <form method = "POST"  action="../../controllers/accesscontroller.php">
              
              <div class="mdl-card__supporting-text">
   
                   
              
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="email" id="email">
                    <label class="mdl-textfield__label" for="email">E-mail</label>
                  </div> 
                 
  
              </div>
                
                 <hr style="margin-top:">
                  <div class="mdl-card__supporting-text">
   
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" name="senha" id="senha">
                    <label  class="mdl-textfield__label" for="senha">Senha</label>
                  </div> 
                
                  
  
                 </div>
   
                  <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit" name="login"  class="btn btn-info btn-fill ">
          
        </form>
     
     
     
     
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>








