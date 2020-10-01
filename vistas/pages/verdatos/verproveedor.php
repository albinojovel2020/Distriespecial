
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > PROVEEDORES</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Proveedor'); ?>&a=<?php echo base64_encode('CrearProveedor'); ?>" ><b>Nuevo proveedor</b><i class="material-icons right grey-text text-darken-1">person_add</i></a></li>
  </ul>
</div>
</nav>  

<div class="row">
    <div class="section">

      <!--   Data Section   -->
      <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3 m6 l3 yy"><a class="active tab-activos" href="#activos">Activos</a></li>
              <li class="tab col s3 m6 l3 yy"><a class="tab-inactivos" href="#inactivos">Inactivos</a></li>
          </ul>
      </div>
      <!-- tabla de activos -->
      <div id="activos" class="col s12">
        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
              <tr>
                  <th>Id Proveedor</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Dui</th>
                  <th>Teléfono</th>
                  <th>Dirección Empresa</th>
                  <th>Nombre Empresa</th>
                  <th>Usuario</th>
                  <th class="center">Editar</th>
                  <th class="center">Desactivar</th>
                  
              </tr>
          </thead>
          <tbody>
              <!-- inicio del cuerpo de la tabla activos -->
              <?php foreach($this->model->ListarProveedorActivos() as $r):?>
                  <tr>
                      <td><?php echo $r->idproveedor; ?></td>
                      <td><?php echo $r->nombre; ?><br class="salto"></td>
                      <td><?php echo $r->apellido; ?></td>
                      <td><?php echo $r->dui; ?></td>
                      <td><?php echo $r->telefono; ?></td>
                      <td><?php echo $r->direccion; ?></td>
                      <td><?php echo $r->nombreempre; ?></td>
                      <td><?php echo $r->nombreusuario; ?></td>
                      <td class="center">
                          <a href="?c=<?php echo base64_encode('Proveedor'); ?>&a=<?php echo base64_encode('EditarProveedor'); ?>&idproveedor=<?php echo base64_encode($r->idproveedor); ?>" title="Editar Registro" ><i class="mini material-icons azul-ast-text hoverable circle ">edit</i></a>
                      </td>
                      <td class="center">
                          <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=<?php echo base64_encode('Proveedor'); ?>&a=<?php echo base64_encode('CambiarEstado'); ?>&nuevo_estado=<?php echo base64_encode('0'); ?>&idproveedor=<?php echo base64_encode($r->idproveedor); ?>" title="Desactivar Registro" ><i class="material-icons red-text hoverable circle mini">cancel</i></a>
                      </td>
                      
                  </tr>
              <?php endforeach; ?>    
              <!-- fin del cuerpo de la tabla activos -->
          </tbody>
      </table>
  </div>

  <!-- tabla de inactivos -->
  <div id="inactivos" class="col s12">
    <table id="tabla-inactivos" class="striped responsive-table highlight">
      <thead>
          <tr>
            <th>Id Proveedor</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dui</th>
            <th>Teléfono</th>
            <th>Dirección Empresa</th>
            <th>Nombre Empresa</th>
            <th>Usuario</th>
              <th class="center">Activar</th>
             
          </tr>
      </thead>
      <tbody>
          <!-- inicio del cuerpo de la tabla inactivos -->
          <?php foreach($this->model->ListarProveedorInactivos() as $r):?>
              <tr>
                <td><?php echo $r->idproveedor; ?></td><br>
                <td><?php echo $r->nombre; ?></td><br>
                <td><?php echo $r->apellido; ?></td>
                <td><?php echo $r->dui; ?></td>
                <td><?php echo $r->telefono; ?></td>
                <td><?php echo $r->direccion; ?></td>
                <td><?php echo $r->nombreempre; ?></td>
                <td><?php echo $r->nombreusuario; ?></td>
                  <td class="center">
                      <a onclick="javascript:return confirm('¿Seguro que desea activar este registro?');" href="?c=<?php echo base64_encode('Proveedor'); ?>&a=<?php echo base64_encode('CambiarEstado'); ?>&nuevo_estado=<?php echo base64_encode('1'); ?>&idproveedor=<?php echo base64_encode($r->idproveedor); ?>" title="Activar Registro"><i class="mini material-icons green-text hoverable circle">check_circle</i></a>
                  </td>
                 
              </tr>
          <?php endforeach; ?> 
          <!-- fin del cuerpo de la tabla inactivos -->
      </tbody>
  </table>
</div>
</div>

</div>

</div>
<!-- fin del cuerpo -->