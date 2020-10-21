
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > UNIDAD DE MEDIDA > Editar > <u class="blue-text"><?php echo $umedida->nombre; ?></u></b></a></li>
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
         <form class="col s12" action="?c=<?php echo base64_encode('Umedida'); ?>&a=<?php echo base64_encode('ActualizarUmedida'); ?>" method="post">
        <input type="hidden"  value="<?php echo $umedida->id; ?>" name="idumedida">
          <div class="row">
            <div class="input-field col s12">
            <br>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person</i>
              <input id="nombre" type="text" class="validate" value="<?php echo $umedida->nombre; ?>" name="nombre" required>
              <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">codigo</i>
              <input id="codigo" type="text" class="validate" value="<?php echo $umedida->codigo; ?>" name="codigo" required>
              <label for="codigo">Codigo</label>
            </div>

             <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">codigo</i>
              <textarea id="descripcion"  class="validate materialize-textarea" name="descripcion" required><?php echo $umedida->descripcion; ?></textarea> 
              <label for="descripcion">Descripcion</label>
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
