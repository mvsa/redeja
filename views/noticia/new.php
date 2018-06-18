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
        
    </head>
    
    
    
    <body>
        
        
        
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Title</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      
     
      
      <form method ="POST" action="../../controllers/noticiaController.php">
              
              <div class="mdl-card__supporting-text">
   
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="titulo" id="titulo">
                    <label class="mdl-textfield__label" for="titulo">Título</label>
                  </div> 
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="url" id="url">
                    <label class="mdl-textfield__label" for="url">Url da notícia</label>
                  </div> 
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="imagem" id="imagem">
                    <label class="mdl-textfield__label" for="imagem">Url de imagem</label>
                  </div> 
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="dificuldade" name="dificuldade">
                      <option></option>
                      <option value="1">Iniciante</option>
                      <option value="2">Intermediário</option>
                      <option value="3">Avançado</option>
                    </select>
                    <label class="mdl-textfield__label" for="dificuldade">Dificuldade</label>
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
                    <select class="mdl-textfield__input" id="avaliac" name="avaliac">
                      <option></option>
                      <option value="1">Questionário</option>
                      <option value="2">3 Etapas</option>
                    </select>
                    <label class="mdl-textfield__label" for="avaliac">Método de avaliação</label>
                  </div>
                                 
                 
  
              </div>
                
                 <hr style="margin-top:">
                 <div class="mdl-textfield mdl-js-textfield">
                  <textarea class="mdl-textfield__input" name="texto" type="text" rows="4" 
                   id="texto"></textarea>
                  <label class="mdl-textfield__label" for="texto">Texto Resumo</label>
                </div>
   
                  
                  
                 </div>
   
                  <input  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Enviar" type="submit" name="create"  class="btn btn-info btn-fill ">
      
      

        </form>
        
 
      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>