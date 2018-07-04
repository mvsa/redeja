<?php

session_start(); //mudar isso
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 

$cr = $_SESSION['gab3etp'];
$id = $_GET['dd'];
$questao =  get3etpEnum($conn,$id);
$alternativas = get3etpAlts($conn,$questao['id']);


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
      <span class="mdl-layout-title">Correção</span>
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
                 <div id = "first">    
                    <div name ="enunciado" style ="word-wrap: break-word;">
                         <h5><?php echo $questao['enunciado']?></h5>
                         <hr>
                         <br>            
                     </div>
                    <?php
                   
                     foreach ($alternativas as $alternativa){ ?>
                     
                     
                      <?php 
                          
                            if($cr == 0){ //se a questão foi acertada
                                if($alternativa['is_correta']==1){
                                    $checked = "checked";
                                    $color = green;
                                }else{
                                    $checked = "null";
                                    $color = red;
                                }
                            }else{ //se errou
                                 if($alternativa['is_correta']==1){ 
                                     $color = green;
                                    $checked = "null";
                                }else{
                                    
                                    if($cr == $alternativa['id']){
                                        $checked = "checked";
                                     
                                    }else{
                                        $checked = "null";
                                        
                                       
                                    }
                                    $color = red;
                                }
                            }
                          
                          
                          
                          ?>
                     
                     
                     <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                          <input disabled <?php echo $checked; ?>  type="radio" name="answer" value="<?php echo $alternativa['id']; ?>" class="mdl-radio__button"></input>
                           <label  style="color:<?php echo $color?>"><?php echo $alternativa['alternativa']?></label>
                        </label><br><br>
                      	
                     <?php } ?>
                 
                  
                   
                
                    
                 </div>
                      <hr>
                
   
                    <a style="float:right" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="resolve3Etapas3.php?dd=<?php echo $id;?>">PRÓXIMO</a>      
      
              </div>  
                
                
                 
                  
                  
                 </div>
   
               
   
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>