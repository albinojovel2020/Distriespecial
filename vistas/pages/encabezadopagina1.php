<?php
  //validar la sesión
if(!isset($_SESSION["id"])){
    header("Location: ?c=".base64_encode('Login'));

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Distribuidora Especial</title>
  <!-- CSS  -->
  <link href="vistas/img/logotransparente2.png" type="image/png" rel="icon"/>
  <link href="vistas/css/icon.css" rel="stylesheet">
  <link href="vistas/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="vistas/css/estilo.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="vistas/css/jquery.dataTables.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
.confirmacion{background:#000;border:1px solid green;}
.negacion{background:#ffcccc;border:1px solid red}
  </style>
</head>
<body>
     <ul id="slide-out" class="sidenav sidenav-fixed white">
            <li>
                <div class="user-view">
                    <center>
                        <a href="#!user"><img class="circular" src="vistas/img/logoblancocuadrado.jpg"></a>
                    </center>
                </div>
                <div class="lin">
                <hr class="linea_lg">
            </div>
            </li>
           <li><a href="?c=<?php echo base64_encode('Tablero');?>" class="grey-text text-darken-1"><i class="material-icons grey-text text-darken-1">view_quilt</i><b>TABLERO</b></a></li>
        <li><a href="?c=<?php echo base64_encode('Usuario');?>" class="grey-text text-darken-1" ><i class="material-icons">person_add</i><b>USUARIOS</b></a></li>
        
        <li><a href="botones.html" class="grey-text text-darken-1"><i class="material-icons">local_mall</i><b>COMPRAS</b></a></li>
        <li><a href="tablas.html" class="grey-text text-darken-1"><i class="material-icons">add_shopping_cart</i><b>VENTAS</b></a></li>
        <li><a href="grid.html" class="grey-text text-darken-1"><i class="material-icons">offline_pin</i><b>CATEGORIAS</b></a></li>
        <li><a href="formulario.html" class="grey-text text-darken-1"><i class="material-icons">person</i><b>PROVEEDORES</b></a></li>
        <li><a href="tarjetas.html" class="grey-text text-darken-1"><i class="material-icons">cloud_download</i><b>BACKUP</b></a></li>
        <li><a href="footer.html" class="grey-text text-darken-1"><i class="material-icons">settings_backup_restore</i><b>RESTAURAR</b></a></li>
        <li><a href="?c=<?php echo base64_encode('Usuario');?>&a=<?php echo base64_encode('Ver_datos_usuario');?>" class="grey-text text-darken-1"><i class="material-icons">perm_identity</i><b>MI USUARIO</b></a></li>
        <li><a href="color.html" class="grey-text text-darken-1"><i class="material-icons">info</i><b>ACERCA DE</b></a></li>
        </ul>
        <div class="bar">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="menu01 material-icons">menu</i></a>
        </div>
 <main>


    <!-- fin de la cabecera -->
