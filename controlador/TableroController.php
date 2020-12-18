<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este recibe peticiones 
    - Manda la información al modelo para procesarla
    - Carga las vistas como respuesta al usuario

*/
    require_once 'modelo/Usuario.php';
    require_once 'modelo/TipoUsuario.php';
    require_once 'modelo/Venta.php';
    require_once 'modelo/Producto.php';

class TableroController{
    private $model;
    private $modelTipoUsuario;
    private $modelVenta;
    private $modelProducto;

    public function __CONSTRUCT()
    {
        //Inicializa los modelos
        $this->model = new Usuario();
        $this->modelTipoUsuario = new TipoUsuario();
        $this->modelVenta = new Venta();
        $this->modelProducto = new Producto();
    }
       
    public function Index(){
        $idusuario = base64_decode($_REQUEST["idusuario"]);

        //obtener el registro con ese id
        $usuario = $this->model->ObtenerUsuario($idusuario);
        $totall = $this->modelVenta->TotalVenta();
        $productos = $this->modelProducto->ListarProductosActivoSinexistencia1();
        $count = $this->modelProducto->ProductosRegistrados();
        /*foreach ($productos as $pro) {
           $productosss = $pro->nombre;
        }*/
        /*<?php foreach ($productos as $pro):?> <?php echo $pro->nombre; ?><?php endforeach; ?>*/
        
        //muestra todas las partes de la vista home
        require_once 'vistas/pages/encabezadopagina1.php';
        require_once 'vistas/tablero.php';
        require_once 'vistas/pages/piepagina1.php';
    }
    
}

?>
