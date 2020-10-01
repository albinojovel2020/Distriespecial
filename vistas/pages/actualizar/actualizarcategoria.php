
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > CATEGORÍA > Editar > <u class="blue-text"><?php echo $categoria->nombre; ?></u></b></a></li>
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
         <form class="col s12" action="?c=<?php echo base64_encode('Categoria'); ?>&a=<?php echo base64_encode('ActualizarCategoria'); ?>" method="post">
        <input type="hidden"  value="<?php echo $categoria->idcategoria; ?>" name="idcategoria">
          <div class="row">
            <div class="input-field col s12">
            <br>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person</i>
              <input id="nombres" type="text" class="validate" value="<?php echo $categoria->nombre; ?>" name="nombres" required>
              <label for="nombres">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person_outline</i>
              <input id="descripcion" type="text" class="validate" value="<?php echo $categoria->descripcion; ?>" name="descripcion" required>
              <label for="descripcion">Descripción</label>
            </div>

            <!--<div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person_outline</i>
              <input id="idusuario" type="text" class="validate" value="<?php echo $categoria->idusuario; ?>" name="idusuario" required>
              <label for="idusuario">Usuario</label>
            </div>-->
           
            <div class="input-field col s12">
              <select class="" name="idusuario" id="idusuario" class="validate">

                <option value="<?php echo $categoria->idusuario; ?>"><?php echo $categoria->nombreusuario; ?></option>
                
                <option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['usuario']; ?></option>

                
              </select>

            </div>

            <div class="input-field col s12">
              <center>
                 <button class="btn waves-effect waves-light  green accent-4 hoverable" type="submit" name="editar" title="Editar registro">Guardar
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
<!-- fin del cuerpo -->
