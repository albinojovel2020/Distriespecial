<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>Distribuidora Especial > Restaurar</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="#modal1" ><b>Info.</b><i class="material-icons right grey-text text-darken-1">info</i></a></li>
  </ul>
</div>
</nav>  
<!--<div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
  </div>-->
<div class="container">
    <div class="row">
        <div class="col s12 m6 l6 offset-l3" >
            <div class="card-panel blue-text text-darken-2" style="">
                <div class="row">
                    <center>
                        <label><b><h5 class="grey-text text-darken-1">Selecciona un punto de restauración</h5></b></label><br>
                        <img class="error_login img-responsive" src="vistas/img/backup.svg" alt="">
                    <form action="?c=<?php echo base64_encode('Respaldar');?>&a=<?php echo base64_encode('Guardar1');?>" method="POST">
                        <div class="input-field col s12">
                            <select name="restorePoint" >
                            <option value="" disabled="" selected="">Selecciona un punto de restauración</option>
                            <?php
                            require_once 'modelo/Conexion.php';
                            $ruta=BACKUP_PATH;
                            if(is_dir($ruta)){
                                if($aux=opendir($ruta)){
                                    while(($archivo = readdir($aux)) !== false){
                                        if($archivo!="."&&$archivo!=".."){
                                            $nombrearchivo=str_replace(".sql", "", $archivo);
                                            $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                            $ruta_completa=$ruta.$archivo;
                                            if(is_dir($ruta_completa)){
                                            }else{
                                                echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                            }
                                        }
                                    }
                                    closedir($aux);
                                }
                            }else{
                                echo $ruta." No es ruta válida";
                            }
                            ?>
                        </select>
                        </div>
                        
                        
                        
                        
                            <button class="btn waves-effect waves-light  green accent-4" type="submit" name="restore" style="">Restaurar<i class="material-icons right">send</i></button>
                        </center>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>