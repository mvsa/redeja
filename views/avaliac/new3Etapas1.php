<?php


?>
<!DOCTYPE html>
<html>
    
    <head>
       <meta charset="utf-8" />
        <link rel="stylesheet" href="../../assets/mdl/material.min.css">
        <link rel="stylesheet" href="questBuild.css">
        <script src="../../assets/mdl/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
       <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    
    
    
    <body>
        
        
        
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Questionário de 3 Etapas</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      
     
      
    <form method ="POST" action="../../controllers/3etapasController.php">
              
              <div class="mdl-card__supporting-text">
                   <div id="firstPage">
                      
                    <br>
                 
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input required class="mdl-textfield__input" type="text" name="titulo" id="titulo">
                        <label class="mdl-textfield__label" for="titulo">Título da Sondagem depois da leitura</label>
                        <br>
                       
                      </div>
                    
                   <?php for ($j=6;$j<=10;$j++){  ?>
                     <br>
                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                          <input type="hidden"  class="mdl-radio__button"></input>
                           <input required  class="mdl-textfield__input" type="text" name="alter<?php echo $j; ?>" id="alter<?php echo $j; ?>">
                        
                        </label><br><br>
                     <?php } ?>   
                     
                     <hr style="margin-top:">
                 
                            <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="second"  class="btn btn-info btn-fill ">

                   
                         
                   </div>
              </div>
            </form>    
                
                 </div>
      

      
        
      
         
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>