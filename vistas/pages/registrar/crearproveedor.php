
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > PROVEEDOR</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Proveedor'); ?>" ><b>Volver</b><i class="material-icons right grey-text text-darken-1">arrow_back</i></a></li>
    </ul>
  </div>
</nav>
<br>  
<div class="container">

  <div class="card-panel grey lighten-5 blue-text">
   <div class="section">

    <!--   Form Section   -->
    <div class="row form-background">
      <form class="col s12" action="?c=<?php echo base64_encode('Proveedor'); ?>&a=<?php echo base64_encode('RegistrarProveedor'); ?>" method="post">
        <div class="row top20px bottom20px">
            <div class="input-field col s12"> 

                <select id="idusuario" name="idusuario" class="validate" required>            
                    
                        <option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['usuario']; ?></option>
                    
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
              <i class="material-icons prefix form-icon">art_track</i>
              <input id="dui" type="text" class="validate" name="dui" required onkeyup="mascara(this,'-',patron1,true);" onkeypress="return justNumbers(event);">
              <label for="dui">Dui</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">phone</i>
              <input id="telefono" type="text" class="validate" name="telefono" required onkeyup="mascara(this,'-',patron3,true);" onkeypress="return justNumbers(event);">
              <label for="telefono">Teléfono</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">business</i>
              <input id="nombreempre" type="text" class="validate" name="nombreempre" required>
              <label for="nombreempre">Nombre Empresa</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">directions</i>
              <textarea id="direccion" name="direccion" class="materialize-textarea validate" required></textarea>
              <label for="direccion">Dirección Empresa</label>
            </div>
            <div class="input-field col s12">
              <center>
                <button class="btn waves-effect waves-light green accent-4 hoverable" type="submit" name="guardar" title="Guardar registro">Guardar
                <i class="material-icons right">save</i>
              </button>
              </center>
              
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