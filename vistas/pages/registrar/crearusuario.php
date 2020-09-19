
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

  <div class="card-panel grey lighten-4 blue-text">
     <div class="section">

      <!--   Form Section   -->
      <div class="row form-background">
        <form class="col s12 ">
          <div class="row">
            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">person</i>
              <input id="nombres" type="text" class="validate">
              <label for="nombres">Nombres</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">person_outline</i>
              <input id="apellidos" type="text" class="validate">
              <label for="apellidos">Apellidos</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">phone</i>
              <input id="telefono" type="text" class="validate">
              <label for="telefono">Teléfono</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">face</i>
              <input id="email" type="email" class="validate">
              <label for="email">Usuario</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">vpn_key</i>
              <input id="clave1" type="password" class="validate">
              <label for="clave1">Clave</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">offline_pin</i>
              <input id="clave2" type="password" class="validate">
              <label for="clave2">Confirmar clave</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <select id="idpreguntasecreta" name="idpreguntasecreta" class="validate">
                <option value="1">Pregunta 1</option>
                <option value="2">Pregunta 2</option>
                <option value="3">Pregunta 3</option>
              </select>
               <label>Pregunta secreta</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">keyboard</i>
              <input id="respuestasecreta1" type="password" class="validate">
              <label for="respuestasecreta1">Respuesta</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <i class="material-icons prefix form-icon">keyboard</i>
              <input id="respuestasecreta2" type="password" class="validate">
              <label for="respuestasecreta2">Confirmar respuesta</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <select id="idtipousuario" name="idtipousuario" class="validate">
                <option value="1">Tipo 1</option>
                <option value="2">Tipo 2</option>
                <option value="3">Tipo 3</option>
              </select>
              <label for="respuestasecreta1">Tipo usuario</label>
            </div>
            
            <div class="input-field col s12">
              <center>
                  <button class="btn waves-effect waves-light azul-ast hoverable" type="submit" name="guardar" title="Guardar registro">Guardar
                <i class="material-icons right">save</i>
              </button>
              <button class="btn waves-effect waves-light red hoverable" type="submit" name="guardar" title="Guardar registro">Cancelar
                <i class="material-icons right">cancel</i>
              </button>
              </center>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
   
    
  </div>
<!-- fin del cuerpo -->