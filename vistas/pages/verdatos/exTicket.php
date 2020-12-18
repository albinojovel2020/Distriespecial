<?php
//$medidaTicket = 180;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>

    <style>
       * {
    font-size: 13px;
    font-family: 'sans-serif';
    margin:1px;
}

/*'Times New Roman' */


td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.producto,
th.producto {
    width: 100px;
    max-width: 100px;
}

td.cantidad,
th.cantidad {
    width: 77px;
    max-width: 77px;
    word-break: break-all;
    text-align: left;
}

td.precio,
th.precio {
    width: 77px;
    max-width: 77px;
    word-break: break-all;
    text-align:right;
}

.centrado {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 100%;
    max-width: 100%;
    
}

img {
    max-width: inherit;
    width: inherit;
    
}

.anulada{
	position: absolute;
	left: 9%;
	top: 8%;
	transform: translateX(-10%) translateY(-50%);
    width:100%;
}

div {

}

/*@media print {
    .oculto-impresion,
    .oculto-impresion * {
        display: none !important;
    }
}*/
    </style>
<script>
// Code goes here

/*function imprimir() {
    window.print();
}

onload="windows.print()"
*/
</script>
<script type="text/javascript">
            function imprimir() {
                if (window.print) {
                    window.print();
                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }
        </script>
</head>

<body onload="imprimir();"
>
<?php
    $jpg = file_get_contents("img/logoblancocuadrado.jpg");
    $jpgbase64 = base64_encode($jpg);
    $jpg1 = file_get_contents("img/anulado.png");
	$jpgbase641 = base64_encode($jpg1);
?>
<?php if ($anulada==1) {?>
	<img class="anulada" src="data:image;base64,<?= $jpgbase641;?>" alt="Anulada">
<?php }?>
<div class="ticket">
<h2><i><img style=" margin-left:60px; height:150px; width:150px;" src="data:image;base64,<?= $jpgbase64;?>" alt="Logotipo"></i></h2>
            <div style=" border: black 2px solid; font-size: 150%;"><p style="" class="centrado"><b>DISTRIBUIDORA<br> ESPECIAL</b></p></div>
                <br>
                <p class="centrado"><b>Vendedor:</b><?php echo $nombrevende;?></p>
                <p class="centrado"><?php echo $fe;?></p>
                
            <table>
                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="producto">PRODUCTO</th>
                        <th class="precio">PRECIO($)</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($this->modelVenta->ListarVenta11($id) as $r):?>
                    <tr>
                        <td class="cantidad"><?php echo $r->cantidad.'<b> '.$r->nombremedi;'</br>'; ?></td>
                        <td class="producto"><?php echo $r->pron; ?></td>
                        <td class="precio">$ <?php echo $r->preciov + $r->motoindi; ?></td>
                    </tr>
                    
                    <?php endforeach; ?> 
                    <!--<tr>
                        <td class="cantidad"></td>
                        <td class="producto"><b>SubTotal</b></td>
                        <td class="precio">$ <b><?php echo $total-$iva;?></b></td>
                    </tr>
                    <tr>
                        <td class="cantidad"></td>
                        <td class="producto"><b>IVA</b></td>
                        <td class="precio">$ <b><?php echo $iva;?></b></td>
                    </tr>-->
                    <tr>
                        <td class="cantidad"></td>
                        <td class="producto" style="text-align:right;"><b>TOTAL</b></td>
                        <td class="precio">$ <b><?php echo $total+$iva;?></b></td>
                    </tr>
                </tbody>
            </table><br>
            <p class="centrado">¡GRACIAS POR SU COMPRA!
                <br><b>Grupo#2 ULS-PPI-PSL-2020</b></p>
        </div><br><br>
        <p>.</p>
       
        <!--<button class="oculto-impresion" onclick="imprimir()">Imprimir</button>-->
    
</body>
</html>