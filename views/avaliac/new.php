<?php
 $NewsId = $_GET['dd'];
?>
<!DOCTYPE html>
<html>
    
    <head>
       <meta charset="utf-8" />
        <link rel="stylesheet" href="../../assets/mdl/material.min.css">
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
      <span class="mdl-layout-title">Novo Questionário</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      
     
      
      <form>
              
              <div class="mdl-card__supporting-text">
                  
                   
   
                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="avaliac" name="avaliac">
                      <option></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                    <label class="mdl-textfield__label" for="avaliac">Quantidade de Perguntas:</label>
                  </div> 
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="alt" name="alt">
                      <option></option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    
                    </select>
                    <label class="mdl-textfield__label" for="alt">Quantidade de alternativas por pergunta:</label>
                  </div> 

              </div>
                
                 <hr style="margin-top:">
                 
                  
                  
                 </div>
   
              <button onclick="nextPage()"  type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Proxima Página</button>
              
      

        </form>
        
         
        
      
           <script>
            
                   var qst;
                   var alts;
                   
                    $("#avaliac").change(
                    function(){
                     if ($(this).val()) {
                     qst = ($(this).val());
                     
                    } 
                  }
                );
                
                   $("#alt").change(
                    function(){
                     if ($(this).val()) {
                     alts = ($(this).val());
                    } 
                  }
                );
         
                function nextPage(){
                  window.location.href = 'questBuild.php?qst='+qst+'&&alts='+alts;
                }
                   
                   
           
               
           </script>      
         
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>