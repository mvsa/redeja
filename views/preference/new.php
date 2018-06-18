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
      <span class="mdl-layout-title">Title</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      
     
      
      <form method = "POST"  action="../../controllers/preferenceController.php">
              
              <div class="mdl-card__supporting-text">
   
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="nome" id="nome">
                    <label class="mdl-textfield__label" for="nome">Nome</label>
                  </div> 
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="image" id="image">
                    <label class="mdl-textfield__label" for="image">Link da Imagem</label>
                  </div> 
                 
                 
  
              </div>
                
                 <hr style="margin-top:">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    
                    <div>area para preview da imagem</div>
                  
                  
                  <div id="preview" style='margin-left:20px;background-color:blue;height:220px; width: 280px'></div>
                  
                  
                 </div>
   
                  <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="create"  class="btn btn-info btn-fill ">
      
      

                </form>
            </div>
      </main>
    </div>
        
    </body>
    
    
    
</html>