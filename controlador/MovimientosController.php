<?php

require_once 'modelo/Producto.php';
require_once 'modelo/Categoria.php';
require_once 'modelo/Proveedor.php';
require_once 'modelo/Venta.php';
require_once 'modelo/DetalleVenta.php';
require_once 'modelo/Comprobante.php';
require_once 'modelo/Usuario.php';



class MovimientosController
{
	private $model;
	private $modelCategoria;
	private $modelProveedor;
	private $modelVenta;
	private $modelDetalleVenta;
	private $modelComprobante;
	private $modelUsuario;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->model = new Producto();
		$this->modelCategoria = new Categoria();
		$this->modelProveedor = new Proveedor();
		$this->modelVenta = new Venta();
		$this->modelDetalleVenta = new DetalleVenta();
		$this->modelComprobante = new Comprobantes();
		$this->modelUsuario = new Usuario();
	}

	public function Index(){
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/ingresoproducto.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	public function VerVentas(){
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/verventas.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	public function CrearVenta(){

        $idusu = base64_decode($_REQUEST['idusuario']);
        
        $datosfactura = $this->modelUsuario->ObtenerSiguienteFactura($idusu);

		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearventa.php';
		require_once 'vistas/pages/piepagina1.php';

	}

	  public function GuardarVenta(){
        $venta = new Venta();
        //captura todos los datos de la venta 
 		$venta->numeroventa = $_REQUEST['txtNumeroVenta'];
 		date_default_timezone_set("America/Guatemala");
 		$fecha = date('d-m-Y');
 		$horas = date('h:i:s');
		 $tiempo = date('A');
		 
 		$mifecha = $fecha.' '.$horas .' '.$tiempo;
 		$venta->fechaventa = $mifecha;
 		$venta->total = $_REQUEST["txtTotal"];
 		$venta->idusuario = $_REQUEST["txtIdUsuario"];
 		$venta->tipo_comprobante = $_REQUEST["selComprobante"];
 		$venta->tiva = $_REQUEST["txtTotalIva"];
 		$venta->cliente = $_REQUEST["txtNombreCliente"];
 		$venta->giro = $_REQUEST["txtGiro"];
 		$venta->nrc = $_REQUEST["txtNRC"];
		 $venta->nit = $_REQUEST["txtNIT"];
		 


        //obtener el número de detalles que se enviaron
 		$numerodetalles = $_REQUEST['txtCantidadDetalle'];        

        //guardar la venta y obtener el id guardado
 		$venta = $this->modelVenta->guardarventa($venta);
     //guardar todos los detalles
 		for ($i=1; $i < $numerodetalles; $i++) { 
 			$detalleventa = new DetalleVenta();
                # tomar todos los datos del detalle
 			$detalleventa->idventa = $venta->nuevoid;
 			$detalleventa->idproducto = $_REQUEST['txtIdproducto'.$i];
 			$detalleventa->cantidadventa = $_REQUEST['txtCantidad'.$i];
 			$detalleventa->precioventa = $_REQUEST['txtSubTotal'.$i];
 			$detalleventa->stockanterior = $_REQUEST['txtStock'.$i]; 
 			$detalleventa->preciocompra = $_REQUEST['txtPrecioC'.$i]; 

 			$detalleventa->montoiva = $_REQUEST['txtMontoIva'.$i]; 

 			$detalleventa->stockdespues = $_REQUEST['txtStock'.$i]-$_REQUEST['txtCantidad'.$i];
 			$detalleventa->usuario = $_REQUEST['txtIdUsuario'];
 			$detalleventa->fcrea = $_REQUEST['txtFechaVenta'];





 			$this->modelDetalleVenta->guardardetalleventa($detalleventa); 
                //actualiza stock
 			$this->modelDetalleVenta->ActualizarStockProductoSalida($detalleventa);
		 }	
		 
 		echo "<script>
 		alert('CORRECTO: Los datos fueron guardados.');
 		window.location.href='?c=".base64_encode('Movimientos')."&a=".base64_encode('VerVentas')."';
 		</script>";
        
	}
	
	public function VERPDF(){
		//require_once 'vistas/pages/verdatos/Ticket.php';
		$nfac = base64_decode($_REQUEST['nfac']);

		$pdf = $this->modelVenta->ConsultaPDF($nfac);
		
		$this->modelVenta->VerPDF($pdf);
	}

	public function Ticket(){
		//$ticket = $this->modelVenta->VerPDF($id);
		$id = base64_decode($_REQUEST['id']);
		 $fe = base64_decode($_REQUEST['fe']);
		 $iva = base64_decode($_REQUEST['iva']);
		 $cliente = base64_decode($_REQUEST['cliente']);
		 $nombrevende = base64_decode($_REQUEST['nombrevende']);
		 $total = base64_decode($_REQUEST['total']);
		 $anulada = base64_decode($_REQUEST['anulada']);
		//$ticket = $this->modelVenta->ConsultaPDF1($id);
		require_once 'vistas/pages/verdatos/Ticket.php';
		
	}

	public function exTicket(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$iva = base64_decode($_REQUEST['iva']);
		$cliente = base64_decode($_REQUEST['cliente']);
		$nombrevende = base64_decode($_REQUEST['nombrevende']);
		$total = base64_decode($_REQUEST['total']);
		$anulada = base64_decode($_REQUEST['anulada']);
		require_once 'vistas/pages/verdatos/exTicket.php';
		
	}

	public function Factura(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$cliente = base64_decode($_REQUEST['cliente']);
		$iva = base64_decode($_REQUEST['iva']);
		 $nombrevende = base64_decode($_REQUEST['nombrevende']);
		$total = base64_decode($_REQUEST['total']);
		$anulada = base64_decode($_REQUEST['anulada']);
		//$ticket = $this->modelVenta->ConsultaPDF1($id);
		require_once 'vistas/pages/verdatos/Factura.php';
	}

	public function exFactura(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$iva = base64_decode($_REQUEST['iva']);
		$cliente = base64_decode($_REQUEST['cliente']);
		 $nombrevende = base64_decode($_REQUEST['nombrevende']);
		$total = base64_decode($_REQUEST['total']);
		$anulada = base64_decode($_REQUEST['anulada']);
		require_once 'vistas/pages/verdatos/exFactura.php';
	}

	public function CFiscal(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$cliente = base64_decode($_REQUEST['cliente']);
		$iva = base64_decode($_REQUEST['iva']);
		 $nombrevende = base64_decode($_REQUEST['nombrevende']);
		$total = base64_decode($_REQUEST['total']);
		$anulada = base64_decode($_REQUEST['anulada']);
		//$ticket = $this->modelVenta->ConsultaPDF1($id);
		require_once 'vistas/pages/verdatos/CFiscal.php';
	}

	public function exCFiscal(){

		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$iva = base64_decode($_REQUEST['iva']);
		$cliente = base64_decode($_REQUEST['cliente']);
		 $nombrevende = base64_decode($_REQUEST['nombrevende']);
		$total = base64_decode($_REQUEST['total']);
		$anulada = base64_decode($_REQUEST['anulada']);
		require_once 'vistas/pages/verdatos/exCFiscal.php';
	}

	public function AnularVenta(){

		$idvea = base64_decode($_REQUEST['idvea']);
		$idusuario = base64_decode($_REQUEST['idusuario']);

		$datosdetalle = $this->modelDetalleVenta->DatosDetallesVenta($idvea);

		foreach ($datosdetalle as $r) {

             //Tomar todos los datos
			$this->model->idproducto = $r->idproducto;
			$this->model->stockanterior = $r->stock;
			$this->model->stock = $r->cantidad;
			$this->model->stockdespues = $r->stock+$r->cantidad;
			$this->model->idusuario =  $idusuario;
			$this->model->fecha =  date("d-m-Y");
			$this->model->motivo = "Por anulacion de venta";


			$this->model->ActualizarStockProducto($this->model);

            

        }
       



		
		$this->modelVenta->AnulaVenta($idvea);
		

		echo "<script>
		alert('CORRECTO: Venta anulada con exito.');
		window.location.href='?c=".base64_encode('Movimientos')."&a=".base64_encode('VerVentas')."';
		</script>";
	}

	public function Correlativo(){
		header('Content-Type: application/json');

		$comprobante = $this->modelComprobante->ListarCorrelativo($_POST['id']);
        print_r( json_encode ( $comprobante ) );
	}

	public function VentaDia(){
		$usuariodia = $this->modelUsuario->UsuariosDia();
		//$idusuario = $usuariodia[idusuario];
		/*foreach ($usuariodia as $ud) {
			$idud = $ud->nombre;
		}*/
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/ventadia.php';
		require_once 'vistas/pages/piepagina1.php';
	}
	
}

?>