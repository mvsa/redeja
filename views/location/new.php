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
      
     
      
      <form>
              
              <div class="mdl-card__supporting-text">
   
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="nome" id="nome">
                    <label class="mdl-textfield__label" for="nome">Nome</label>
                  </div> 
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="image" id="image">
                    <label class="mdl-textfield__label" for="image">Imagem</label>
                  </div> 
                 
                 
  
              </div>
                
                 <hr style="margin-top:">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    
                    <label class="mdl-textfield__label" for="map">Defina no mapa: </label>
                  </div>   
                  
                  
                  <div id="mapa" style='height:320px; width: 380px'></div>
                  
                  
                 </div>
   
      <button name="submit" type="submit" value="Submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Enviar</button>
      
      

        </form>
         <?php $markers = coordListJson($conn) ;    ?>
      
      <script>
      //Cloud9 possui um bug com chamadas php dentro de JS, essa definição de variavel foi feita aqui para que o codigo abaixo continue funcionando
       var list = <?php echo $markers; ?>      
      </script>
      
    <script>
      var arrayLength = list.length;
      var ltg;
      var map;
      var marker;
      function initMap() {
                map = new google.maps.Map(document.getElementById('mapa'), {
                  center: {lat: -8.0367853, lng: -34.944557599999996},
                  zoom: 14,
                  zoomControl: true,
        
                });
                
                marker = new google.maps.Marker({
                  
                    map: map,
                    
                     animation: google.maps.Animation.DROP,
                   //icon: image
                  });
               
             for (var i = 0; i < arrayLength; i++) {
                
                    markeri = new google.maps.Marker({
                      map: map,
                      animation: google.maps.Animation.DROP,
                      position: {lat: Number(list[i]['ltd']), lng: Number(list[i]['lng'])}
                    });
                        
                }
                
                   
                 google.maps.event.addListener(map,'click', function(e) {
                   var latLng = e.latLng;
                   ltg = e.latLng;
                   var latitude = e.latLng.lat();
                  var longitude = e.latLng.lng();
                 
                  //image = clientURL + "/common/images/markers/red.png";
                  
                  marker.setPosition(latLng);
                  marker.setAnimation(google.maps.Animation.BOUNCE);
                  map.panTo(latLng);
                 });
                 
         
        
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2pVLSOjExrmhHVgus0SNwA9cfiBuwgpM&callback=initMap"
    async defer></script>
    <script>
              var image1;
              var nome1;
              $("#nome").change(
                 function(){
                 if ($(this).val()) {
                  nome1 = ($(this).val());
                    
                } 
              }
            );
           
            
               $("#image").change(
                 function(){
                 if ($(this).val()) {
                  image1 = ($(this).val());
                 
                } 
              }
            );
            
            
                $('form').on('submit', function (e) {
                 
                  e.preventDefault();
             
                
                  $.ajax({
                    type: 'post',
                    dataType    : 'text',
                    url: '../../controllers/locationController.php',
                    data: { create : {
                                    nome: nome1,
                                    image:image1,
                                    lat:ltg.lat(),
                                    lng:ltg.lng()
                                    }
                            },
                    success: function () {
                      alert("Localidade criada!")
                     window.location='results.php'
                    }
                  });
        
                });
            
              
    </script>
                  
 
      
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>