
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > EXISTENCIA DE PRODUCTOS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1"  href="?c=<?php echo base64_encode('Producto');?>" ><b>Ver estado Productos</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
  </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('CrearProducto'); ?>" ><b>Nuevo producto</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
  </ul>
</div>
</nav>  

<div class="row">
    <div class="section">

      <!--   Data Section   -->
      <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3 m6 l3 yy"><a class="tab-activos" href="#enexistencia">En Stock</a></li>
              <li class="tab col s3 m6 l3 yy"><a class="tab-activos" href="#agotados">Agotados</a></li>             
          </ul>
      </div>
      


  <!-- tabla de activos -->
      <div id="enexistencia" class="col s12">
        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
              <tr>
                  <th>Id Producto</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio Unitario</th>
                  <th>Stock</th>
                  <th>Imagen</th>
                  <th>Categoria</th>
                  <th>Proveedor</th>
                  <th>Usuario</th>
                  <th class="center">Editar</th>
                  
                  
              </tr>
          </thead>
          <tbody>
              <!-- inicio del cuerpo de la tabla activos -->
              <?php foreach($this->model->ListarProductosConexistencia() as $r):?>
                  <tr>
                      <td><?php echo $r->idproducto; ?></td>
                      <td><?php echo $r->nombre; ?></td>
                      <td><?php echo $r->descripcion; ?></td>
                      <td><?php echo '$ ',$r->precio; ?></td>
                      <td><?php echo $r->stock; ?></td>
                      <td><img class="img-avatar img-circle" src="<?php echo $r->img; ?>" width="55px" height="50px" alt=""></td>
                      <!--<td><?php echo $r->img; ?></td>-->
                      <td><?php echo $r->nombrecate; ?></td>
                      <td><?php echo $r->nombreprove; ?></td>
                      <td><?php echo $r->nombreusuario; ?></td>
                      <td class="center">
                          <a href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('EditarProducto'); ?>&idproducto=<?php echo base64_encode($r->idproducto); ?>" title="Editar Registro" ><i class="mini material-icons azul-ast-text hoverable circle ">edit</i></a>
                      </td>
                     
                      
                  </tr>
              <?php endforeach; ?>    
              <!-- fin del cuerpo de la tabla activos -->
          </tbody>
      </table>
  </div>

  <!-- tabla de inactivos -->
  <div id="agotados" class="col s12">
    <table id="tabla-inactivos" class="striped responsive-table highlight">
      <thead>
          <tr>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio Unitario</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <th>Proveedor</th>
            <th>Usuario</th>
              <th class="center">Agregar Stock</th>
              
             
          </tr>
      </thead>
      <tbody>
          <!-- inicio del cuerpo de la tabla inactivos -->
          <?php foreach($this->model->ListarProductosAgotados() as $r):?>
              <tr>
                <td><?php echo $r->idproducto; ?></td>
                <td><?php echo $r->nombre; ?></td>
                <td><?php echo $r->descripcion; ?></td>
                <td><?php echo '$ ',$r->precio; ?></td>
                <td><?php echo $r->stock; ?></td>
                <td><img class="img-avatar img-circle" src="<?php echo $r->img; ?>" width="50px" height="50px" alt=""></td>
                <!--<td><?php echo $r->img; ?></td>-->
                <td><?php echo $r->nombrecate; ?></td>
                <td><?php echo $r->nombreprove; ?></td>
                <td><?php echo $r->nombreusuario; ?></td>
                 <td class="center">
                          <a href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('IngresoProducto'); ?>&idproducto=<?php echo base64_encode($r->idproducto); ?>" title="Editar Registro" ><i class="mini material-icons azul-ast-text hoverable circle ">edit</i></a>
                      </td>
                 
              </tr>
          <?php endforeach; ?> 
          <!-- fin del cuerpo de la tabla inactivos -->
      </tbody>
  </table>
</div>  





</div>

</div>
<!-- fin del cuerpo -->