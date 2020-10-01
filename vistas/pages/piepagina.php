<!-- inicio del pie -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
      
      <div class="row">
          <div class="col s12 m12 l6">
            <center>
                 <i class="material-icons large grey-text text-darken-1">location_city</i>
           
            <h5 class="grey-text text-darken-1"><b>Distribuidora Especial</b></h5>
              <p class="grey-text text-darken-3">Para hornear y más, somos una empresa dedicada a la venta de productos de pasteleria ofreciendo una variedad de productos de alta calidad, que en convenio con la Universidad Luterana Salvadoreña y el grupo n°2 de Practicas Profecionales se desarrollo el presente sistema de inventario y facturación con el objetivo de automatizar los procesos administrativos de la antes mencionada empresa.</p>
               </center>
          </div>
          <div class="col s12 m12 l6">
             <center>
                 <i class="material-icons large grey-text text-darken-1">group_work</i>
           
            <h5 class="grey-text text-darken-1"><b>Distribuidora Especial</b></h5>
              <p class="grey-text text-darken-3">Para hornear y más, somos una empresa dedicada a la venta de productos de pasteleria ofreciendo una variedad de productos de alta calidad, que en convenio con la Universidad Luterana Salvadoreña y el grupo n°2 de Practicas Profecionales se desarrollo el presente sistema de inventario y facturación con el objetivo de automatizar los procesos administrativos de la antes mencionada empresa.</p>
               </center>
          </div>

      </div>
      
  </div>
  <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
  </div>
</div>

<!-- Compiled and minified JavaScript -->
<script src="vistas/js/jquery-2.1.1.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 --><script src="vistas/js/materialize.js"></script>
<script src="vistas/js/init.js"></script>



<!--Validacion-->

 <!--  <script type="text/javascript">
    $(document).ready(function() {
	//variables
	var pass1 = $('[name=clave1]');
	var pass2 = $('[name=clave2]');
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	  var valor1 = pass1.val();
	  var valor2 = pass2.val();
	  //muestro el span
	  span.show().removeClass();
	  //condiciones dentro de la función
	  if(valor1 != valor2){
	    span.text(negacion).addClass('negacion');	
	  }
	  if(valor1.length==0 || valor1==""){
	    span.text(vacio).addClass('negacion');	
	  }
	  if(valor1.length<6 || valor1.length>10){
	    span.text(longitud).addClass('negacion');
	  }
	  if(valor1.length!=0 && valor1==valor2){
	    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
	  }
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	});
});
</script> -->

</body>

</html>
