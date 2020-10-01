



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
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col s12 m6 l6 offset-l3">
           <div class="card-panel white">  
            <div class="row">
                <form  class="col s12 m6 l12" action="?c=<?php echo base64_encode('Usuario');?>&a=<?php echo base64_encode('Recuperar');?>" method="post" enctype="multipart/form-data">
                    <center>
                        <h5 class="blue-text">Recuperar contraseña</h5>
                    </center> 
                    <div class="input-field col s12 m12 l12 lg_lt">
                        <i class="material-icons prefix blue-text text-darken-4">account_circle</i>
                        <input data-error="wrong" data-success="right" id="usuario" name="usuario" id="icon_prefix" type="text"  required>
                        <!--<input id="uname" name="uname" type="text" >-->
                        <label for="usuario">Ingrese su usuario</label>
                        <!--<span class="helper-text" data-error="Ingrese usuario" data-success="completado"></span>-->
                        <span class="error" aria-live="polite"></span>

                    </div>
                     <div class="input-field col s12">              
           
            <select id="idpreguntasecreta" name="idpreguntasecreta" class="validate" required>                
                <?php foreach($this->modelPreguntaSecreta->ListarPreguntasSecretas() as $r): ?>
                    <option value="<?php echo $r->idpreguntasecreta; ?>"><?php echo $r->nombre; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="input-field col s12 m12">
             
              <input id="respuestasecreta1" type="password" class="validate" name="respuestasecreta1" required>
              <label for="respuestasecreta1">Respuesta</label>
            </div>
                    <center>
                        <a class="waves-effect waves-light btn red" href="?c=<?php echo base64_encode('Login'); ?>" >Cancelar<i class="material-icons right">cancel</i></a>
                        <button class="btn waves-effect waves-light green accent-4" type="submit">Enviar
                            <i class="material-icons right">check_circle</i>
                        </button>
                    </center>

                </form>
            </div>         
        </div>
    </div>
</div>
</div>


<br>
<br>
<br><br><br>
<br>

<footer class="page-footer teal white ">
    <div class="footer-copyright  white">
        <div class="container grey-text text-darken-1">
           <b> © 2020 Copyright Distribuidora especial</b>
           <a class="grey-text text-darken-1 right" href="#!"><b>Equipo #2 practicas profesionales ULS</b></a>
       </div>
   </div>
</footer>