<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este recibe peticiones 
    - Manda la información al modelo para procesarla
    - Carga las vistas como respuesta al usuario

*/
    require_once 'modelo/Producto.php';
    require_once 'modelo/Venta.php';
    require_once 'modelo/DetalleVenta.php';

class TicketController{
    private $modelProducto;
    private $modelVenta;
    private $modelDetalleVenta;

    public function __CONSTRUCT()
    {
        //Inicializa los modelos
        $this->modelProducto = new Producto();
        $this->modelVenta = new Venta();
        $this->modelDetalleVenta = new DetalleVenta();
    }
       
    public function Index(){
        /*$idusuario = base64_decode($_REQUEST["idusuario"]);

        //obtener el registro con ese id
        $usuario = $this->model->ObtenerUsuario($idusuario);*/
        //muestra todas las partes de la vista home
        //require_once 'vistas/pages/encabezadopagina1.php';
        require_once 'vistas/pages/verdatos/Ticket.php';
        //require_once 'vistas/pages/piepagina1.php';
    }
    
}

?>
