<?php

require_once 'modelo/Producto.php';
require_once 'modelo/Categoria.php';
require_once 'modelo/Proveedor.php';

class MovimientosController
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
		require_once 'vistas/pages/registrar/ingresoproducto.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	public function CrearVenta(){
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearventa.php';
		require_once 'vistas/pages/piepagina1.php';
	}


	
}

?>