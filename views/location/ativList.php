<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 

$id =  $_GET['dd'];

$exercicios =  getAllExe($conn,$id);   


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
      <span class="mdl-layout-title"><?php echo $_GET['nn'];?></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content mdl-color--grey-100">
    <div class="page-content">

             
     <div class="mdl-grid demo-content">

            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title  mdl-color--indigo-200">
                <h2 class="mdl-card__title-text">Atividades Disponíveis</h2>
              </div>
            <?php if ($exercicios == NULL ){?>
                   <h6 style='padding-left:20px'>Nenhuma atividade no momento :(</h6>
                   
              <?php }else{ ?>
              <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
          
              
                  <tbody>
                    <?php foreach($exercicios as $exercicio) { ?>
                    <tr>
                        
                    
                      <td style="padding-left:1apx;" class="mdl-data-table__cell--non-numeric "><a style="padding-left:1px;padding-right:1px;text-transform: none;" class="mdl-button mdl-js-button mdl-button--raised" href="../../controllers/resolveController.php?id=<?php echo $exercicio['id'] ?>"><?php echo $exercicio['titulo']; ?></a></td>
                                         

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <?php } ?>
            
            </div>

       </div>
                
                
      
      
                  
 
      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>