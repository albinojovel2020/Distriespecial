



<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>Sistema de inventario y facturacion Distribuidora Especial</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="#modal1" ><b>Info.</b><i class="material-icons right grey-text text-darken-1">info</i></a></li>
  </ul>
</div>
</nav>  


<div class="login1 col s12 m6 l6">
            <div class="dt">
                <div class="card-panel white">  
                    <div class="row">
                        <form  class="col s12" action="?c=<?php echo base64_encode('Usuario');?>&a=<?php echo base64_encode('Recuperar');?>" method="post" enctype="multipart/form-data">
                            <center>
                                <h5 class="azul-ast-text">Recuperar contraseña</h5>
                            </center> 
                            
                                <div class="input-field col s12 m12 l12 lg_lt">
                                    <i class="material-icons prefix blue-text text-darken-4">account_circle</i>
                                    <input data-error="wrong" data-success="right" id="usuario" name="usuario" id="icon_prefix" type="text"  required>
                                    <!--<input id="uname" name="uname" type="text" >-->
                                    <label for="usuario">Ingrese su usuario</label>
                                    <!--<span class="helper-text" data-error="Ingrese usuario" data-success="completado"></span>-->
                                    <span class="error" aria-live="polite"></span>

                                </div>
<!--
                                <div class="input-field col s12">
                                    <i class="material-icons prefix blue-text text-darken-4">lock</i>
                                    <input id="clave" name="clave" id="icon_telephone" type="password" class="validate" required>
                                    <label for="icon_telephone">Contraseña</label>
                                    <span class="helper-text" data-error="Ingrese Contraseña" data-success="completado"></span>
                                </div>
-->
                            
                            <center>
                                <button class="btn waves-effect waves-light green accent-4" type="submit">Iniciar
                                    <i class="material-icons right">check_circle</i>
                                </button>
                            </center>

                        </form>
                    </div>         
                </div>
            </div>
        </div>




<br>





<footer class="page-footer teal white ">

    <div class="footer-copyright  white">
        <div class="container grey-text text-darken-1">
         <b> © 2020 Copyright Distribuidora especial</b>
         <a class="grey-text text-darken-1 right" href="#!"><b>Equipo #2 practicas profesionales ULS</b></a>
     </div>
 </div>
</footer>