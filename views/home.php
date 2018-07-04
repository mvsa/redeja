<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/db/db.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/queries.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/helpers/check.php'); 
?>

<!DOCTYPE html>
<html>
    
    <head>
      <meta charset="utf-8" />
        <link rel="stylesheet" href="../assets/mdl/material.min.css">
        <script src="../assets/mdl/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    </head>
    
    
    
    <body>
        
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Início</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
     
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php include 'sidebar.php' ?>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
    
    
    
        <hr style="margin-top:">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    
                <label class="mdl-textfield__label" for="map">Defina no mapa: </label>
            </div>   
                  
                  
             <div id="mapa" style='height:320px; width: 380px'></div>
             
             

               <p id="demo"></p>
                 <?php $markers = coordListJson($conn) ;    ?>
        
              <script>
              //Cloud9 possui um bug com chamadas php dentro de JS, essa definição de variavel foi feita aqui para que o codigo abaixo continue funcionando
               var list = <?php echo $markers; ?>      
              </script>
                         
             <script>  
             var arrayLength = list.length;
             
             var x = document.getElementById("demo");
                alert("Ative seu GPS");
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                    
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            
             function showPosition(position) {
             
                 map = new google.maps.Map(document.getElementById('mapa'), {
                  center: {lat: position.coords.latitude, lng: position.coords.longitude},
                  zoom: 14,
                  zoomControl: true,
                    
                 });
                 
                 
                 
                   var kCord =  (position.coords.latitude);
                   var pCord =  (position.coords.longitude);
                   
                              
                   
                   var Cord = new google.maps.LatLng(kCord, pCord);
                   //var teste = new google.maps.LatLng(l, ln);
                //  console.log(google.maps.geometry.spherical.computeDistanceBetween(Cord, teste));
             
                 
                 
                 var baseRadius = 1037.551770692913;
                
                var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                 marker = new google.maps.Marker({
                      map: map,
                       icon: iconBase + 'library_maps.png',
                      animation: google.maps.Animation.DROP,
                      position: {lat: position.coords.latitude, lng: position.coords.longitude}
                    });
                
                    
             for (var i = 0; i < arrayLength; i++) {
                 
                 
                 var lt = Number(list[i]['ltd']);
                 var lg =  Number(list[i]['lng']);
                 var loc = new google.maps.LatLng(lt, lg);
                 var distance = (google.maps.geometry.spherical.computeDistanceBetween(Cord, loc));
               
                if(distance <= baseRadius){                
                
                    markeri = new google.maps.Marker({
                      map: map,
                      animation: google.maps.Animation.DROP,
                      animation: google.maps.Animation.BOUNCE,
                      url: 'location/ativList.php?dd='+list[i]['id']+'&&nn='+list[i]['nome'], 
                      position: {lat: Number(list[i]['ltd']), lng: Number(list[i]['lng'])}
                      
                    });
                    
                      google.maps.event.addListener(markeri, 'click', (function(markeri, i) {
                        return function() {
                          window.location.href = markeri.url;
                       }
                      })(markeri, i));
                 }        
              }
       
                
                 var cityCircle = new google.maps.Circle({
                    strokeColor: '#77a6b2',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#e9e7f9',
                    fillOpacity: 0.35,
                    map: map,
                    center: {lat: position.coords.latitude, lng: position.coords.longitude},
                    radius: (1000) 
                  });   
                
                
                
                
                
            }
            
            
           
                
                
                
           

             
            
            
              
         
        
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2pVLSOjExrmhHVgus0SNwA9cfiBuwgpM&libraries=geometry"
    async defer></script>    
                  
                  
    </div>
    
    
    
    
    
    </div>
  </main>
</div>
        
    </body>
    
    
    
</html>