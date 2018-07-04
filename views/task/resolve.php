<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 

$id =  $_GET['dd'];
$questao =  getIntMidi($conn,$id);
$alternativas = getIntMidiAlts($conn,$id);
$aux = $questao ['url'];
$url = getUrl($aux);

 
?>
<!DOCTYPE html>
<html>
    
    <head>
    
       <meta charset="UTF-8">
        <link rel="stylesheet" href="../../assets/mdl/material.min.css">
        <script src="../../assets/mdl/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    
    
    
    <body>
        
        
        
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div style="padding: 0 16px 0 52px; !important;" class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><h6><?php echo $questao['titulo']?></h6></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      
             
      
      <div class="mdl-card__supporting-text">
        <iframe id="ytplayer" type="text/html" width="640" height="360"
  src="https://www.youtube.com/embed/<?php echo $url; ?>"
  frameborder="0"></iframe>
        
    
     </div>
      
       <form method ="POST" action="../../controllers/resolveController.php">
           
              
              <div class="mdl-card__supporting-text">
                  
                 <div id = "first">    
                    <div name ="enunciado" style ="word-wrap: break-word;">
                         <h5><?php echo $questao['enunciado']?></h5>
                         <hr>
                         <br>            
                     </div>
                    <?php
                   
                     foreach ($alternativas as $alternativa){ ?>
                     
                     <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                          <input required type="radio" name="answer" value="<?php echo $alternativa['id']; ?>" class="mdl-radio__button"></input>
                           <label><?php echo $alternativa['alternativa']?></label>
                        </label><br><br>
                      	
                     <?php } ?>
                     <input type="hidden" name="id" value="<?php echo $id; ?>" ></input> 
                  
                   
                
                    
                 </div>
              </div>  
                 <hr>
                
   
          <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="submittask"  class="btn btn-info btn-fill ">
      
      

        </form>
      
      
     
      
   

      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>