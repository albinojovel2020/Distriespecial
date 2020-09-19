  <nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Login'); ?>" ><b>Cancelar</b><i class="material-icons right grey-text text-darken-1">arrow_back</i></a></li>
    </ul>
  </div>
  </nav>
  <br>
  <br>
  <br>
  <div class="container">
  <div class="row">
    <div class="col s12 m6 l6 offset-l3">

      <div class="card-panel white blue-text">
       <div class="section">

        <!--   Form Section   -->
        <div class="row form-background">
          <form class="col s12" action="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('ActualizarContraseña'); ?>" method="post">
            <div class="row top20px bottom20px">
              <center>
               <h5 class=" grey-text text-darken-1">Por favor ingrese nueva contraseña</h5>
             </center>


             <input type="hidden"  value="<?php echo $_SESSION["iduser"]; ?>" name="idusuario">

             <div class="input-field col s12 m12">
              <i class="material-icons prefix form-icon">vpn_key</i>
              <input id="n_pass1" type="password" class="validate" name="n_pass1" required>
              <label for="n_pass1">Clave</label>
            </div>

            <div class="input-field col s12 m12">
              <i class="material-icons prefix form-icon">vpn_key</i>
              <input id="n_pass2" type="password" class="validate" name="n_pass2" required>
              <label for="n_pass2">Confirmar clave</label>
            </div>

            
            <div class="input-field col s12">
              <center>
                <button class="btn waves-effect waves-light green accent-4 hoverable" type="submit" name="guardar" title="Guardar registro">Enviar
                  <i class="material-icons right">send</i>
                </button>
              </center>

            </div>

          </div>
        </form>
      </div>
    </div>
  </div>


  </div>
  </div>
  </div>