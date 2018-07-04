<?php


include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 

$id = $_GET['dd'];
$Questions =  getQsQuestions($conn,$id);
$Qtd = count($Questions);

 
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
      <span class="mdl-layout-title">Questionário</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      
     
      
      <form method ="POST" action="../../controllers/resolveController.php">
           
              <div class="mdl-card__supporting-text">
              <input type="hidden" name= "qtd" value = "<?php echo $Qtd ?>"></input>
               <input type="hidden" name= "nid" value = "<?php echo $id ?>"></input>
             <?php $count = 0; ?>    
             <?php foreach ($Questions as $question){ ?>
                <?php $count++; ?>     
                   <div name ="enunciado" style ="word-wrap: break-word;">
                         <hr>
                         <h5><?php echo $question['enunciado']?></h5>
                         <input type="hidden" name= "enunid<?php echo $count?>" value = "<?php echo $question ['id']?>"></input>
                         
                         <br>            
                     </div>
                     
                       <?php
                     $Alternatives = getQsAlts($conn,$question['id']);    
                     foreach ($Alternatives as $alternativa){ ?>
                     
                     <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                          <input  type="radio" name="alt<?php echo $count; ?>" value="<?php echo $alternativa['id']; ?>" class="mdl-radio__button"></input>
                           <label><?php echo $alternativa['alternativa']?></label>
                        </label><br><br>
                      	
                     <?php } ?>
                     
                     
                     
                     
                      	
         <?php } ?>
                    
                
              </div>
                
                 <hr style="margin-top:">
                 
                  
                  
                 </div>
   
               <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="submitQs"  class="btn btn-info btn-fill ">
              
      

        </form>
        
   
    

         
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>