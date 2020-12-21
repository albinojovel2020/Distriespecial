
<!-- inicio del cuerpo -->
<nav>
  <div class="nav-wrapper white  ">
    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > VENTAS DÍA</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Movimientos');?>&a=<?php echo base64_encode('CrearVenta');?>&idusuario=<?php echo base64_encode($_SESSION["id"]); ?>" ><b>Nueva Venta</b><i class="material-icons right grey-text text-darken-1">add_shopping_cart</i></a></li>
    </ul>
  </div>
</nav>  

<div class="row">
  <div class="section">

    <!--   Data Section   -->
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3 m6 l3 yy"><a class="active tab-activos" href="#activos">Ventas del Día por Usuario</a></li>
          <!--<div class="input-field col s6" hidden>
            <input id="txtIdUsuario" type="text" name="txtIdUsuario"  value="<?php echo $_SESSION['id']; ?>"  readonly>
            <label for="txtIdUsuario">Empleado responsable</label>
        </div>-->
        </ul>
      </div>
      <!-- tabla de activos -->
      <div id="activos" class="col s12">
        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
            <tr>
            <th>Fecha</th>
              <th>Nombre de Empleado</th>
              <th>Venta del Día</th>
              
            </tr>
            <!--<tr>
              <th></th>
              <th></th>
              <th>Total</th>
            </tr>-->
            <!--<tr>
            <th>aa</th>
            </tr>-->
          </thead>
          <tbody>
            <!-- inicio del cuerpo de la tabla activos -->
            
                <?php $total1 = 0; ?>
                <?php foreach($this->modelVenta->VentaDias() as $vd):?>
              <tr>
                <td><?php echo $vd->fecha; ?></td>
                <td><?php echo $vd->Nombres; ?></td>
                <td>$ <?php echo $vd->total; ?></td>
                
                
              
                  <?php $total1 += $vd->total; ?>
                  
              </tr>
              <?php endforeach; ?>   
              <!--<tr>
              <td>$<?php echo $total1; ?></td>
              </tr>-->
            
            <!-- fin del cuerpo de la tabla activos -->
          </tbody>
          <tfoot>
            <tr>
                <th colspan="2" style="text-align:right">Total:</th>
                <th></th>
            </tr>
        </tfoot>
<!--          <tr>
                  <td>$<?php echo $total1; ?></td>
              </tr>-->
        </table>
        
      </div>

    </div>

  </div>

</div>
  <!-- fin del cuerpo -->