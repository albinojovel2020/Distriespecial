<?php

require_once 'modelo/Producto.php';
require_once 'modelo/Categoria.php';
require_once 'modelo/Proveedor.php';
require_once 'modelo/Compra.php';


class CompraController
{
	private $model;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		$this->modelCompra = new Compra();
		$this->model = new Producto();
		$this->modelCategoria = new Categoria();
		$this->modelProveedor = new Proveedor();
	}

	//Tablas de Usuario
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/registrar/crearcompra.php';
		require_once 'vistas/pages/piepagina1.php';
	}

	
}

?>