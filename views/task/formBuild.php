<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 

$titulo = $_GET['tit'];
$local = $_GET['loc'];
$url = $_GET['img'];
$dificuldade = $_GET['dif'];
$preferencia = $_GET['pre'];
 
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
      
     
      
       <form method ="POST" action="../../controllers/taskController.php">
              
              <div class="mdl-card__supporting-text">
                 <div id = "first">    
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="enunciado" id="enunciado">
                    <label class="mdl-textfield__label" for="enunciado">Enunciado</label>
                  </div> 
                  
                  <input type="hidden" name="titulo" value="<?php echo $titulo ?>" /> 
                  <input type="hidden" name="local" value="<?php echo $local ?>" /> 
                  <input type="hidden" name="url" value="<?php echo $url ?>" />
                  <input type="hidden" name="dificuldade" value="<?php echo $dificuldade ?>" />
                  <input type="hidden" name="preferencia" value="<?php echo $preferencia ?>" /> 
                  
                   
                    <?php for ($j=1;$j<=5;$j++){  ?>
                     <br>
                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                          <input required type="radio" name="answer" value="<?php echo $j; ?>" class="mdl-radio__button"></input>
                           <input required  class="mdl-textfield__input" type="text" name="alter<?php echo $j; ?>" id="alter<?php echo $j; ?>">
                        
                        </label><br><br>
                     <?php } ?>   
                     
                    
                 </div>
              </div>  
                 <hr style="margin-top:">
                
   
          <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="create"  class="btn btn-info btn-fill ">
      
      

        </form>
      
      
     
      
   

      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>