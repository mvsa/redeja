<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 

$id =  $_GET['dd'];
$noticia =  getNoticia($conn,$id);


 
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
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"></span>
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
            <div id="preview" style='height:250px; width: 320px'>
                
                <img style="max-width:100%;max-height:100%;" src="<?php echo $noticia['url_image'];?>"  />
                <hr>
            </div>
            <div style="margin-top:-38px;text-align: center;
                        text-justify: inter-word;" name ="titulo" style ="">
                 <h5><b><?php echo $noticia['titulo']?></b></h5>
                                    
            </div>  
             <div style="text-align: justify;  text-justify: inter-word;" name ="titulo" style ="">
                 <h6><?php echo $noticia['texto']?></h6>
                                    
            </div>  
                 
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     
    <input onclick="responsiveVoice.speak('<?php echo $noticia['texto']; ?>','Brazilian Portuguese Female');" type="button" value="Ouvir" />
     
            
            
                <hr>

                <a style="float:right" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="resolve.php?dd=<?php echo $id; ?>">Próximo</a>

        </div>
        
        
     </div>
    
      
      
     
      
   

      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>