<?php
ob_start();
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'vistas/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$pdf = new Dompdf();

// Introducimos HTML de prueba


//$url = require_once ;

 $html=file_get_contents_curl("https://pruebasdstri.000webhostapp.com/?c=".base64_encode('Movimientos')."&a=".base64_encode('exTicket')."&id=".base64_encode($id)."&fe=".base64_encode($fe)."&total=".base64_encode($total));



// Cargamos el contenido HTML.
$pdf->loadhtml($html, 'UTF-8');


//$pdf->set_option('isRemoteEnabled', TRUE);

// Definimos el tamaño y orientación del papel que queremos.
/*Pag tamaño */
//$pdf->set_Paper("letter", "portrait");
//$pdf->set_Paper("b7", "portrait");

/*Array tamaño */
//$pdf->set_paper(array(0,0,104,250));
//$pdf->set_paper(array(0, 0, 612.00, 1008.0));
//$pdf->set_paper(array(0, 0, 150, 1000));249.45
$pdf->set_paper(array(0, 0, 150, 2000));

 
 
// Renderizamos el documento PDF.
$pdf->render();





$dompdf = $pdf->output(); // Obtener el PDF generado
/*1ra forma de abrir en nueva pestaña navegador */
// Enviamos el fichero PDF al navegador.
$id1 = base64_encode($id);
$pdf->stream($id.'.pdf', array('Attachment'=>0));

/*Fin 1ra forma*/

/* 2da forma de abrir nueva pestaña navegador */

/*file_put_contents("reportePdf.pdf", $dompdf); //save pdf on server

//opens generated pdf in new window, but this creates warning for popup
echo "<script type='text/javascript' language='javascript'>
window.open('reportePdf.pdf', '_blank');
</script>";*/
/* Fin de 2da*/

function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 2;
	curl_setopt($crl, CURLOPT_HEADER, 0);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_URL, $url);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}

