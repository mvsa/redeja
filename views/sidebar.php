<?php 
session_start();
$usern = $_SESSION['username'];


?>


   <header class="demo-drawer-header mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
          <img style="padding-left: 50px;padding-top:10px" src="../../images/user.png" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span style="padding-left: 50px;padding-top:05px"><?php echo $usern ?></span>
             <span style="padding-left: 50px;padding-top:05px">hello@example.com</span>
            <div class="mdl-layout-spacer"></div>
         
          </div>
        </header>
        <nav style="height:75%" class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link mdl-color-text--blue-grey-50" href="../../views/home.php"><i class="mdl-color-text--blue-grey-50 material-icons" role="presentation">home</i>Início</a>
          <a class="mdl-navigation__link mdl-color-text--blue-grey-50" href="../../views/noticia/new.php"><i class="mdl-color-text--blue-grey-50 material-icons" role="presentation">note_add</i>Nova Notícia</a>
          <a class="mdl-navigation__link mdl-color-text--blue-grey-50" href="../../views/location/new.php"><i class="mdl-color-text--blue-grey-50 material-icons" role="presentation">place</i>Nova Localidade</a>
          <a class="mdl-navigation__link mdl-color-text--blue-grey-50" href="../../views/preference/new.php"><i class="mdl-color-text--blue-grey-50 material-icons" role="presentation">list_alt</i>Nova preferência</a>
          <a class="mdl-navigation__link mdl-color-text--blue-grey-50" href="../../views/task/new.php"><i class="mdl-color-text--blue-grey-50 material-icons" role="presentation">extension</i>Nova atividade</a>
           <br><hr>
        <a class="mdl-navigation__link mdl-color-text--blue-grey-50" href=""><i class="mdl-color-text--blue-grey-50 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span>Configurações</a><br>
        <i class="mdl-color-text--blue-grey-50 material-icons" role="presentation"></i><span class="visuallyhidden">Help</span><br>

           
        </nav>
        
        
