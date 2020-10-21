<?php

require_once 'modelo/Umedida.php';

class UmedidaController
{
	private $model;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->model = new Umedida();
		

	}

	//Tablas de Usuario
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/verumedida.php';
		require_once 'vistas/pages/piepagina1.php';
	}


	public function CrearUmedida(){
		//Todas las partes de la vista
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearumedida.php';
		require_once 'vistas/pages/piepagina.php';
	}


	public function RegistrarUmedida(){
		//tomar todos los datos
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->descripcion = $_REQUEST['descripcion'];
		$this->model->codigo = $_REQUEST['codigo'];
		

		//Guardar Usuario
		$this->model->RegistrarUmedida($this->model);

		//La vista de usuarios registrados
		echo "<script>
		alert('CORRECTO: Los datos fueron guardados.');
		window.location.href='?c=".base64_encode('Umedida')."';
		</script>";
	}


	public function EditarUmedida(){
		//Tomar el id
		$id = base64_decode($_REQUEST['id']);

		//Obtener el registro con ese id
		$umedida = $this->model->ObtenerUmedida($id);

		
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/actualizar/actualizarumedida.php';
		require_once 'vistas/pages/piepagina.php';
		
		
	}

	public function ActualizarUmedida(){
		//Tomar todos los datos
		$this->model->id = $_REQUEST['idumedida'];
		$this->model->nombre = $_REQUEST['nombre'];
		$this->model->descripcion = $_REQUEST['descripcion'];
		$this->model->codigo = $_REQUEST['codigo'];

		//Actualiza el Usuario
		$this->model->ActualizarUmedida($this->model);

		//La vista de usuario y muestra la actualizacion de x usuario
		echo "<script>
		alert('CORRECTO: Registro Modificado.');
		window.location.href='?c=".base64_encode('Umedida')."';
		</script>";

	}

	


}

?>