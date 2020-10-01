
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > CATEGORÍA</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Categoria'); ?>" ><b>Volver</b><i class="material-icons right grey-text text-darken-1">arrow_back</i></a></li>
    </ul>
  </div>
</nav>
<br>  
<div class="container">

  <div class="card-panel grey lighten-5 blue-text">
   <div class="section">

    <!--   Form Section   -->
    <div class="row form-background">
      <form class="col s12" action="?c=<?php echo base64_encode('Categoria'); ?>&a=<?php echo base64_encode('RegistrarCategoria'); ?>" method="post">
        <div class="row top20px bottom20px">
            <div class="input-field col s12"> 

                <select id="idusuario" name="idusuario" class="validate" required>             
                    
                  <option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['usuario']; ?></option>
                    
                  </select>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person</i>
              <input id="nombres" type="text" class="validate" name="nombres" required autofocus>
              <label for="nombres">Nombre</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">description</i>
              <input id="descripcion" type="text" class="validate" name="descripcion" required>
              <label for="descripcion">Descripción</label>
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