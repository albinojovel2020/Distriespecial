<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > USUARIOS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('CrearUsuario'); ?>" ><b>Nuevo usuario</b><i class="material-icons right grey-text text-darken-1">person_add</i></a></li>
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
                   <!--<?php //echo $_SESSION['id']?>-->
                    <div class="col s12 m12 l8 offset-l2">
                        <ul class="collection">
                            <li class="collection-item avatar">
                                <!--<?php //foreach($this->model->DatosUsuario() as $usuario): ?>-->
                                <!--<?php //echo $usuario->id_Usuarios; ?>-->
                                <i class="material-icons circle orange">account_circle</i>
                                <b><span class="title">Nombre:</span></b>
                                <p>
                                    <?php echo $r['nombre']?> 
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                            <li class="collection-item avatar">
                                 <i class="material-icons circle">account_box</i>
                                <b><span class="title">Apellido:</span></b>
                                <p>
                                   <?php echo $r['apellido']?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                            <li class="collection-item avatar">
                                <i class="material-icons circle green">date_range</i>
                                <b><span class="title">Edad:</span></b>
                                <p>
                                    <?php echo $r['edad']?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                            <li class="collection-item avatar">
                                <i class="material-icons circle red">assignment_ind</i>
                                <b><span class="title">Usuario:</span></b>
                                <p>
                                    <?php echo $r['usuario']?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                             <li class="collection-item avatar">
                                <i class="material-icons circle blue">security</i>
                                <b><span class="title">Contraseña:</span></b>
                                <p>
                                    <?php echo $r['password']?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                             <li class="collection-item avatar">
                                <i class="material-icons circle pink darken-4">beenhere</i>
                                <b><span class="title">Tipo de usuario:</span></b>
                                <p>
                                    <?php echo $r['tipo_usuario']?>
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                            </li>
                        </ul>

                    </div>
                
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