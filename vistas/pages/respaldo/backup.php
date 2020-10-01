<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>Distribuidora Especial > Backup</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="#modal1" ><b>Info.</b><i class="material-icons right grey-text text-darken-1">info</i></a></li>
  </ul>
</div>
</nav>  
<div class="container">
    <div class="row">
        <div class="col s6 offset-s3" >
            <div class="card-panel blue-text text-darken-2" style=" ">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <center>
                            <label><b><h5 class="grey-text text-darken-1">Realizar Copia de Base de Datos</h5></b></label><br>
                        <img class="error_login img-responsive" src="vistas/img/backup.svg" alt="">

                       <p class="black-text">Para realizar una copia de seguridad pulse el siguiente botón, si el sistema presenta un inconveniente en cuanto a base de datos se refiere puede seleccionar el punto de restaturacion en el apartado correspondiente</p><br>
                        
                           <a href="?c=<?php echo base64_encode('Respaldar');?>&a=<?php echo base64_encode('Guardar');?>" class="waves-effect waves-light btn  green accent-4"><i class="material-icons left">cloud_download</i>Backup</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>