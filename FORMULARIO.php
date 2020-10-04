
    <!--   Form Section   -->
    <div class="row form-background">
      <form class="col s12" action="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('RegistrarProducto'); ?>" method="post" enctype="multipart/form-data">
        <div class="row top20px bottom20px">

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

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">monetization_on</i>
              <input id="precio" type="text" maxlength="6" onkeypress="return justNumbers(event);" class="validate" name="precio" required>
              <label for="precio">Precio Unitario</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">loupe</i>
              <input id="stock" type="number" minlength="1" class="validate" name="stock" required>
              <label for="stock">Stock</label>
            </div>

            

            <div class="input-field col s12 m6"> 

                <select id="idproveedor" name="idproveedor" class="validate" required>      <option value="" disabled selected>Seleccione Proveedor</option>            
                    <?php foreach($this->modelProveedor->ListarProveedorActivos() as $r): ?>
                        <option value="<?php echo $r->idproveedor; ?>"><?php echo $r->nombreprove; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>

            <div class="input-field col s12 m6">
              <select id="idusuario" name="idusuario" class="validate" required>
                <option value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['usuario']; ?></option>                    
              </select>
            </div>

            <div class="file-field input-field col s12 m6">
              <div class="btn">
                <!---->
                <span id="file-select">File</span>
                <input type="file" id="filename" name="producto1">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" id="file-info"  >
              </div>
              <br>
              <div id="preview">
                <img  style="width: 150px;  height: 150px;   margin-top: 5px;" src="img/camera1.png"/>              
              </div>
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
 