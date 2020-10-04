<?php

//FECHA ACTUAL
  
$fecha_actual = date("yy/m/d");

?>
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > COMPRA DE PRODUCTOS</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('ListarCompras'); ?>" ><b>Lista de compras</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
  </ul>
</div>
</nav>  
<div class="row">


    <div class="section">

     
      <div id="activos" class="col s6">
            <table id="data" class="striped responsive-table highlight">
             <thead></thead>
             <tr>
              
                  <th>COMPRA A PROVEEDOR</th>               
              </tr>
               <tbody>
                  <tr>
                      <td>


  <div class="card-panel grey lighten-5 blue-text">
   <div class="section">

    <!--   Form Section   -->
      <div class="container">
    <div class="row form-background">
      <form class="col s12" action="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('RegistrarProducto'); ?>" method="post" enctype="multipart/form-data">
        <div class="row top20px bottom20px">

            <div class="input-field col s12 m6 "> 
              <i class="material-icons prefix form-icon">beenhere</i>
              <input id="idusuario" hidden type="text" class="validate" value="<?php echo $_SESSION['id']; ?>" name="nombres" required>
               <input id="usuario" type="text" class="validate" value="<?php echo $_SESSION['usuario']; ?>" name="nombres" required autofocus disabled>
              <label for="idusuario">Usuario que registra</label>
            </div>


            <div class="input-field col s12 m6">
              <i class="material-icons prefix form-icon">today</i>
              <input id="fecha" type="text" class="Datepicker" value="<?php echo $fecha_actual; ?>" name="nombres" required disabled  >
              <label for="fecha">Fecha de compra</label>
            </div>

            <div class="input-field col s12 m6">
              
              <i class="material-icons prefix form-icon">insert_drive_file</i>
              <input id="numerocompra"  type="number" class="validate" name="nombres" required>
              <label for="numerocompra">No. de compra</label>
            </div>


            <label for="Proveedor">Proveedor</label>
            <div class="input-field col s12 m6"> 
              <select id="idproveedor" name="idproveedor" class="validate" required>     
                 <option value=""  selected>Seleccione Proveedor</option>            
                    <?php foreach($this->modelProveedor->ListarProveedorActivos() as $r): ?>
                        <option value="<?php echo $r->idproveedor; ?>"><?php echo $r->nombreprove; ?></option>
                    <?php endforeach; ?>
                  </select>

            </div>

            

<div class="col-xs-12 pull-right">
                    
                    <table class="table">

                      <thead>

                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 30%">
                            


                          </td>


                           <td style="width: 30%">
                            
                           

                          </td>



                           <td style="width: 40%">


                                                        
                            <div class="input-group">
                           
                              <span class="input-group-addon"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total: </strong>       <i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="<?php echo $venta["total"]; ?>" value="<?php echo $venta["total"]; ?>" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta" value="<?php echo $venta["total"]; ?>">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

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
  </div>
</div>


    


                      </td>
                  </tr>
               </tbody>
            </table>
     </div>
  



      <div id="activos" class="col s6">
        <table id="tabla-activos" class="striped responsive-table highlight">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio Unitario</th>
                  <th>Stock</th>
                  <th>Imagen</th>
                  <th>Categoria</th>
                  <th class="center">Agregar</th>                  
              </tr>
          </thead>
          <tbody>
              <!-- inicio del cuerpo de la tabla activos -->
              <?php foreach($this->model->ListarProductosActivos() as $r):?>
                  <tr>
                      <td><?php echo $r->nombre; ?></td>
                      <td><?php echo $r->descripcion; ?></td>
                      <td><?php echo '$ ',$r->precio; ?></td>
                      <td><?php echo $r->stock; ?></td>
                      <td><img class="img-avatar img-circle" src="<?php echo $r->img; ?>" width="55px" height="50px" alt=""></td>
                      <!--<td><?php echo $r->img; ?></td>-->
                      <td><?php echo $r->nombreprove; ?></td>
                      <td class="center">
                          <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=<?php echo base64_encode('Producto'); ?>&a=<?php echo base64_encode('CambiarEstado'); ?>&nuevo_estado=<?php echo base64_encode('0'); ?>&idproducto=<?php echo base64_encode($r->idproducto); ?>" title="Agregar Producto" >  <a class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">add</i></a>
</a>
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



