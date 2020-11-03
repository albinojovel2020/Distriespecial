
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Comprobante de Credito Fiscal</title>
    <!--<link rel="stylesheet" href="style.css">-->
    <style>
    @import url('fonts/BrixSansRegular.css');
@import url('fonts/BrixSansBlack.css');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
p, label, span, table{
	font-family: 'BrixSansRegular';
	font-size: 9pt;
}
.h2{
	font-family: 'BrixSansBlack';
	font-size: 16pt;
}
.h3{
	font-family: 'BrixSansBlack';
	font-size: 7pt;
	display: block;
	background: ;
	color: #000;
	text-align: center;
	padding: 2px;
	margin-bottom: -4;
}
.h33{
	font-family: 'BrixSansBlack';
	font-size: 13pt;
	display: block;
	/*background: #0a4661;*/
	color: red;
	text-align: center;
	padding: 1px;
	
}
.h333{
	font-family: 'BrixSansBlack';
	font-size: 9pt;
	display: block;
	/*background: #0a4661;*/
	color: #000;
	padding: 1px;
	margin-top: 0px;
    margin-left:68%;
}
#page_pdf{
	width: 95%;
	margin: 15px auto 10px auto;
}

#factura_head, #factura_cliente, #factura_detalle{
	width: 100%;
	margin-bottom: 1px;
}
.logo_factura{
	width: 26%;
}
.info_empresa{
	width: 40%;
	text-align: center;
}
.info_factura{
	width: 40%;
}
.info_cliente{
	width: 100%;
}
.datos_cliente{
	width: 100%;
}
.datos_cliente tr td{
	width: 50%;
}
.datos_cliente{
	padding: 5px 10px 0 10px;
}
.datos_cliente label{
	width: 70px;
	display: inline-block;
    font-size: 8pt;
}
.datos_cliente p{
	display: inline-block;
}


.textright{
	text-align: right;
    font-size: 8pt;
}
.textleft{
	text-align: left;
    font-size: 8pt;
}
.textcenter{
	text-align: center;
    font-size: 8pt;
}
.round{
	border-radius: 10px;
	border: 1px solid #0a4661;
	overflow: hidden;
	padding-bottom: 15px;
}

.round p{
	padding: 0 15px;
}

.round1{
	border-radius: 10px;
	border: 1px solid #0a4661;
	overflow: hidden;
    width:100%;
	padding-bottom: 15px;
}

#factura_detalle{
	border-collapse: collapse;
    width: 100%;
}
#factura_detalle thead th{
	background: #3B96AA;
	color: #000;
	padding: 5px;

}
#detalle_productos tr:nth-child(even) {
    background: #ededed;
}
#detalle_totales span{
	font-family: 'BrixSansBlack';
}

.detalle_totales{
	/*font-family: 'BrixSansBlack';*/
    background-color: #0a4661;
    border-color: #0a4661;
    border: 0.2pt;
}

.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	text-align: center;
	margin-top: 20px;
}
.anulada{
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translateX(-50%) translateY(-50%);
}

.imglogo{
    width:150px;
    height:150px;
}
</style>

</head>
<body>
<?php
	$jpg = file_get_contents("img/logoblancocuadrado.jpg");
	$jpgbase64 = base64_encode($jpg);
?>
<!--<img class="anulada" src="" alt="Anulada">-->
<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					<img class="imglogo" src="data:image;base64,<?= $jpgbase64;?>">
				</div>
			</td>
			<td class="info_empresa">
				<div>
					<span class="h2">DISTRIBUIDORA</span><br>
                    <span class="h2"><b>"ESPECIAL"</b></span>
                    <p>FIDEL ALCIDES CLAROS AMAYA</p>
					<p>Venta de productos para</p>
                    <p>Panaderia y Pastelería</p>
                    <p>Contamos con servicio a Domicilio</p>
					<p>4a. Avenida Norte No.27</p>
					<p>Soyapango, San Salvador</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">COMPROBANTE DE CREDITO FISCAL</span>
                    <span ><center style="margin-bottom:5px;"></center></span>
                    <span class="h33"><center><strong>N° </strong> 0005215</center></span>
					<p>REGISTRO No.163310-6</p>
					<p>NIT: 0617-080485-101-6</p>
				</div>
                
			</td>
            <span class="h333">FECHA:  <?php date_default_timezone_set("America/Guatemala"); echo date("d-m-Y");?></span>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="">
					<!--<span class="h3">Cliente</span>-->
					<table class="datos_cliente">
						<tr>
							<td><label>CLIENTE:</label><p>______________________________________________________________________</p></td>
						</tr>
                        <tr>
							<td><label>DIRECCIÓN:</label><p>______________________________________________________________________</p></td>
						</tr>
                        <tr>
							<td><label >NIT ó DUI:</label><p>_______________________</p></td>
                            <td><label style="width:132px; margin-left:-210px;">VENTA A CUENTA DE:</label><p>________________________</p></td>
						</tr>						
					</table>
				</div>
			</td>

		</tr>
	</table>
    <div class="round1">
	<table id="factura_detalle">
    
			<thead>
				<tr>
					<th width="50px" class="textleft">CANT.</th>
					<th class="textleft" width="140px">DESCRIPCIÓN</th>
					<th class="textcenter" width="50px">PRECIO <br>UNITARIO</th>
                    <th class="textcenter" width="65px">VENTAS NO <br>SUJETAS</th>
                    <th class="textcenter" width="50px">VENTAS <br>EXENTAS</th>
					<th class="textcenter" width="85px"> VENTAS<br> AFECTAS</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">
				<?php ?>
				<?php foreach($this->modelVenta->ListarVenta11($id) as $r):?>
				<tr>
					<td class="textcenter"><?php echo $r->cantidad; ?></td>
					<td><?php echo $r->pron; ?></td>
					<td class="textcenter"></td>
					<td class="textcenter"></td>
                    <td class="textcenter"></td>
                    <td class="textcenter"><?php echo $r->preciov; ?></td>
				</tr>

				<?php endforeach; ?>
				<tr>
                <td colspan="6" ><hr class="detalle_totales"></td>
                </tr>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="5" class="textright"><span>Sumas</span></td>
					<td class="textcenter">$<span><?php echo $total;?></span></td>
				</tr>
                <tr>
					<td colspan="5" class="textright"><span>Ventas Exentas</span></td>
					<td class="textcenter"><span></span></td>
				</tr>
                <tr>
					<td colspan="5" class="textright"><span>Venta No Sujeta</span></td>
					<td class="textcenter"><span></span></td>
				</tr>
                <tr>
					<td colspan="5" class="textright"><span>Sub-Total</span></td>
					<td class="textcenter"><span></span></td>
				</tr>
				<tr>
					<td colspan="5" class="textright"><span>(13%) IVA Retenido </span></td>
					<td class="textcenter"><span></span></td>
				</tr>
				<tr>
					<td colspan="5" class="textright"><span>Venta Total </span></td>
					<td class="textcenter">$<span><?php echo $total;?></span></td>
				</tr>
		</tfoot>
        
	</table>
    </div>
	<div>
		<!--<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>-->
		<h4 style="margin-left:-10px;" class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>