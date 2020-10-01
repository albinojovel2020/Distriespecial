<!--<?php
/*$mysqli = new mysqli('localhost', 'root', '', 'alquiler_Flores');
$id=$_SESSION['id'];
$query3 = $mysqli -> query ("SELECT U.nombre, U.apellido, U.edad, U.usuario, U.password, T.tipo_usuario from Usuarios U inner join tipo_Usuario T "
. "on U.id_tipo_Usuario = T.id_tipo_Usuario WHERE U.id_Usuarios = $id");

foreach ($query3 as $r):*/
?>-->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > USUARIOS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('CambiarPasss'); ?>" ><b>Cambiar Contraseña</b><i class="material-icons right grey-text text-darken-1">vpn_key</i></a></li>
  </ul>
</div>
</nav> 

<div class="container">
            <div class="card-panel text-darken-2">
                <!--               <br>-->
                <div id="cuarto" class="row"> 
                   <center>
                        <h4>Datos de usuario</h4>
<!--                        <i class="material-icons circle small">account_circle</i>-->
                   </center>
                   <!--<?php// foreach($this->model->ListarUsuario() as $r):?>-->
                    <div class="col s12 m12 l8 offset-l2">
                        <ul class="collection">
                            <li class="collection-item avatar">
                               <input type="hidden"  value="<?php echo $usuario->idusuario; ?>" name="idusuario">
                                <i class="material-icons circle orange">account_circle</i>
                                <b><span class="title">Nombre:</span></b>
                                <p>
                                    <?php echo $usuario->nombre;?> 
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                            <li class="collection-item avatar">
                                 <i class="material-icons circle">account_box</i>
                                <b><span class="title">Apellido:</span></b>
                                <p>
                                   <?php echo $usuario->apellido;?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                            <li class="collection-item avatar">
                                <i class="material-icons circle green">local_phone</i>
                                <b><span class="title">Telefono:</span></b>
                                <p>
                                    <?php echo $usuario->telefono;?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                            <li class="collection-item avatar">
                                <i class="material-icons circle red">assignment_ind</i>
                                <b><span class="title">Usuario:</span></b>
                                <p>
                                    <?php echo $usuario->usuario;?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                             <li class="collection-item avatar">
                                <i class="material-icons circle pink darken-4">beenhere</i>
                                <b><span class="title">Tipo de usuario:</span></b>
                                <p>
                                    <?php echo $usuario->tipo;?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                        </ul>

                    </div>
                    <!--<?php //endforeach; ?>  -->
                </div>
            </div>
        </div>


<footer class="page-footer teal white ">

    <div class="footer-copyright  white">
        <div class="container grey-text text-darken-1">
         <b> © 2020 Copyright Distribuidora especial</b>
         <a class="grey-text text-darken-1 right" href="#!"><b>Equipo #2 practicas profesionales ULS</b></a>
     </div>
 </div>
</footer>