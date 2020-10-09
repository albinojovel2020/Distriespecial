
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > PRODUCTOS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('CrearProducto'); ?>" ><b>Nuevo producto</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
  </ul>
  <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Movimientos'); ?>" ><b>Ingresar Producto</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
  </ul>
</div>
</nav>  

<div class="row">
    <div class="section">

      <!--   Data Section   -->
      <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3 m6 l3 yy"><a class="active tab-activos" href="#activos">Movimientos</a></li>
          </ul>
      </div>
      <!-- tabla de activos -->
      <div id="activos" class="col s12">
        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
              <tr>
                  <th>Id Ingreso</th>
                  <th>Id Producto</th>
                  <th>Nombre producto</th>
                  <th>Descripción producto</th>
                  <th>Precio Unitario</th>
                  <td>Stock anterior</td>
                  <td>Stock actual</td>
                  <td>Cantidad ingresada</td>
                  <td>Fecha ingreso</td>
                  <td>Usuario Ingresa</td>
                  
              </tr>
          </thead>
          <tbody>
              <!-- inicio del cuerpo de la tabla activos -->
              <?php foreach($this->model->ListarIngresoProductos() as $r):?>
                  <tr>
                      <td><?php echo $r->id; ?></td>
                      <td><?php echo $r->idproducto; ?></td>
                      <td><?php echo $r->nprod; ?></td>
                      <td><?php echo $r->descripcion; ?></td>
                      <td><?php echo '$ ',$r->preciounitario; ?></td>
                      <td><?php echo $r->stockanterior; ?></td>
                      <td><?php echo $r->stock; ?></td>
                      <td><?php echo $r->cantidad; ?></td>
                      <td><?php echo $r->fcrea; ?></td>
                      <td><?php echo $r->nombre; ?></td>
                  </tr>
              <?php endforeach; ?>    
              <!-- fin del cuerpo de la tabla activos -->
          </tbody>
      </table>
  </div>

</div>

</div>

</div>
<!-- fin del cuerpo -->