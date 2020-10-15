
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > MODULO DE VENTA</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('CrearProducto'); ?>" ><b>Registrar nuevo producto</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
  </ul>
  <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('VerIngresos'); ?>" ><b>Ver registros de ingreso</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
  </ul>
   
</div>
</nav>  

<div class="contrainer">
    

 <div class="row">

  <!-- inicio de columna de datos de factura -->
      <div class="col s6">

      </div>



  <!-- inicio de columna de productos disponibles -->

      <div class="col s6">


        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
              <tr>
                  <th hidden>Id Producto</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio Unitario</th>
                  <th>Stock</th>
                  <th hidden>Categoria</th>
                  <th hidden>Proveedor</th>
                  <th class="center">Agregar</th>
                  
                  
              </tr>
          </thead>
          <tbody>
              <!-- inicio del cuerpo de la tabla activos -->
              <?php $idformmax = $this->model->ContarProductos();
                    $contador = 1;
               ?>
                     
              <?php foreach($this->model->ListarProductosActivos() as $r):?>
                               
                <?php 
       
                  if ($contador==$idformmax+1) {
                    echo "se acabo";
                  }else{

                    ?>

                  <tr>
                    <form id="form<?php echo $contador; ?>">
                      
                      <td hidden><?php echo $r->idproducto; ?></td>
                      <td><?php echo $r->nombre; ?></td>
                      <td><?php echo $r->descripcion; ?></td>
                      <td><?php echo '$ ',$r->precio; ?></td>
                      <td><?php echo $r->stock; ?></td>
                      <td hidden><?php echo $r->nombrecate; ?></td>
                      <td hidden><?php echo $r->nombreprove; ?></td>
                      <td class="center">
                        
                           <button type="submit" class="btn"> ARGEGAR </button>
                      </td>

                    </form>
                  </tr>
               
               <?php  }

      
                  $contador++;

                ?>
                
              <?php endforeach; ?>
  
              <!-- fin del cuerpo de la tabla activos -->
          </tbody>
      </table>
  </div>

      </div>
  



</div>
<!-- fin del cuerpo -->