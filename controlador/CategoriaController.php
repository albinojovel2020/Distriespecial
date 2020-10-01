<?php

require_once 'modelo/Categoria.php';

class CategoriaController
{
	private $model;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->model = new Categoria();
		

	}

	//Tablas de Usuario
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/vercategoria.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	public function CrearCategoria(){
		//Todas las partes de la vista
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearcategoria.php';
		require_once 'vistas/pages/piepagina.php';
	}

	public function RegistrarCategoria(){
		//tomar todos los datos
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->descripcion = $_REQUEST['descripcion'];
		$this->model->idusuario = $_REQUEST['idusuario'];
		

		//Guardar Usuario
		$this->model->RegistrarCategoria($this->model);

		//La vista de usuarios registrados
		echo "<script>
		alert('CORRECTO: Los datos fueron guardados.');
		window.location.href='?c=".base64_encode('Categoria')."';
		</script>";
	}

	public function EditarCategoria(){
		//Tomar el id
		$idcategoria = base64_decode($_REQUEST['idcategoria']);

		//Obtener el registro con ese id
		$categoria = $this->model->ObtenerCategoria($idcategoria);

		if ($categoria->idusuario == $_SESSION['id']) {
			# code...
			//muestra todas las partes de la vista Registrar
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/actualizar/actualizarcategoria.php';
		require_once 'vistas/pages/piepagina.php';
		}else{
			echo "No puede";
		}
		
	}

	public function ActualizarCategoria(){
		//Tomar todos los datos
		$this->model->idcategoria = $_REQUEST['idcategoria'];
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->descripcion = $_REQUEST['descripcion'];
		$this->model->idusuario = $_REQUEST['idusuario'];

		//Actualiza el Usuario
		$this->model->ActualizarCategoria($this->model);

		//La vista de usuario y muestra la actualizacion de x usuario
		echo "<script>
		alert('CORRECTO: Registro Modificado.');
		window.location.href='?c=".base64_encode('Categoria')."';
		</script>";

	}

	public function Eliminar(){
		//Tomar el id
		$idcategoria = base64_decode($_REQUEST['idcategoria']);

		$this->model->EliminarCategoria($idcategoria);
		echo "<script>
		alert('Registro ELIMINADO.');
		window.location.href='?c=".base64_encode('Categoria')."';
		</script>";
	}

}

?>