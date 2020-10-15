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
            <form name="fproductos"  class="col s12" action="?c=Venta&a=Guardar" method="post" enctype="multipart/form-data">
               <div class="input-field col s6">
                        <input id="txtNumeroCompra" type="text" class="validate" name="txtNumeroCompra" required>
                        <label for="txtNumeroCompra">Número</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="txtFechaHora" type="text" name="txtFechaHora" value="<?php echo date("Y-m-d"); ?>"  readonly>
                        <label for="txtFechaHora">Fecha y Hora</label>
                    </div>

                    <div class="input-field col s6">
                    <input id="txtEmpleado" type="text" name="txtEmpleado" value="<?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>"  readonly>
                    <label for="txtEmpleado">Empleado responsable</label>
                    </div>

                    <!-- para saber cuantos detalles se enviaron -->
                    <input id="txtCantidadDetalle" hidden name="txtCantidadDetalle" value="1">
                    <!-- para saber cual fue el último borrado -->
                    <input id="txtBorrado" hidden  name="txtBorrado" value="0">

                                            <!-- tabla de activos -->
                        <div id="detalle" class="col s12">
                            <table class="display highlight">
                                <thead class="green-text">
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>NOMBRE</th>
                                        <th>PRECIO</th>
                                        <th>CANTIDAD</th>
                                        <th>SUBTOTAL</th>
                                        <th class="center">BORRAR</th>
                                    </tr>
                                </thead>
                                <tbody class="indigo-text">
                                    <?php $cantproductos = $this->model->ContarProductos(); ?> 

                                    <?php for ($i=1; $i <= $cantproductos-1; $i++) { 
                                        echo '<tr id="filaDetalle'.$i.'" style="display:none;">
                                                <td>
                                                    <input id="txtIdproducto'.$i.'" type="hidden" name="txtIdproducto'.$i.'" value=""/>

                                                    <input id="txtCodigoBarra'.$i.'" size="10" type="text" name="txtCodigoBarra'.$i.'" value="" readonly/>
                                                </td>
                                                <td>
                                                    <input id="txtNombre'.$i.'" type="text" name="txtNombre'.$i.'" value="" readonly/>
                                                </td>
                                                <td>
                                                    <input id="txtPrecio'.$i.'" size="5" type="text" class="validate" name="txtPrecio'.$i.'" value="" style="width: 80px;" readonly/>
                                                </td>
                                                <td>
                                                    <input id="txtCantidad'.$i.'"  style="width: 80px;" type="number" min="1" class="validate" name="txtCantidad'.$i.'" value="1"  onblur="calcularCantidad(this)" data-i="'.$i.'"/>
                                                </td>
                                                
                                                <td>
                                                    $<input class="right-align" id="txtSubTotal'.$i.'"  type="text" name="txtSubTotal'.$i.'" value="" style="width: 80px;" readonly />
                                                </td>
                                                <td class="center">
                                                    <a onclick="borrardetalle(this)" data-i="'.$i.'" id="btnBorar'.$i.'" title="Borrar" class="waves-effect waves-light btn-small red"><i class="material-icons">remove_shopping_cart</i></a>
                                                </td>
                                            </tr>';
                                    } ?>
                                        
                                    <tr id="filaTotal" style="display:none;">
                                        <td colspan="5" class="right-align"><strong>Total</strong></td>
                                        <td colspan="2">
                                            $<input class="right-align" id="txtTotal"  type="text" name="txtTotal" value="" style="width: 80px;" readonly />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>     

                            <div class="input-field col s12">
                                <p class="green-text right-align">-> Seleccione un producto para continuar -></p>
                            </div>     

                            <div class="input-field col s12 center">
                                <button style="display:none;" onclick="return confirm('Seguro que desea guardar esta factura')" id="btnComprar" type="submit" class="waves-effect waves-light btn blue"><i class="material-icons right">send</i>Guardar</button>
                            </div>
                        </div>




            </form>
      </div>



  <!-- inicio de columna de productos disponibles -->

      <div class="col s6">

<!-- tabla de productos -->
                            <table id="tabla-activos" class="display highlight" cellspacing="0" width="100%">
                                <thead class="indigo-text">
                                    <tr>
                                        <th hidden>Id Producto</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio Unitario</th>
                                        <th>Stock</th>
                                        <th>Categoria</th>
                                        <th>Proveedor</th>
                                        <th class="center">Agregar</th>
                                    </tr>
                                </thead>
                                <tfoot class="indigo-text">
                                    <tr>
                                         <th hidden>Id Producto</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio Unitario</th>
                                        <th>Stock</th>
                                        <th>Categoria</th>
                                        <th>Proveedor</th>
                                        <th class="center">Agregar</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                               <?php foreach($this->model->ListarProductosActivos() as $r):?>
                                    <tr>
                                        <td hidden><?php echo $r->idproducto; ?></td>
                                        <td><?php echo $r->nombre; ?></td>
                                        <td><?php echo $r->descripcion; ?></td>
                                        <td><?php echo '$ ',$r->precio; ?></td>
                                        <td><?php echo $r->stock; ?></td>
                                        <td ><?php echo $r->nombrecate; ?></td>
                                        <td ><?php echo $r->nombreprove; ?></td>
                                        <td> <!-- agregar el producto al detalle -->
                                            <a onclick="agregardetalle(this)"  id="deshabilitar" title="Agregar" class="waves-effect waves-light btn-small" data-id="<?php echo $r->idproducto; ?>" data-codigo="<?php echo $r->codigobarra; ?>" data-nombre="<?php echo $r->nombre; ?>" data-precio="<?php echo $r->precio; ?>" ><i class="material-icons">add_shopping_cart</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?></tbody>
                            </table>
  </div>

      </div>
  



</div>
<!-- fin del cuerpo -->



<script>
//para seleccionar los productos
function agregardetalle(producto) {
  //tomar el id del producto 
  var id = producto.getAttribute('data-id');
  //tomar el codigobarra del producto 
  var codigo = producto.getAttribute('data-codigo');
  //tomar el nombre del producto 
  var nombre = producto.getAttribute('data-nombre');
  //tomar el precio del producto 
  var precio = producto.getAttribute('data-precio');
  
    var numero = null;
    var borrado = parseInt(document.getElementById("txtBorrado").value);
        
    //tomar la cantidad de detalles
    if (borrado != 0) {
        numero = parseInt(document.getElementById("txtBorrado").value);            
    }else{
        numero = parseInt(document.getElementById("txtCantidadDetalle").value);
    }

    //mostrar el detalle oculto
    document.getElementById("filaDetalle"+numero).style.display = '';

    //mostrar el total oculto
    document.getElementById("filaTotal").style.display = '';
    
    //mostrar el botón oculto
    document.getElementById("btnComprar").style.display = '';

    //asignar al campo oculto el id del producto seleccionado
    document.getElementById("txtIdproducto"+numero).value = id;

    //número de detalles
    var numeroDetalle = parseInt(document.getElementById("txtCantidadDetalle").value);

    //asignar los valores al formulario
    document.getElementById("txtCantidadDetalle").value = numeroDetalle+1;
    document.getElementById("txtCodigoBarra"+numero).value = codigo;
    document.getElementById("txtNombre"+numero).value = nombre;
    document.getElementById("txtPrecio"+numero).value = precio;
    document.getElementById("txtSubTotal"+numero).value = precio;

    //volver txtBorrado a cero
    document.getElementById("txtBorrado").value = "0";

    //calcular Total
    calcularTotal(numeroDetalle+1);


}
</script>

<script>
//para borrar un detalle
function borrardetalle(detalle) {
    //confirmar la operación
    var opcion = confirm("¿En verdad desea borrar?");
    if (opcion == true) {
  
        //tomar el id del detalle 
        var i = detalle.getAttribute('data-i');
        var numero = parseInt(document.getElementById("txtCantidadDetalle").value);
        

        //dejar el detalle oculto
        document.getElementById("filaDetalle"+i).style.display = 'none';     

        //tomar el valor del subTotal y total
        var subtotal = parseFloat(document.getElementById("txtSubTotal"+i).value).toFixed(2);
        var total = parseFloat(document.getElementById("txtTotal").value).toFixed(2);
        //calcular total
        total = parseFloat(total) - parseFloat(subtotal);

        //asignar los valores al formulario
        document.getElementById("txtCantidadDetalle").value = numero-1;
        document.getElementById("txtBorrado").value = i;
        document.getElementById("txtCodigoBarra"+i).value = "";
        document.getElementById("txtNombre"+i).value = "";
        document.getElementById("txtCantidad"+i).value = "1";
        document.getElementById("txtDescuento"+i).value = "0";
        document.getElementById("txtSubTotal"+i).value = "";
        
        //nuevo total
        document.getElementById("txtTotal").value = parseInt(total).toFixed(2);

        if ((numero-1) == 1) {
            //ocultar el botón 
            document.getElementById("btnComprar").style.display = 'none';
            //ocultar el total
            document.getElementById("filaTotal").style.display = 'none';
                
        }

    }
}
</script>





<script>
//para calcular el precio según la cantidad
function calcularCantidad(cantidad) {
    //tomar el id del detalle 
    var i = cantidad.getAttribute('data-i');

    //comparar el valor de la cantidad 
    var cantidad = parseInt(document.getElementById("txtCantidad"+i).value);
    
    if (cantidad <= 0) {
        alert('La cantidad debe ser al menos uno');
        document.getElementById("txtCantidad"+i).value = 1;
    }else{    
        var numeroDetalle = parseInt(document.getElementById("txtCantidadDetalle").value);

        //tomar el valor del subTotal y total
        var precio = parseFloat(document.getElementById("txtPrecio"+i).value).toFixed(2);
        var descuento = parseFloat(document.getElementById("txtDescuento"+i).value).toFixed(2);
        //calcular subtotal
        calcularSubTotal(i, precio, cantidad, descuento);

        //calcular total
        calcularTotal(numeroDetalle);

    }
}
</script>

<script>
//para calcular el precio según el descuento
function calcularDescuento(descuento) {
    //tomar el id del detalle 
    var i = descuento.getAttribute('data-i');

    //comparar el valor de la cantidad 
    var descuento = parseInt(document.getElementById("txtDescuento"+i).value);
    
    if (descuento < 0) {
        alert('El descuento debe ser mayor o igual a cero');
        document.getElementById("txtDescuento"+i).value = 0;
    }else{    
        var numeroDetalle = parseInt(document.getElementById("txtCantidadDetalle").value);

        //tomar el valor del subTotal y total
        var precio = parseFloat(document.getElementById("txtPrecio"+i).value).toFixed(2);
        var cantidad = parseFloat(document.getElementById("txtCantidad"+i).value).toFixed(2);
        //calcular subtotal
        calcularSubTotal(i, precio, cantidad, descuento);

        //calcular total
        calcularTotal(numeroDetalle);

    }
}
</script>

<script>
//para calcular el subtotal
function calcularSubTotal(i, precio, cantidad, descuento) {
    //calcular
    var subtotal = (parseFloat(precio) * parseInt(cantidad)) - ((parseFloat(precio) * parseInt(cantidad)) * (parseInt(descuento)/100));
    //asignar el descuento
    document.getElementById("txtSubTotal"+i).value = parseFloat(subtotal).toFixed(2);
}
</script>

<script>
//para calcular el total
function calcularTotal(numeroDetalle) {
    var j;
    var total = 0.00;
        //sumar los subTotales
        for (j = 1; j < numeroDetalle; j++) {        
            subtotal = parseFloat(document.getElementById("txtSubTotal"+j).value).toFixed(2);
            // acumular total
            total = parseFloat(total) + parseFloat(subtotal);
        }
    //retornar el valor
    document.getElementById("txtTotal").value = parseFloat(total).toFixed(2);
}
</script>