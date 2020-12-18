<?php

//require_once 'modelo/Categoria.php';

class DocController
{
	//private $model;
	

	public function __CONSTRUCT()
	{
		//Inicializa los modelos
		//$this->model = new Categoria();
		

	}

	//Tablas de Usuario
	public function Index(){
		//muestra todas las partes de la vista de Usuario Almacenado
		require_once 'vistas/pages/encabezadopagina1.php';
		require_once 'vistas/pages/verdatos/doc.php';
		require_once 'vistas/pages/piepagina1.php';
    }
    
    public function Admin(){
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=ManualAdmin.pdf");
        readfile("vistas/doc/ManualdeAdministrador.pdf");
    }

    public function Usuario(){
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=ManualUsuario.pdf");
        readfile("vistas/doc/ManualdeUsuario.pdf");
    }

}

?>