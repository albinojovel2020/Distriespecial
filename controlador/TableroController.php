<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este recibe peticiones 
    - Manda la información al modelo para procesarla
    - Carga las vistas como respuesta al usuario

*/
    require_once 'modelo/Usuario.php';
    require_once 'modelo/TipoUsuario.php';

class TableroController{
    private $model;
    private $modelTipoUsuario;

    public function __CONSTRUCT()
    {
        //Inicializa los modelos
        $this->model = new Usuario();
        $this->modelTipoUsuario = new TipoUsuario();
    }
       
    public function Index(){
        $idusuario = base64_decode($_REQUEST["idusuario"]);

        //obtener el registro con ese id
        $usuario = $this->model->ObtenerUsuario($idusuario);
        //muestra todas las partes de la vista home
        require_once 'vistas/pages/encabezadopagina1.php';
        require_once 'vistas/tablero.php';
        require_once 'vistas/pages/piepagina1.php';
    }
    
}

?>
