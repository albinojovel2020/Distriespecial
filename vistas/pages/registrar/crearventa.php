<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > MODULO DE VENTA</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn orange accent-4" href="?c=<?php echo base64_encode('Movimientos'); ?>&a=<?php echo base64_encode('VerVentas'); ?>" ><b>Ver lista de ventas</b><i class="material-icons right grey-text text-darken-1">playlist_add</i></a></li>
    </ul>
    <ul class="right">
        <a href="#idmodalproducto" class="waves-effect waves-light btn modal-trigger green accent-4"><i class="material-icons right">add_shopping_cart</i><b>AGREGAR PRODUCTO AL DETALLE</b></a>
    </ul>  
</div>
</nav>  
<br>
<br>
<div class="contrainer">
   <div class="row">

      <!-- inicio de columna de datos de factura -->
      <div class="col s12">
        <h5 class="center grey-text text-darken-1">Datos generales del detalle de venta</h5>
        
        <br>
        <form onkeydown="return event.key != 'Enter';" class="col s12" action="?c=<?php echo base64_encode('Movimientos'); ?>&a=<?php echo base64_encode('GuardarVenta'); ?>" method="post" enctype="multipart/form-data">
         <div class="input-field col s6">
            <input id="txtNumeroVenta" type="number" class="validate" name="txtNumeroVenta" required>
            <label for="txtNumeroVenta">Número Factura</label>
        </div>


        <div class="input-field col s6">
            <input id="txtFechaVenta" type="text" name="txtFechaVenta" value="<?php echo date("Y-m-d").' '.date("h:i:s").' '.date('A'); ?>"  readonly>
            <label for="txtFechaVenta">Fecha y Hora</label>
        </div>

        <div class="input-field col s6" hidden>
            <input id="txtIdUsuario" type="text" name="txtIdUsuario"  value="<?php echo $_SESSION['id']; ?>"  readonly>
            <label for="txtIdUsuario">Empleado responsable</label>
        </div>

        <div class="input-field col s6">
            <input id="txtIdUsuari" type="text" name="txtIdUsuari" value="<?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>"  readonly>
            <label for="txtIdUsuari">Empleado responsable</label>
        </div>

        <div class="col s6">  
        <label>Tipo de comprobante</label>             
            <select onchange="ActivarCampos()" class="browser-default validate " name="selComprobante" id="selComprobante" required>
                <option  value="" disabled selected>Seleccione una opción</option>
                <option value="1">Factura consumidor final</option>
                <option value="2">Factura credito fiscal</option>
                <option value="3">Nota de envio</option>
                <option value="4">Ticket</option>
            </select>
        </div>


        <div class="input-field col s12 m6" > 
                   <div id class="input-field col s6" id="NRC">
            <input id="txtNRC" type="text" class="validate" name="txtNRC"  disabled required>
            <label for="txtNRC">NRC Comprador</label>
        </div>

         <div class="input-field col s6" id="NIT" >
            <input id="txtNIT" type="text" class="validate" name="txtNIT" disabled required>
            <label for="txtNIT">NIT Comprador</label>
        </div>

        </div>

        <!-- para saber cuantos detalles se enviaron -->
        <input id="txtCantidadDetalle"  hidden  name="txtCantidadDetalle" value="1">
        <!-- para saber cual fue el último borrado -->
        <input id="txtBorrado"  hidden  name="txtBorrado" value="0">

        <!-- tabla de activos -->
        <div id="detalle" class="col s12">
            <h5 class="center grey-text text-darken-1">Productos agregados al detalle de venta</h5><br>
            <table class="display highlight">
                <thead class="green-text">
                    <tr>
                        <th>ID PRODUCTO</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th hidden>PRECIOC</th>
                        <th>CANTIDAD</th>
                        <th>EXISTENCIA</th>
                        <th>SUBTOTAL</th>
                        <th class="center">BORRAR</th>
                    </tr>
                </thead>
                <tbody >

                    <?php for ($i=1; $i <= 35; $i++) { 
                        echo '<tr class="indigo-text yellow lighten-4 " id="filaDetalle'.$i.'" style="display:none;">

                        <td>
                        <input id="txtIdproducto'.$i.'"  readonly name="txtIdproducto'.$i.'" value=""/>

                        <input id="txtCodigoBarra'.$i.'" type="hidden" size="10" type="text" name="txtCodigoBarra'.$i.'" value="" readonly/>
                        </td>
                        <td>
                        <input id="txtNombre'.$i.'" type="text" name="txtNombre'.$i.'" value="" readonly/>
                        </td>
                        <td>
                        <input id="txtPrecio'.$i.'" size="5" type="text" class="validate" name="txtPrecio'.$i.'" value="" style="width: 80px;" readonly/>
                        </td>
                        <td hidden>
                        <input id="txtPrecioC'.$i.'" style="width: 80px;" type="text" class="validate center" name="txtPrecioC'.$i.'" value=""  data-i="'.$i.'"/>
                        </td>                        
                        <td>
                        <input id="txtCantidad'.$i.'" style="width: 80px;" type="number" class="validate center" name="txtCantidad'.$i.'" value="1"  onchange="calcularCantidad(this)" data-i="'.$i.'"/>
                        </td>
                        <td>
                        <input id="txtStock'.$i.'"  style="width: 80px;" type="number" class="validate" name="txtStock'.$i.'" value="1"  data-i="'.$i.'" readonly/>
                        </td>
                        <td hidden>
                        <input id="txtDescuento'.$i.'" size="5" style="width: 80px;" type="text" class="validate" name="txtDescuento'.$i.'" value="0"  onblur="calcularDescuento(this)" data-i="'.$i.'"/>
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
                            <span>$</span><input class="center-align deep-orange lighten-4" id="txtTotal"  type="text" name="txtTotal" value="" style="width: 80px;" />
                        </td>
                    </tr>
                </tbody>
            </table>        

            <div class="input-field col s12 center">
                <button style="display:none;"  onclick="return confirm('Seguro que desea eviar esta venta')" id="btnComprar" type="submit" class="waves-effect waves-light btn blue"><i class="material-icons right">send</i>GUARDAR</button>
            </div>
        </div>
    </form>
</div>

<div class="contrainer section">


   <div id="idmodalproducto" style="width: 90%; height:  100%;" class="modal">
     <div class="modal-content">
      <!-- inicio de columna de productos disponibles -->
      <div class="col s12">
        <!-- tabla de productos -->
        <h5 class="grey-text text-darken-1">Seleccione producto a vender</h5>
        <table id="tabla-activos" class="display highlight" cellspacing="0" width="100%">
            <thead class="indigo-text">
                <tr>
                    <th >Id Producto</th>
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
                   <th >Id Producto</th>
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
             <?php foreach($this->model->ListarProductosActivoConexistencia() as $r):?>
                <tr id="fila<?php echo $r->idproducto; ?>">
                    <td ><?php echo $r->idproducto; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->descripcion; ?></td> 
                    <td>
                      
                           <select id="preciov<?php echo $r->idproducto; ?>" name="preciov<?php echo $r->idproducto; ?>" class="validate">      
                                <option value="<?php echo $r->precio1; ?>"><?php echo $r->precio1; ?></option>  
                                <option value="<?php echo $r->precio2; ?>"><?php echo $r->precio2; ?></option>
                                <option value="<?php echo $r->precio3; ?>"><?php echo $r->precio3; ?></option>
                            </select>
                        
                    </td>
                    <td><?php echo $r->stock; ?></td>
                    <td ><?php echo $r->nombrecate; ?></td>
                    <td ><?php echo $r->nombreprove; ?></td>
                    <td> <!-- agregar el producto al detalle -->
                        <button  onclick="agregardetalle(this);" id="btnProd<?php echo $r->idproducto; ?>" title="Agregar" class="waves-effect waves-light btn-small green accent-4" data-stock="<?php echo $r->stock; ?>" data-id="<?php echo $r->idproducto; ?>" data-precioc="<?php echo $r->precio; ?>" data-codigo="<?php echo $r->codigobarra; ?>" data-nombre="<?php echo $r->nombre; ?>" data-habili="1" ><i class="material-icons">add_shopping_cart</i></button>
                    </td>
                </tr>
                <?php endforeach; ?></tbody>
            </table>
        </div>
    </div>   
</div>
</div>
</div>
</div>
<!-- fin del cuerpo -->

<script>
//para seleccionar los productos
function agregardetalle(producto) {
    //tomar el id del producto 
  var id = producto.getAttribute('data-id');

 if(document.getElementById('preciov'+id).value == "")
  {


   alert("Selecciona Una opción de precio");
   document.getElementById('preciov'+id).focus();

   

  }else if (document.getElementById('preciov'+id).value != ""){


  //tomar el codigobarra del producto 
  var codigo = producto.getAttribute('data-codigo');
  //tomar el nombre del producto 
  var nombre = producto.getAttribute('data-nombre');
  //tomar el precio del producto 

  var precio = document.getElementById("preciov"+id).value;

  var precioc = producto.getAttribute('data-precioc');
    
   

  var stock = producto.getAttribute('data-stock');

  var estadoboton = producto.getAttribute('data-habili');

  
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
    document.getElementById("txtStock"+numero).value = stock;
    document.getElementById("txtPrecio"+numero).value = precio;
    document.getElementById("txtPrecioC"+numero).value = precioc;
    document.getElementById("txtSubTotal"+numero).value = precio;

    //volver txtBorrado a cero
    document.getElementById("txtBorrado").value = "0";

    //calcular Total
    calcularTotal(numeroDetalle+1);


    //document.getElementById("btnProd"+id).style.visibility = "hidden";
    $("#btnProd"+id).prop('disabled', true);

   //$('#idmodalproducto').modal({show: 'false' });


  }
  
    

    
}
</script>


<script>
    

    function ActivarCampos(){
        
        var compro = document.getElementById('selComprobante').value;

        if (compro==2) {

             
            $("#txtNRC").prop('disabled', false);
            $("#txtNIT").prop('disabled', false);


            $("#txtNRC").prop('required', true);
            $("#txtNIT").prop('required', true);

        }else if (compro!=2) {

              document.getElementById('txtNRC').value = '';
              document.getElementById('txtNIT').value = '';
              $("#txtNRC").prop('disabled', true);
              $("#txtNIT").prop('disabled', true);
              $("#txtNRC").prop('required', false);
              $("#txtNIT").prop('required', false);



        }
        
     
             
           
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
        var idprobo = parseInt(document.getElementById("txtIdproducto"+i).value);
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
        document.getElementById("txtTotal").value = parseFloat(total).toFixed(2);

        if ((numero-1) == 1) {
            //ocultar el botón 
            document.getElementById("btnComprar").style.display = 'none';
            //ocultar el total
            document.getElementById("filaTotal").style.display = 'none'; 

        }


    }

    //document.getElementById("btnProd"+idprobo).style.visibility = "visible";

     $("#btnProd"+idprobo).prop('disabled', false);
    
}
</script>





<script>
//para calcular el precio según la cantidad
function calcularCantidad(cantidad) {
    //tomar el id del detalle 

    var i = cantidad.getAttribute('data-i');
    

    
    //comparar el valor de la cantidad 
    var cantidad = parseInt(document.getElementById("txtCantidad"+i).value);

    var existencia = parseInt(document.getElementById("txtStock"+i).value);


    if (cantidad <= 0) {
        alert('La cantidad debe ser al menos uno');

        document.getElementById("txtCantidad"+i).value = 1;
    }else if(cantidad > existencia){
        alert('La cantidad a vender no puede ser mayor a la cantidad en existencia');
        document.getElementById("txtCantidad"+i).value = existencia;
    }
    else{    
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
    var descuento = parseFloat(document.getElementById("txtDescuento"+i).value);
    
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
    var subtotal = (parseFloat(precio) * parseInt(cantidad));
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>


