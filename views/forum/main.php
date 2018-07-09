<!DOCTYPE html>
<html>
    
    <head>
      <meta charset="utf-8"/>
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
      <span class="mdl-layout-title">Fórum de discussão</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include '../sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      
              
     <div class="mdl-grid demo-content">

            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title  mdl-color--indigo-200">
                <h2 class="mdl-card__title-text">Tópicos abertos:</h2>
              </div>
                 <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric"><h6 style="color:black">NOME</h6></th>
                          <th><h6 style="color:black">Mensagens</h6></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="color:blue" class="mdl-data-table__cell--non-numeric">Como criar atividades?</td>
                          <td>25</td>
                         
                        </tr>
                        <tr>
                          <td style="color:blue" class="mdl-data-table__cell--non-numeric">Dúvida atividade Inicial</td>
                          <td>50</td>
                        
                        </tr>
                        <tr>
                          <td style="color:blue" class="mdl-data-table__cell--non-numeric">Onde ficam minhas notas?</td>
                          <td>10</td>
                     
                        </tr>
                         <tr>
                          <td style="color:blue" class="mdl-data-table__cell--non-numeric">Discussão Atividade 3</td>
                          <td>10</td>
                     
                        </tr>
                      </tbody>
                    </table>
                 
            </div>

       </div>
      
      
      
      
      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>