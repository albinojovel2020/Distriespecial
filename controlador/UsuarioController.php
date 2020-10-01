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
		date_default_timezone_set("America/Guatemala");
		$fecha = date('Y-m-d');
		$horas = date('H:i:s');
		$tiempo = date('A');
		$mifecha = $fecha.' a las '.$horas .' '.$tiempo;
		$this->model->nombre = $_REQUEST['nombres'];
		$this->model->apellido = $_REQUEST['apellidos'];
		$this->model->telefono = $_REQUEST['telefono'];
		$this->model->usuario = $_REQUEST['usuario'];
		$this->model->clave = md5($_REQUEST['clave1']);
		$this->model->fecha = $mifecha;
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

	public function RecuperarPassword(){


		require_once 'vistas/pages/encabezadopagina.php';
		require_once 'vistas/login/recuperar_pass.php';
		require_once 'vistas/pages/piepagina.php';
		
	}
	public function RespuestasecretaNoCoiciden(){
		require_once 'vistas/pages/encabezadopagina.php';
		require_once 'vistas/login/error_restablecimiento.php';
		require_once 'vistas/pages/piepagina.php';
	}

	public function Recuperar(){
		$user= new Usuario();
		$user = $_REQUEST['usuario'];
		$preguntasecreta = $_REQUEST['idpreguntasecreta'];
		$respuestasecreta = $_REQUEST['respuestasecreta1'];
		$user = $this->model->ConsulUser($user, $preguntasecreta, $respuestasecreta);

		$this->model->Cambio($user);
	}

	public function NuevaPassword(){
		require_once 'vistas/pages/encabezadopagina.php';
		require_once 'vistas/login/from_pass.php';
		require_once 'vistas/pages/piepagina.php';
	}

	public function ActualizarContraseña(){
		date_default_timezone_set("America/Guatemala");
		$fecha = date('Y-m-d');
		$horas = date('H:i:s');
		$tiempo = date('A');
		$mifecha = $fecha.' a las '.$horas .' '.$tiempo;
		$idusuario=$_REQUEST['idusuario'];
		$nuevapass=md5($_REQUEST['n_pass1']);
		$fecha=$mifecha;
		$this->model->CambioPass($nuevapass, $fecha, $idusuario);

		echo "<script>
		alert('Su contraseña se modifico con exito.');
		window.location.href='?c=".base64_encode('Login')."';
		</script>";

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
