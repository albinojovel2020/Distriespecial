
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > PRODUCTO > Editar > <u class="blue-text"><?php echo $producto->nombre; ?></u></b></a></li>
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Producto'); ?>" ><b>Lista de productos Stock</b><i class="material-icons right grey-text text-darken-1">arrow_back</i></a></li>
    </ul>
     <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Producto'); ?>&?c=<?php echo base64_encode('VerProductosEstado'); ?>" ><b>Lista de productos Por estado</b><i class="material-icons right grey-text text-darken-1">arrow_back</i></a></li>
    </ul>
  </div>
</nav>
<br>
<div class="container">

  <div class="card-panel grey lighten-5 blue-text">
    <div class="section">

      <!--   Form Section   -->
      <div class="row form-background">
         <form class="col s12" action="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('ActualizarProducto'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden"  value="<?php echo $producto->idproducto; ?>" name="idproducto">
          <div class="row">
            <div class="input-field col s12">
            <br>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">person</i>
              <input id="nombres" type="text" class="validate" value="<?php echo $producto->nombre; ?>" name="nombres" required>
              <label for="nombres">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">description</i>
              <input id="descripcion" type="text" class="validate" value="<?php echo $producto->descripcion; ?>" name="descripcion" required>
              <label for="descripcion">Apellidos</label>
            </div>

          </div>
         <div class="input-field col s12 m6">
            <i class="material-icons prefix form-icon">monetization_on</i>
            <input id="preciocompra" type="text" maxlength="6" onkeypress="return justNumbers(event);" value="0.00" class="validate" name="preciocompra" required>
            <label for="preciocompra">Precio Compra</label>
          </div>


          <div class="input-field col s12 m6">
            <i class="material-icons prefix form-icon">monetization_on</i>
            <input id="precio1" type="text" maxlength="6" onkeypress="return justNumbers(event);" value="0.00" class="validate" name="precio1" required>
            <label for="precio1">Precio 1</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix form-icon">monetization_on</i>
            <input id="precio2" type="text" maxlength="6" onkeypress="return justNumbers(event);" value="0.00" class="validate" name="precio2" required>
            <label for="precio2">Precio 2</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix form-icon">monetization_on</i>
            <input id="precio3" type="text" maxlength="6" onkeypress="return justNumbers(event);" value="0.00" class="validate" name="precio3" required>
            <label for="precio3">Precio 3</label>
          </div>

           <div class="input-field col s12 m6"> 

                <select id="idumedida" name="idumedida" class="validate" required>      
                  <option value="<?php echo $producto->umedida; ?>"><?php echo $producto->nombreumedida; ?></option>              
                    <?php foreach($this->modelUmedida->ListarUmedida() as $r): ?>
                        <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="input-field col s12 m6" hidden>
              <i class="material-icons prefix form-icon">loupe</i>
              <input id="stock" type="text" class="validate" value="<?php echo $producto->stock; ?>" name="stock" required>
              <label for="stock">Stock</label>
            </div>

              <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">loupe</i>
              <input id="stocak" disabled type="text" class="validate" value="<?php echo $producto->stock; ?>" name="stocak" required>
              <label for="stocak">Stock</label>
            </div>

            <div class="input-field col s12 m6"> 

                <select id="idcategoria" name="idcategoria" class="validate" required><option value="<?php echo $producto->idcategoria; ?>"><?php echo $producto->nombrecate; ?></option>            
                    <?php foreach($this->modelCategoria->ListarCategoria() as $r): ?>
                        <option value="<?php echo $r->idcategoria; ?>"><?php echo $r->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>

            <div class="input-field col s12 m6"> 

                <select id="idproveedor" name="idproveedor" class="validate" required>      <option value="<?php echo $producto->idproveedor; ?>"><?php echo $producto->nombreprove; ?></option>              
                    <?php foreach($this->modelProveedor->ListarProveedorActivos() as $r): ?>
                        <option value="<?php echo $r->idproveedor; ?>"><?php echo $r->nombreprove; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>

            <div class="input-field col s12 m6">
              
              <select id="idusuario" name="idusuario" class="validate" required>
                <option value="<?php echo $producto->idusuario; ?>"><?php echo $producto->nombreusuario; ?></option>
                <option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['usuario']; ?></option>                    
              </select>
            </div>

            <div class="file-field input-field col s12 m6">
              <div class="btn">
                <!---->
                <span id="file-select">File</span>
                <input type="file" id="filename" name="producto1" id="producto1" value="<?php echo $producto->img; ?>"><!---->
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="producto1" type="text" id="file-info" value="<?php echo $producto->img; ?>">
              </div>
              <br>
              <div id="preview">
                <img  style="width: 150px;  height: 150px;   margin-top: 5px;" src="<?php echo $producto->img; ?>"/>              
              </div>
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
