
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > UNIDADES DE MEDIDA</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Umedida'); ?>&a=<?php echo base64_encode('CrearUmedida'); ?>" ><b>Nueva unidad de medida</b><i class="material-icons right grey-text text-darken-1">format_list_bulleted</i></a></li>
  </ul>
</div>
</nav>  

<div class="row">
    <div class="section">

      <!--   Data Section   -->
      <div class="row">
          <div class="col s12">
            <!--<ul class="tabs">
              <li class="tab col s3 m6 l3 yy"><a class="active tab-activos" href="#activos">Activos</a></li>
              <li class="tab col s3 m6 l3 yy"><a class="tab-inactivos" href="#inactivos">Inactivos</a></li>
          </ul>-->
      </div>
      <!-- tabla de activos -->
      <div id="activos" class="col s12">
        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
              <tr>
                  <th>Id Unidad medida</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Codigo</th>
                  <th class="center">Editar</th>                  
              </tr>
          </thead>
          <tbody>
              <!-- inicio del cuerpo de la tabla activos -->
              <?php foreach($this->model->ListarUmedida() as $r):?>
                  <tr>
                      <td><?php echo $r->id; ?></td>
                      <td><?php echo $r->nombre; ?></td>
                      <td><?php echo $r->descripcion; ?></td>
                      <td><?php echo $r->codigo; ?></td>
                      <td class="center">
                          <a href="?c=<?php echo base64_encode('Umedida'); ?>&a=<?php echo base64_encode('EditarUmedida'); ?>&id=<?php echo base64_encode($r->id); ?>" title="Editar Registro" ><i class="mini material-icons azul-ast-text hoverable circle ">edit</i></a>
                      </td>
                     
                      
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