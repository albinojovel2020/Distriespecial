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
		require_once 'vistas/pages/piepagina1.php';
	}

}

?>