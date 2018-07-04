<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 
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
      <span class="mdl-layout-title">Nova interpretação de mídia</span>
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
                 <div id = "first">    
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" maxlength="31" type="text" name="titulo" id="titulo">
                    <label class="mdl-textfield__label" for="titulo">Titulo</label>
                  </div> 
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="image" id="image">
                    <label class="mdl-textfield__label" for="image">Url da mídia (Youtube)</label>
                  </div> 
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="local" name="local">
                      <option></option>
                      <?php $localList = coordList($conn); ?>
                      <?php foreach($localList as $local){ ?>
                      <option value="<?php echo $local['id']?>"><?php echo $local['nome']?></option>
                      <?php } ?>
                    </select>
                    <label class="mdl-textfield__label" for="local">Defina o Local</label>
                  </div> 
                  
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="dificuldade" name="dificuldade">
                      <option></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                       <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label class="mdl-textfield__label" for="dificuldade">Dificuldade</label>
                  </div>
                  
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="pref" name="pref">
                      <option></option>
                      <?php  $preferences = preferenceList($conn);  ?>
                      <?php foreach($preferences as $preference){ ?>
                      <option value="<?php echo $preference['id']?>"><?php echo $preference['nome']?></option>
                      <?php } ?>
                    </select>
                    <label class="mdl-textfield__label" for="pref">Defina o tema</label>
                  </div>
                 </div>
              </div>  
                 <hr style="margin-top:">
                
   
      <button onclick="nextPage()"  type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Proxima Página</button>
      
      

        </form>
      
      
      
 
      
      
      <script>
      
              var titulo;
              var local;
              var image;
              var dificuldade;
              var pref;
              
              $("#titulo").change(
                 function(){
                 if ($(this).val()) {
                  titulo = ($(this).val());
                    
                } 
              }
            );
            
            $("#local").change(
                 function(){
                 if ($(this).val()) {
                  local = ($(this).val());
                    
                } 
              }
            );
            
            $("#image").change(
                 function(){
                 if ($(this).val()) {
                  image = ($(this).val());
                    
                } 
              }
            );
            
            $("#dificuldade").change(
                 function(){
                 if ($(this).val()) {
                  dificuldade = ($(this).val());
                    
                } 
              }
            );
            $("#pref").change(
                 function(){
                 if ($(this).val()) {
                  pref = ($(this).val());
                    
                } 
              }
            );
            
          var myOtherUrl = "formBuild.php?tit="+titulo+"&&loc="+local;
          var essa = encodeURIComponent(myOtherUrl);
            function nextPage(){
                  window.location.href = "formBuild.php?tit="+titulo+"&&loc="+local+"&&img="+image+"&&dif="+dificuldade+"&&pre="+pref;
                }
              
          
          
      </script>
      
      

      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>