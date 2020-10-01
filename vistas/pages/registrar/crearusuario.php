
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > USUARIOS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Usuario'); ?>" ><b>Volver</b><i class="material-icons right grey-text text-darken-1">arrow_back</i></a></li>
    </ul>
  </div>
</nav>
<br>  
<div class="container">

  <div class="card-panel grey lighten-5 blue-text">
   <div class="section">

    <!--   Form Section   -->
    <div class="row form-background">
      <form class="col s12" action="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('RegistrarUsuario'); ?>" method="post">
        <div class="row top20px bottom20px">

           <div class="input-field col s12">
              <i class="material-icons prefix form-icon">contacts</i>
              <label for="idtipousuario">Tipo de usuario</label>
              <br>
            </div>
            <div class="input-field col s12">              
                <i class="material-icons prefix form-icon">arrow_drop_down</i>
                <select id="idtipousuario" name="idtipousuario" class="validate" required>              
                    <?php foreach($this->modelTipoUsuario->ListarTiposUsuarios() as $r): ?>
                        <option value="<?php echo $r->idtipousuario; ?>"><?php echo $r->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person</i>
              <input id="nombres" type="text" class="validate" name="nombres" required autofocus>
              <label for="nombres">Nombres</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person_outline</i>
              <input id="apellidos" type="text" class="validate" name="apellidos" required>
              <label for="apellidos">Apellidos</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">phone</i>
              <input id="telefono" type="text" class="validate" name="telefono" required>
              <label for="telefono">Teléfono</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">account_circle</i>
              <input id="usuario" type="text" class="validate" name="usuario" required>
              <label for="usuario">Usuario</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">vpn_key</i>
              <input id="clave1" type="password" class="validate" name="clave1" required>
              <label for="clave1">Clave</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">vpn_key</i>
              <input id="clave2" type="password" class="validate" name="clave2" required>
              <label for="clave2">Confirmar clave</label>
            </div>

            <div class="input-field col s12">
              <i class="material-icons prefix form-icon">live_help</i>
              <label for="idpreguntasecreta">Pregunta secreta</label>
              <br>
            </div>
            <div class="input-field col s12">              
            <select id="idpreguntasecreta" name="idpreguntasecreta" class="validate" required>                
                <?php foreach($this->modelPreguntaSecreta->ListarPreguntasSecretas() as $r): ?>
                    <option value="<?php echo $r->idpreguntasecreta; ?>"><?php echo $r->nombre; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">keyboard</i>
              <input id="respuestasecreta1" type="password" class="validate" name="respuestasecreta1" required>
              <label for="respuestasecreta1">Respuesta</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">keyboard</i>
              <input id="respuestasecreta2" type="password" class="validate" name="respuestasecreta2" required>
              <label for="respuestasecreta2">Confirmar respuesta</label>
            </div> 
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light azul-ast hoverable" type="submit" name="guardar" title="Guardar registro">Guardar
                <i class="material-icons right">send</i>
              </button>
            </div>

          </div>
      </form>
    </div>
  </div>
</div>


</div>
<div class="container">
    <!-- floating button -->
    <div class="fixed-action-btn">
    <a href="?c=<?php echo base64_encode('Login');?>&a=<?php echo base64_encode('CerrarSesion');?>" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">exit_to_app</i></a>
</div>
<!-- fin del cuerpo -->