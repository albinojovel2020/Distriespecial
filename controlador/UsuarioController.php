<?php

require_once 'modelo/Usuario.php';
require_once 'modelo/TipoUsuario.php';
require_once 'modelo/PreguntaSecreta.php';


/**
 *
 */
class UsuarioController
{
	private $model;
	private $modelTipoUsuario;
	private $modelPreguntaSecreta;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->model = new Usuario();
		$this->modelTipoUsuario = new TipoUsuario();
		$this->modelPreguntaSecreta = new PreguntaSecreta();
		

	}

	//Tablas de Usuario
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/verusuarios.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	//Crear Usuario Nuevo
	public function CrearUsuario(){
		//Todas las partes de la vista
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearusuario.php';
		require_once 'vistas/pages/piepagina.php';
	}

	//Registrar Usuario
	public function RegistrarUsuario(){
		//tomar todos los datos
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->apellido = $_REQUEST['apellidos'];
		$this->model->telefono = $_REQUEST['telefono'];
		$this->model->usuario = $_REQUEST['usuario'];
		$this->model->clave = $_REQUEST['clave1'];
		$this->model->idpreguntasecreta = $_REQUEST['idpreguntasecreta'];
		$this->model->respuestasecreta = $_REQUEST['respuestasecreta1'];
		$this->model->idtipousuario = $_REQUEST['idtipousuario'];
		

		//Guardar Usuario
		$this->model->RegistrarUsuario($this->model);

		//La vista de usuarios registrados
		echo "<script>
				alert('CORRECTO: Los datos fueron guardados.');
				window.location.href='?c=".base64_encode('Usuario')."';
			 </script>";
	}

	//Editar Usuario
	public function EditarUsuario(){
		//$usuario = new Usuario();
		//Tomar el id
		$idusuario = base64_decode($_REQUEST['idusuario']);

		//Obtener el registro con ese id
		$usuario = $this->model->ObtenerUsuario($idusuario);

		//muestra todas las partes de la vista Registrar
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/actualizar/actualizarusuario.php';
		require_once 'vistas/pages/piepagina.php';
	}

	//Actualizar usuario
	public function ActualizarUsuario(){
		//Tomar todos los datos
		//$usuario_actual = $this->model->ObtenerUsuarios($id_usuario);
		$this->model->idusuario = $_REQUEST['idusuario'];
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->apellido = $_REQUEST['apellidos'];
		$this->model->telefono = $_REQUEST['telefono'];
		$this->model->usuario = $_REQUEST['usuario'];
		$this->model->idtipousuario = $_REQUEST['idtipousuario'];

		//Actualiza el Usuario
		$this->model->ActualizarUsuario($this->model);

		//La vista de usuario y muestra la actualizacion de x usuario
		echo "<script>
				alert('CORRECTO: Registro Modificado.');
				window.location.href='?c=".base64_encode('Usuario')."';
			 </script>";

	}

	//CambiarEstado
	public function CambiarEstado(){
		//tomar id y nuevo estado
		$idusuario = base64_decode($_REQUEST['idusuario']);
		$nuevo_estado = base64_decode($_REQUEST['nuevo_estado']);

		//cambiar estado
		$this->model->CambiarEstadoUsuario($nuevo_estado, $idusuario);

		//muestra la vista de usuario
		echo "<script>
				alert('CORRECTO: Registro Modificado.');
				window.location.href='?c=".base64_encode('Usuario')."';
			 </script>";
	}

	public function Eliminar(){
		//Tomar el id
		$idusuario = base64_decode($_REQUEST['idusuario']);

		$this->model->EliminarUsuario($idusuario);
		echo "<script>
				alert('Registro ELIMINADO.');
				window.location.href='?c=".base64_encode('Usuario')."';
			 </script>";
	  }

}

?>
