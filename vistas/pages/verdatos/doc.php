
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > MANUALES</b></a></li> 
    </ul>
    <ul class="right">
      <li><a title="Tablero" class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Tablero'); ?>&idusuario=<?php echo base64_encode($_SESSION["id"]); ?>" ><b>Tablero</b><i class="material-icons right grey-text text-darken-1">format_list_bulleted</i></a></li>
  </ul>
</div>
</nav>  
<!-- Modal Trigger -->
<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>
<div class="row">
    <div class="section">

      <!--   Data Section   -->
      <div class="row">
          <div class="col s12">
          <center>
          <?php
            if (isset($_SESSION['rol'])  && $_SESSION['rol'] == 1) {
            ?>
            <a title="Manual de Administrador" style="margin:10px;" class="waves-effect waves-light btn modal-trigger indigo lighten-2 grey-text text-darken-1" href="?c=<?php echo base64_encode('Doc'); ?>&a=<?php echo base64_encode('Admin'); ?>" target="pdf-frame"><b style="color:#000; ">Manual de Administrador</b></a>
            <?php } ?>
            
            <a title="Manual de Usuario" class="waves-effect waves-light btn modal-trigger indigo lighten-3 grey-text text-darken-1" href="?c=<?php echo base64_encode('Doc'); ?>&a=<?php echo base64_encode('Usuario'); ?>" target="pdf-frame"><b style="color:#000; ">Manual de Usuario</b></a>                  

            </center>
          </div>
        </div>
        </div>

          

    <div style="margin-left:45px; " class="container">
      <div class="row">
      
          <div class="col s12 m12 l6">
            <center>
                 <i class="material-icons large grey-text text-darken-1">location_city</i>
            </center>

            <h5 class="grey-text text-darken-1"><b>Distribuidora Especial</b></h5>
              <p class="grey-text text-darken-3" style="text-align: justify;">Para hornear y más, somos una empresa dedicada a la venta de productos de pasteleria ofreciendo una variedad de productos de alta calidad, que en convenio con la Universidad Luterana Salvadoreña y el grupo n°2 de Practicas Profecionales se desarrollo el presente sistema de inventario y facturación con el objetivo de automatizar los procesos administrativos de la antes mencionada empresa.</p>

          </div>
          <div class="col s12 m12 l6">
             <center>
                 <i class="material-icons large grey-text text-darken-1">assignment_ind</i>
             </center>

            <h5 class="grey-text text-darken-1"><b style="font-weight: bold; color: #000; text-decoration:underline;">Desarrollado por:</b></h5>
              <p style="font-weight: bold; color: #000;" class=""> * Jacqueline Ivette Hernández Vásquez<br> * Brayan Eleazar Rosales Alfaro<br> * Andrés Josué Hernández Pineda<br> * Luis Alberto Carranza Muñoz<br> * Norberto Alexander Fuentes Velado<br> * Rafael Albino Jovel Alfaro</p>

          </div>

      </div>
      </div>
    <div class="container">
      <div class="row">
      <center>
      <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Desarrollo de Sistema Web de Inventario y Facturación</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">J. Hernández & B. Rosales & A. Hernández & L. Carranza & N. Fuentes & R. Jovel </span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Reconocimiento-NoComercial-CompartirIgual 4.0 Internacional License</a>.
      </center>
    </div>
    </div>


</div>
<!-- fin del cuerpo -->