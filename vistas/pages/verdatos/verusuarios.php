
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > USUARIOS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('CrearUsuario'); ?>" ><b>Nuevo usuario</b><i class="material-icons right grey-text text-darken-1">person_add</i></a></li>
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
                  <th>Id Usuario</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Usuario</th>
                  <th>Tipo</th>
                  <th class="center">Editar</th>
                  <th class="center">Desactivar</th>
                  <th class="center">Eliminar</th>
              </tr>
          </thead>
          <tbody>
              <!-- inicio del cuerpo de la tabla activos -->
              <?php foreach($this->model->ListarUsuariosActivos() as $r):?>
                  <tr>
                      <td><?php echo $r->idusuario; ?></td>
                      <td><?php echo $r->nombre; ?></td>
                      <td><?php echo $r->apellido; ?></td>
                      <td><?php echo $r->telefono; ?></td>
                      <td><?php echo $r->usuario; ?></td>
                      <td><?php echo $r->tipo; ?></td>
                      <td class="center">
                          <a href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('EditarUsuario'); ?>&idusuario=<?php echo base64_encode($r->idusuario); ?>" title="Editar Registro" ><i class="mini material-icons azul-ast-text hoverable circle ">edit</i></a>
                      </td>
                      <td class="center">
                          <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('CambiarEstado'); ?>&nuevo_estado=<?php echo base64_encode('0'); ?>&idusuario=<?php echo base64_encode($r->idusuario); ?>" title="Desactivar Registro" ><i class="material-icons red-text hoverable circle mini">cancel</i></a>
                      </td>
                      <td class="center">
                          <a onclick="javascript:return confirm('¿Seguro que desea eliminar este registro?');" href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('Eliminar'); ?>&idusuario=<?php echo base64_encode($r->idusuario); ?>" title="Eliminar Registro" ><i class="small material-icons red-text">delete</i></a>
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
              <th>Id Usuario</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Teléfono</th>
              <th>Usuario</th>
              <th>Tipo</th>
              <th class="center">Activar</th>
              <th class="center">Eliminar</th>
          </tr>
      </thead>
      <tbody>
          <!-- inicio del cuerpo de la tabla inactivos -->
          <?php foreach($this->model->ListarUsuariosInactivos() as $r):?>
              <tr>
                  <td><?php echo $r->idusuario; ?></td>
                  <td><?php echo $r->nombre; ?></td>
                  <td><?php echo $r->apellido; ?></td>
                  <td><?php echo $r->telefono; ?></td>
                  <td><?php echo $r->usuario; ?></td>
                  <td><?php echo $r->tipo; ?></td>
                  <td class="center">
                      <a onclick="javascript:return confirm('¿Seguro que desea activar este registro?');" href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('CambiarEstado'); ?>&nuevo_estado=<?php echo base64_encode('1'); ?>&idusuario=<?php echo base64_encode($r->idusuario); ?>" title="Activar Registro"><i class="mini material-icons green-text hoverable circle">check_circle</i></a>
                  </td>
                  <td class="center">
                       <a onclick="javascript:return confirm('¿Seguro que desea eliminar este registro?');" href="?c=<?php echo base64_encode('Usuario'); ?>&a=<?php echo base64_encode('Eliminar'); ?>&idusuario=<?php echo base64_encode($r->idusuario); ?>" title="Eliminar Registro" ><i class="small material-icons red-text">delete</i></a>
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