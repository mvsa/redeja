<?php
 $Questions = $_GET['qst'];
 $Alternatives = $_GET['alts'];
 $newsId = $_GET['nId'];

 
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
      
     
      
      <form method ="POST" action="../../controllers/surveyController.php">
              <input  type="hidden" name="type" value="simples">
              <input  type="hidden" name="qtdPerguntas" value="<?php echo $Questions; ?>">
              <input  type="hidden" name="qtdAlternativas" value="<?php echo $Alternatives; ?>">
               <input  type="hidden" name="newsId" value="<?php echo $newsId; ?>">
              <div class="mdl-card__supporting-text">
           
                <?php for ($i=1;$i<=$Questions;$i++){  ?>
                    <br>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input required class="mdl-textfield__input" type="text" name="titulo<?php echo $i; ?>" id="titulo<?php echo $i; ?>">
                        <label class="mdl-textfield__label" for="titulo<?php echo $i; ?>">Título da Questão</label>
                        <p style="width:300px">
                            <input class="mdl-slider mdl-js-slider" type="range" name="dif<?php echo $i; ?>" id="s<?php echo $i; ?>" min="1" max="5" value="1" step="1">
                          </p>
                      </div>
                    
                   <?php for ($j=1;$j<=$Alternatives;$j++){  ?>
                     <br>
                       <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-<?php echo $i.$j; ?>">
                          <input required type="radio" id="option-<?php echo $i.$j; ?>" class="mdl-radio__button" name="check<?php echo $i; ?>" value="<?php echo $i.$j; ?>">
                           <input required  class="mdl-textfield__input" type="text" name="alter<?php echo $i.$j; ?>" id="alter<?php echo $i.$j; ?>">
                           <label class="mdl-textfield__label" for="alter<?php echo $i.$j; ?>">Alternativa</label>
                        </label><br><br>
                     <?php } ?>    
                <?php } ?>
              </div>
                
                 <hr style="margin-top:">
                 
                  
                  
                 </div>
   
               <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="create"  class="btn btn-info btn-fill ">
              
      

        </form>
        
   
          <dialog class="mdl-dialog">
           <h4 class="mdl-dialog__title">Atenção</h4>
            <div class="mdl-dialog__content">
              <p>
                Preencha todos os campos e defina uma resposta correta para cada questão.
              </p>
            </div>
            <div class="mdl-dialog__actions">
              <button type="button" class="mdl-button close">Fechar</button>
            </div>
          </dialog>
      
             <script>
             
              $(window).load(function(){  dialog.showModal();})
              
              var dialog = document.querySelector('dialog');
              var showDialogButton = document.querySelector('#show-dialog');
              if (! dialog.showModal) {
                dialogPolyfill.registerDialog(dialog);
              }
      
              dialog.querySelector('.close').addEventListener('click', function() {
                dialog.close();
              });
      </script>     
         
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>