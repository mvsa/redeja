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
      
     
      
    <form id="final" method ="POST" action="../../controllers/3etapasController.php">
             
              <div class="mdl-card__supporting-text">
                   <div id="firstPage">
                      
                    <br>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input required class="mdl-textfield__input" type="text" name="titulo" id="titulo">
                        <label class="mdl-textfield__label" for="titulo">Titulo da dica</label>
                        <br>
                       
                      </div>
                    
                   <div class="mdl-textfield mdl-js-textfield">
                     <textarea required class="mdl-textfield__input" name="texto" type="text" rows="6" 
                      id="texto"></textarea>
                     <label class="mdl-textfield__label" for="texto">Dica:</label>
                  </div>
     
                     
                     <hr style="margin-top:">
                 
                  <input onclick="next()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="fourth"  class="btn btn-info btn-fill ">

                   
                         
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
                              Questionário criado!
                          </p>
                        </div>
                        <div class="mdl-dialog__actions">
                          <button type="button" class="mdl-button close">Fechar</button>
                        </div>
              </div>

        </div>
        
        
        
        
       
        
        <script>
        //check this latter
        var titulo;
        var texto;
        formf = 
              $("#titulo").change(
                 function(){
                 if ($(this).val()) {
                  titulo = ($(this).val());
                    
                } 
              }
            );
                  $("#texto").change(
                 function(){
                 if ($(this).val()) {
                  texto = ($(this).val());
                    
                } 
              }
            );
        
              function next(){
                  
                  
                   if ((!(titulo)) || (!(texto))) {
                      alert ("Insira todos os dados");
                  }else{
              
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
                            }
                      }    
                    
                }
        </script>
        
        
        
        
        
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>