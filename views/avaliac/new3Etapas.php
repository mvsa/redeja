<?php
 $newsId = $_GET['dd'];

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
              <input  type="hidden" id="type" name="type" value="3etapas">
               <input  type="hidden" name="newsId" value="<?php echo $newsId; ?>">
              <div class="mdl-card__supporting-text">
                   <div id="firstPage">
                      
                    <br>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input required class="mdl-textfield__input" type="text" name="titulo1" id="titulo1">
                        <label class="mdl-textfield__label" for="titulo1">Título da Sondagem inicial</label>
                        <br>
                        <p style="width:300px">
                            <input class="mdl-slider mdl-js-slider" type="range" name="dif" id='dif'  min="1" max="5" value="1" step="1"></input>
                          </p>
                      </div>
                    
                   <?php for ($j=1;$j<=5;$j++){  ?>
                     <br>
                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                          <input type="hidden"  class="mdl-radio__button"></input>
                           <input required  class="mdl-textfield__input" type="text" name="alter<?php echo $j; ?>" id="alter<?php echo $j; ?>">
                        
                        </label><br><br>
                     <?php } ?>   
                     
                     <hr style="margin-top:">
                 
                  <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="first"  class="btn btn-info btn-fill ">

                   
                         
                   </div>
              </div>
            </form>    
                
                 </div>
   

      

       
        
        
        
         <div id="myModal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <h4 class="mdl-dialog__title">Atenção</h4>
                        <div class="mdl-dialog__content">
                          <p>
                            Este questionário é composto por 3 etapas: Sondagem inicial, Avaliação de interpretação e dica pedagógica ao final. Sua aplicação se destina mais ao ensino e despertar de raciocínio do que avaliação de conhecimento.
                          </p>
                        </div>
                        <div class="mdl-dialog__actions">
                          <button type="button" class="mdl-button close">Fechar</button>
                        </div>
              </div>

        </div>
        
        
        
        
       
        
        <script>
              $(window).load(function(){ 
              
                    var modal = document.getElementById('myModal');
                    var btn = document.getElementById("myBtn");  
                    var span = document.getElementsByClassName("close")[0];
                    modal.style.display = "block";
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }})
            
            
            
        </script>
        
        
        
        
        
            
         
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>