<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este recibe peticiones 
    - Manda la información al modelo para procesarla
    - Carga las vistas como respuesta al usuario
*/

class TableroController{
       
    public function Index(){
        //muestra todas las partes de la vista home
        require_once 'vistas/pages/encabezadopagina1.php';
        require_once 'vistas/tablero.php';
        require_once 'vistas/pages/piepagina1.php';
    }
    
}

?>
