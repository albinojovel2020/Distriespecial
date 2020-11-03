
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > VENTAS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Movimientos'); ?>&a=<?php echo base64_encode('CrearVenta'); ?>" ><b>Nueva Venta</b><i class="material-icons right grey-text text-darken-1">add_shopping_cart</i></a></li>
    </ul>
  </div>
</nav>  

<div class="row">
  <div class="section">

    <!--   Data Section   -->
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3 m6 l3 yy"><a class="active tab-activos" href="#activos">Ventas</a></li>
        </ul>
      </div>
      <!-- tabla de activos -->
      <div id="activos" class="col s12">
        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
            <tr>
              <th>Id venta</th>
              <th>Numero factura</th>
              <th>Fecha</th>
              <th>Total</th>
              <td>Tipo comprobante</td>
              <th>Usuario registra</th>
              <th>Estado</th>
              <td>Imprimir</td> 
              <td>Accion</td>                  
            </tr>
          </thead>
          <tbody>
            <!-- inicio del cuerpo de la tabla activos -->
            <?php foreach($this->modelVenta->ListarVentas() as $r):?>
              <tr>
                <td><?php echo $r->id; ?></td>
                <td><?php echo $r->nfac; ?></td>
                <td><?php echo $r->fventa; ?></td>
                <td><?php echo $r->total; ?></td>
                <td><?php echo $r->tipocomprobante; ?></td>
                <td><?php echo $r->nusu; ?> <?php echo $r->apellido; ?></td>     
                <td><?php if ($r->anulada==0) {
                  echo "Registrada";
                }elseif ($r->anulada!=0) {
                  echo "Anulada";
                }  ?></td>                      
                <!--<td><button>Imprimir</button></td>-->
                <td class="center">
                  <!--&compro=<?php //echo base64_encode($r->tipocomprobante); ?>-->
                  <a target="blank" href="?c=<?php echo base64_encode('Movimientos'); ?>&a=<?php echo base64_encode('VERPDF'); ?>&nfac=<?php echo base64_encode($r->nfac); ?>" title="PDF del registro" ><i class="mini material-icons green-ast-text hoverable circle ">remove_red_eye</i></a>
                </td>

                <?php if ($r->anulada==0) {
                  ?>
                  <td class="center">
                    <a onclick="javascript:return confirm('¿Seguro que desea anular esta venta?');" href="?c=<?php echo base64_encode('Movimientos'); ?>&a=<?php echo base64_encode('AnularVenta'); ?>&idvea=<?php echo base64_encode($r->id); ?>" title="AnularVenta Venta" ><i class="material-icons red-text hoverable circle mini">cancel</i></a>
                  </td>
                  <?php
                }elseif ($r->anulada!=0) {
                  ?>
                  <td class="center" >
                    Anulada
                  </td>
                  <?php
                }  ?>

                

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