<?php

require_once 'modelo/Proveedor.php';

class ProveedorController
{
	private $model;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->model = new Proveedor();
		

	}

	//Tablas de Usuario
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/verproveedor.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	public function CrearProveedor(){
		//Todas las partes de la vista
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearproveedor.php';
		require_once 'vistas/pages/piepagina.php';
	}

	public function RegistrarProveedor(){
		//tomar todos los datos
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->apellido = $_REQUEST['apellidos'];
		$this->model->dui = $_REQUEST['dui'];
		$this->model->telefono = $_REQUEST['telefono'];
		$this->model->nombreempresa = $_REQUEST['nombreempre'];
		$this->model->direccionempresa = $_REQUEST['direccion'];
		$this->model->idusuario = $_REQUEST['idusuario'];
		

		//Guardar Usuario
		$this->model->RegistrarProveedor($this->model);

		//La vista de usuarios registrados
		echo "<script>
		alert('CORRECTO: Los datos fueron guardados.');
		window.location.href='?c=".base64_encode('Proveedor')."';
		</script>";
	}

	public function CambiarEstado(){
		//tomar id y nuevo estado
		$idproveedor = base64_decode($_REQUEST['idproveedor']);
		$nuevo_estado = base64_decode($_REQUEST['nuevo_estado']);

		//cambiar estado
		$this->model->CambiarEstadoProveedor($nuevo_estado, $idproveedor);

		//muestra la vista de usuario
		echo "<script>
		alert('CORRECTO: Registro Modificado.');
		window.location.href='?c=".base64_encode('Proveedor')."';
		</script>";
	}

	public function EditarProveedor(){
		//Tomar el id
		$idproveedor = base64_decode($_REQUEST['idproveedor']);

		//Obtener el registro con ese id
		$proveedor = $this->model->ObtenerProveedor($idproveedor);

		/*if ($categoria->idusuario == $_SESSION['id']) {*/
			# code...
			//muestra todas las partes de la vista Registrar
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/actualizar/actualizarproveedor.php';
		require_once 'vistas/pages/piepagina.php';
		/*}else{
			echo "No puede";
		}*/
		
	}

	public function ActualizarProveedor(){
		//Tomar todos los datos
		$this->model->idproveedor = $_REQUEST['idproveedor'];
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->apellido = $_REQUEST['apellidos'];
		$this->model->dui = $_REQUEST['dui'];
		$this->model->telefono = $_REQUEST['telefono'];
		$this->model->nombreempresa = $_REQUEST['nombreempre'];
		$this->model->direccionempresa = $_REQUEST['direccion'];
		$this->model->idusuario = $_REQUEST['idusuario'];

		//Actualiza el Usuario
		$this->model->ActualizarProveedor($this->model);

		//La vista de usuario y muestra la actualizacion de x usuario
		echo "<script>
		alert('CORRECTO: Registro Modificado.');
		window.location.href='?c=".base64_encode('Proveedor')."';
		</script>";

	}

	public function Eliminar(){
		//Tomar el id
		$idcategoria = base64_decode($_REQUEST['idcategoria']);

		$this->model->EliminarProveedor($idcategoria);
		echo "<script>
		alert('Registro ELIMINADO.');
		window.location.href='?c=".base64_encode('Proveedor')."';
		</script>";
	}

}

?>