<?php
$contenidoHTML = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
       * {
    font-size: 12px;
    font-family: "Times New Roman";
    margin:2px;
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.producto,
th.producto {
    width: 75px;
    max-width: 75px;
}

td.cantidad,
th.cantidad {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.precio,
th.precio {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centrado {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
    
}

img {
    max-width: inherit;
    width: inherit;
    
}
    </style>
<script>
// Code goes here

/*function imprimir() {
    window.print();
}*/
</script>
</head>
<body>
<div class="ticket">
<img style="margin-left:18px;/>
<p style="margin-left:40px;" class="centrado"><b>DISTIBUIDORA
    <br>ESPECIAL</b>
    <br>21/10/2020 09:09 p.m.</p>
<table>
    <thead>
        <tr>
            <th class="cantidad">CANT</th>
            <th class="producto">PRODUCTO</th>
            <th class="precio">PRECIO($)</th>
        </tr>
    </thead>
    <tbody>';
    foreach($this->model->ConsultaPDF() as $data): 

        $contenidoHTML .='<tr>
            <td class="cantidad">'.$data->cantidad.'</td>
            <td class="producto">'.$data->nombrepro.'</td>
            <td class="precio">'.$data->precioventa.'</td>;
        </tr>';
    endforeach;
    $contenidoHTML .='</tbody>
</table><br>
<p style="margin-left:38px;" class="centrado">¡GRACIAS POR SU COMPRA!
    <br><b>Grupo#2 ULS-PPI-PSL-2020</b></p>
</div>

</body>
</html>';

#echo $contenidoHTML;


    #llamamos el archivo para usar la librería
    require_once("vistas/dompdf/autoload.inc.php");

    #crear el objeto DOMPDF
    $dompdf = new DOMPDF();
    //$dompdf->set_paper('letter', 'landscape');
    $dompdf->set_paper(array(0, 0, 249.45, 2000));


    #cargar el contenido html
    $dompdf->load_html($contenidoHTML);

    $dompdf->render(); // Generar el PDF desde contenido HTML
    $pdf = $dompdf->output(); // Obtener el PDF generado

    $dompdf->stream("Ticket.pdf", array('Attachment' => 0)); // Enviar el PDF generado al navegador
  

 ?>