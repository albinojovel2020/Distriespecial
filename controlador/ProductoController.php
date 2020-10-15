<?php

require_once 'modelo/Producto.php';
require_once 'modelo/Categoria.php';
require_once 'modelo/Proveedor.php';

class ProductoController
{
	private $model;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->model = new Producto();
		$this->modelCategoria = new Categoria();
		$this->modelProveedor = new Proveedor();
	}

	//Tablas de Usuario
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/verproducto.php';
		require_once 'vistas/pages/piepagina1.php';
	}

      public function VerIngresos(){
		
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/vermovimientosproductos.php';
		require_once 'vistas/pages/piepagina1.php';
	
		
	}

	public function CrearProducto(){
		//Todas las partes de la vista
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearproducto.php';
		require_once 'vistas/pages/piepagina.php';
	}

	public function RegistrarProducto(){
		$img_default='img/default.png';
		$rutas='img';
		if (!mkdir($rutas, 0777, true)) {
            //echo("Fallo");
		}
		chmod($rutas, 0777);
		$archivo=$_FILES['producto1']['tmp_name'];
		$Narchivo=$_FILES['producto1']['name'];
		//$vivienda->casa = ($rutas);
		if ($Narchivo !="") {
			# code...
			move_uploaded_file($archivo, $rutas.'/'.$Narchivo);
			$rutas=($rutas.'/'.$Narchivo);  
		}else{
			$rutas=($img_default);
		}

		//tomar todos los datos
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->descripcion = $_REQUEST['descripcion'];
		$this->model->precio = $_REQUEST['precio'];
		$this->model->stock = $_REQUEST['stock'];
		$this->model->idcategoria = $_REQUEST['idcategoria'];
		$this->model->idproveedor = $_REQUEST['idproveedor'];
		$this->model->idusuario = $_REQUEST['idusuario'];
		$this->model->img = ($rutas);
		

		//Guardar Usuario
		$this->model->RegistrarProducto($this->model);

		//La vista de usuarios registrados
		echo "<script>
		alert('CORRECTO: Los datos fueron guardados.');
		window.location.href='?c=".base64_encode('Producto')."';
		</script>";
	}

	public function CambiarEstado(){
		//tomar id y nuevo estado
		$idproducto = base64_decode($_REQUEST['idproducto']);
		$nuevo_estado = base64_decode($_REQUEST['nuevo_estado']);

		//cambiar estado
		$this->model->CambiarEstadoProducto($nuevo_estado, $idproducto);

		//muestra la vista de usuario
		echo "<script>
		alert('CORRECTO: Registro Modificado.');
		window.location.href='?c=".base64_encode('Producto')."';
		</script>";
	}

	public function EditarProducto(){
		//Tomar el id
		$idproducto = base64_decode($_REQUEST['idproducto']);

		//Obtener el registro con ese id
		$producto = $this->model->ObtenerProducto($idproducto);

		/*if ($categoria->idusuario == $_SESSION['id']) {*/
			# code...
			//muestra todas las partes de la vista Registrar
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/actualizar/actualizarproducto.php';
		require_once 'vistas/pages/piepagina.php';
		/*}else{
			echo "No puede";
		}*/
		
	}

	public function IngresoProducto(){
		//Tomar el id
		$idproducto = base64_decode($_REQUEST['idproducto']);

		//Obtener el registro con ese id
		$producto = $this->model->ObtenerProducto($idproducto);

		/*if ($categoria->idusuario == $_SESSION['id']) {*/
			# code...
			//muestra todas las partes de la vista Registrar
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/actualizar/actualizarstockproducto.php';
		require_once 'vistas/pages/piepagina.php';
		/*}else{
			echo "No puede";
		}*/
		
	}

	public function ActualizarProducto(){

		$rutas='img';
		if (!mkdir($rutas, 0777, true)) {
            //echo("Fallo");
		}
		chmod($rutas, 0777);
		$archivo=$_FILES['producto1']['tmp_name'];
		$Narchivo=$_FILES['producto1']['name'];
		if ($Narchivo!="") {
			# code...
			move_uploaded_file($archivo, $rutas.'/'.$Narchivo);
			$rutas=($rutas.'/'.$Narchivo);
		}else{
			$img = $_REQUEST['producto1'];
			$rutas=($img);
		}
		
		

		//Tomar todos los datos
		$this->model->idproducto = $_REQUEST['idproducto'];
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->descripcion = $_REQUEST['descripcion'];
		$this->model->precio = $_REQUEST['precio'];
		$this->model->stock = $_REQUEST['stock'];
		$this->model->idcategoria = $_REQUEST['idcategoria'];
		$this->model->idproveedor = $_REQUEST['idproveedor'];
		$this->model->idusuario = $_REQUEST['idusuario'];
		$this->model->img = ($rutas);

		//Actualiza el Usuario
		$this->model->ActualizarProducto($this->model);

		//La vista de usuario y muestra la actualizacion de x usuario
		echo "<script>
		alert('CORRECTO: Registro Modificado.');
		window.location.href='?c=".base64_encode('Producto')."';
		</script>";

	}

public function ActualizarStockProducto(){

	
		//Tomar todos los datos
		$this->model->idproducto = $_REQUEST['idproducto'];
		$this->model->stockanterior = $_REQUEST['stockanterior'];
		$this->model->stock = $_REQUEST['stock'];
		$this->model->stockdespues = $_REQUEST['stockanterior']+$_REQUEST['stock'];
		$this->model->idusuario = $_REQUEST['usuario'];
		$this->model->fecha = $_REQUEST['fecha'];

		

		//Actualiza el Usuario
		$this->model->ActualizarStockProducto($this->model);

		//La vista de usuario y muestra la actualizacion de x usuario
		echo "<script>
		alert('CORRECTO: Stock actualizado.');
		window.location.href='?c=".base64_encode('Movimientos')."';
		</script>";

	}
	

	public function Eliminar(){
		//Tomar el id
		$idproducto = base64_decode($_REQUEST['idproducto']);

		$this->model->EliminarProducto($idproducto);
		echo "<script>
		alert('Registro ELIMINADO.');
		window.location.href='?c=".base64_encode('Producto')."';
		</script>";
	}

}

?>