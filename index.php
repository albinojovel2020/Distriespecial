<?php
//iniciamos la sesión
session_start();

//para las conexiones a la base de datos
require_once 'modelo/Conexion.php';  

    //el valor que coloquemos aquí será el primer controlador
    //que se llame cuando cargue el proyecto
  $controller = 'Login';

  // Toda esta lógica hara el papel de un FrontController
  //comprobamos si la c "controlador" está vacía
  if(!isset($_REQUEST['c']))
  {
      //si el parámetro no ha sido definido cargará HomeController.php
      require_once 'controlador/'.$controller.'Controller.php';

      //Da un formato igual al nombre de la clase controlador
      $controller = $controller.'Controller'; //HomeController

      //instanciar la clase PrincipalController
      $controller = new $controller;

      //llamamos el método Index() del controlador
      //este método debe construir y lanzar la vista que queremos 
      //a penas cargue el proyecto
      $controller->Index();    
  }
  else // si la c "controlador" tiene valor
  {
    //Obtenemos el controlador decodificado que queremos cargar 
    $controller = base64_decode($_REQUEST['c']);;

    //verificamos si se envía también una a "acción/método" y de decodifica
    //si no se envía entonces la acción que se tomará será Index
    $accion = isset($_REQUEST['a']) ? base64_decode($_REQUEST['a']) : 'Index';
    
    //incluimos el controlador
    require_once 'controlador/'.$controller.'Controller.php';

    //Da un formato igual al nombre de la clase del controlador enviado
    $controller = $controller.'Controller'; //EnviadoController

    //instanciar la clase controlador EnviadoController
    $controller = new $controller;
    
    //esta función llama el nombre del controlador y la acción solicitadas
    //de modo que se acceda al archivo controlador y se ejecute la 
    //acción correspondiente
    call_user_func(array( $controller, $accion ) );
}

?>
