
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > USUARIOS > Editar > <u class="blue-text"><?php echo $usuario->apellido; ?></u></b></a></li>
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
         <form class="col s12" action="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('ActualizarUsuario'); ?>" method="post">
        <input type="hidden"  value="<?php echo $usuario->idusuario; ?>" name="idusuario">
          <div class="row">
            <div class="input-field col s12">
            <br>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person</i>
              <input id="nombres" type="text" class="validate" value="<?php echo $usuario->nombre; ?>" name="nombres" required>
              <label for="nombres">Nombres</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person_outline</i>
              <input id="apellidos" type="text" class="validate" value="<?php echo $usuario->apellido; ?>" name="apellidos" required>
              <label for="apellidos">Apellidos</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">phone</i>
              <input id="telefono" type="text" class="validate" value="<?php echo $usuario->telefono; ?>" name="telefono" required onkeyup="mascara(this,'-',patron3,true);" onkeypress="return justNumbers(event);">
              <label for="telefono">Teléfono</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">account_circle</i>
              <input id="usuario" type="text" class="validate" value="<?php echo $usuario->usuario; ?>" name="usuario" required>
              <label for="usuario">Usuario</label>
            </div>
           
            <div class="input-field col s12">
              <select class="" name="idtipousuario" id="idtipousuario" class="validate" required>

                <option value="<?php echo $usuario->idtipousuario; ?>"><?php echo $usuario->tipo; ?></option>
                <?php foreach($this->modelTipoUsuario->ListarTiposUsuarios() as $r): ?>
                  <option value="<?php echo $r->idtipousuario; ?>"><?php echo $r->nombre; ?></option>
                <?php endforeach; ?>
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
