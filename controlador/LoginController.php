<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este recibe peticiones 
    - Manda la información al modelo para procesarla
    - Carga las vistas como respuesta al usuario
*/


//para usar los métodos del modelo usuario
    require_once 'modelo/Usuario.php';
    

    class LoginController{

        private $model;
        
        public function __CONSTRUCT(){
        //inicializa el modelo
            $this->model = new Usuario();
        }

        public function Index(){
        //destruir la sesión
            session_destroy();
        //llama la vista login
        //muestra todas las partes de la vista Login
            require_once 'vistas/pages/encabezadopagina.php';
            require_once 'vistas/login/login.php';
            require_once 'vistas/pages/piepagina.php';
        }

        public function Entrar(){
            $usuario = new Usuario();
            
        //captura todos los datos
            $usuario = $_REQUEST['usuario'];
            $clave = md5($_REQUEST['clave']);

        //consultar los datos
            $usuario = $this->model->Entrar($usuario, $clave);

        //iniciar la sesión o retornar al login
            $this->model->GenerarSesion($usuario);


        } 

        public function Error(){
            require_once 'vistas/pages/encabezadopagina.php';
            require_once 'vistas/login/error_sesion.php';
            require_once 'vistas/pages/piepagina.php';
        }


	    public function CerrarSesion(){
    	    // Eliminamos la sesión
    	    session_start();
    	    session_destroy();

		    header('location: ?c='.base64_encode("Login").'');
		    
  	    }

        public function Error_inactivo(){
             require_once 'vistas/pages/encabezadopagina.php';
            require_once 'vistas/login/Error_inativo.php';
            require_once 'vistas/pages/piepagina.php';
        }

    }

    ?>
