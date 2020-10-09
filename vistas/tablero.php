
<!-- inicio del cuerpo -->
<nav>
    <div class="nav-wrapper white  ">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li ><a class="grey-text text-darken-1"><b>DISTRIBUIDORA ESPECIAL > TABLERO</b></a></li> 
    </ul>
    <ul class="right">
      <li><a class="waves-effect waves-light btn modal-trigger grey lighten-4 grey-text text-darken-1" href="#modal1" ><b>Info.</b><i class="material-icons right grey-text text-darken-1">info</i></a></li>
  </ul>
</div>
</nav>  
<br>
<div class="container">
    <div class="row">
        <div class="col s12 m6 l6">
            <div class="row"> 
                <div class="card grey lighten-4">
                    <div class="card-image">
                        <img class="ll" src="vistas/img/user.svg">
                    </div>
                    <div class="card-content">
                        <div class="collection">
                            <input type="hidden"  value="<?php echo $usuario->idusuario; ?>" name="idusuario">
                            <a href="#!" class="collection-item black-text"><span class="badge cyan white-text"><?php echo $usuario->nombre;?></span>Nombre de usuario:</a>
                            <a href="#!" class="collection-item black-text"><span class="badge cyan white-text"><?php echo $usuario->apellido;?></span>Apellido:</a>

                        </div>
                    </div>
                    <div class="card-action">
                        <a class="green-text text-accent-4" href="?c=<?php echo base64_encode('Usuario');?>"><b>Ver usuarios</b></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6">
            <div class="row"> 
                <div class="card grey lighten-4">
                    <div class="card-image">
                        <img class="ll" src="vistas/img/ventas.svg">

                    </div>
                    <div class="card-content">
                        <div class="collection">
                            <a href="#!" class="collection-item black-text"><span class="badge cyan white-text">356</span>Total ventas del dia:</a>
                            <a href="#!" class="collection-item black-text"><span class="badge cyan white-text">Rosales</span>Apellido:</a>

                        </div>
                    </div>
                    <div class="card-action">
                        <a class="green-text text-accent-4" href="#"><b>Ir a modulo de ventas</b></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col s12 m6 l12">
            <div class="row"> 
                <div class="card grey lighten-4">
                    <div class="card-image">
                        <img class="ll" src="vistas/img/compras.svg">

                    </div>
                    <div class="card-content">
                        <div class="collection">
                            <a href="#!" class="collection-item black-text"><span class="badge cyan white-text">sal</span>Producto agotado:</a>
                            <a href="#!" class="collection-item black-text"><span class="badge cyan white-text">1 libra</span>Cantidad en existencia:</a>

                        </div>
                    </div>
                    <div class="card-action">
                        <a class="green-text text-accent-4"  href="?c=<?php echo base64_encode('Movimientos');?>"><b>Ir a modulo de movimientos de almacen</b></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

 <a href="?c=<?php echo base64_encode('Usuario');?>&a=<?php echo base64_encode('RecuperarPassword');?>">olvido su contraseña?</a>
<!-- fin del cuerpo -->
