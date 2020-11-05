 <?php

require_once 'modelo/Producto.php';
require_once 'modelo/Categoria.php';
require_once 'modelo/Proveedor.php';
require_once 'modelo/Venta.php';
require_once 'modelo/DetalleVenta.php';



class MovimientosController
{
	private $model;
	private $modelCategoria;
	private $modelProveedor;
	private $modelVenta;
	private $modelDetalleVenta;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->model = new Producto();
		$this->modelCategoria = new Categoria();
		$this->modelProveedor = new Proveedor();
		$this->modelVenta = new Venta();
		$this->modelDetalleVenta = new DetalleVenta();

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
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearventa.php';
		require_once 'vistas/pages/piepagina1.php';

	}

	  public function GuardarVenta(){
        $venta = new Venta();
        //captura todos los datos de la venta 
		$venta->numeroventa = $_REQUEST['txtNumeroVenta'];
		date_default_timezone_set("America/Guatemala");
		$fecha = date('Y-m-d');
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
		$total = base64_decode($_REQUEST['total']);
		//$ticket = $this->modelVenta->ConsultaPDF1($id);
		require_once 'vistas/pages/verdatos/Ticket.php';
	}

	public function exTicket(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$total = base64_decode($_REQUEST['total']);
		require_once 'vistas/pages/verdatos/exTicket.php';
	}

	public function CFiscal(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		/*$id1 = $id;
		$fe1 = $fe;*/
		$total = base64_decode($_REQUEST['total']);
		//$ticket = $this->modelVenta->ConsultaPDF1($id);
		require_once 'vistas/pages/verdatos/CFiscal.php';
	}
	
	public function exCFiscal(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$total = base64_decode($_REQUEST['total']);
		require_once 'vistas/pages/verdatos/exCFiscal.php';
	}

	public function Factura(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		/*$id1 = $id;
		$fe1 = $fe;*/
		$total = base64_decode($_REQUEST['total']);
		//$ticket = $this->modelVenta->ConsultaPDF1($id);
		require_once 'vistas/pages/verdatos/Factura.php';
	}

	public function exFactura(){
		$id = base64_decode($_REQUEST['id']);
		$fe = base64_decode($_REQUEST['fe']);
		$total = base64_decode($_REQUEST['total']);
		require_once 'vistas/pages/verdatos/exFactura.php';
	}

		public function AnularVenta(){
		//require_once 'vistas/pages/verdatos/Ticket.php';
		$idvea = base64_decode($_REQUEST['idvea']);
        
		$this->modelVenta->AnulaVenta($idvea);

		

		echo "<script>
		alert('CORRECTO: Venta anulada con exito.');
		window.location.href='?c=".base64_encode('Movimientos')."&a=".base64_encode('VerVentas')."';
		</script>";
	}
		

	
}

?>