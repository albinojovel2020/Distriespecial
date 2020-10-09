
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > PRODUCTO > Ingreso de producto > <u class="blue-text"><?php echo $producto->nombre; ?></u></b></a></li>
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Movimientos'); ?>" ><b>Volver</b><i class="material-icons right grey-text text-darken-1">arrow_back</i></a></li>
    </ul>
  </div>
</nav>
<br>
<div class="container">

  <div class="card-panel grey lighten-5 blue-text">
    <div class="section">

      <!--   Form Section   -->
      <div class="row form-background">
         <form class="col s12" action="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('ActualizarStockProducto'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden"  value="<?php echo $producto->idproducto; ?>" name="idproducto">
          <div class="row">
            <div class="input-field col s12">
            <br>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person</i>
              <input disabled id="nombres" type="text" class="validate" value="<?php echo $producto->nombre; ?>" name="nombres" required>
              <label for="nombres">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">description</i>
              <input disabled id="descripcion" type="text" class="validate" value="<?php echo $producto->descripcion; ?>" name="descripcion" required>
              <label for="descripcion">Apellidos</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">monetization_on</i>
              <input disabled id="precio" type="text" class="validate" name="precio" value="<?php echo $producto->precio; ?>" required maxlength="6" onkeypress="return justNumbers(event);">
              <label for="precio">Precio Unitario</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">loupe</i>
              <input id="stock" type="number" min="1" class="validate" value="0" name="stock" required>
              <label for="stock">Cantidad a Ingresar</label>
            </div>

            <div class="input-field col s12 m6"> 

                <select disabled id="idcategoria" name="idcategoria" class="validate" required><option value="<?php echo $producto->idcategoria; ?>"><?php echo $producto->nombrecate; ?></option>            
                    <?php foreach($this->modelCategoria->ListarCategoria() as $r): ?>
                        <option value="<?php echo $r->idcategoria; ?>"><?php echo $r->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>

            <div class="input-field col s12 m6"> 

                <select id="idproveedor" disabled name="idproveedor" class="validate" required>      <option value="<?php echo $producto->idproveedor; ?>"><?php echo $producto->nombreprove; ?></option>              
                    <?php foreach($this->modelProveedor->ListarProveedorActivos() as $r): ?>
                        <option value="<?php echo $r->idproveedor; ?>"><?php echo $r->nombreprove; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>

            <div class="input-field col s12 m6" hidden>
              
              <select  id="idusuario" name="idusuario" class="validate" required>
                <option value="<?php echo $producto->idusuario; ?>"><?php echo $producto->nombreusuario; ?></option>
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
