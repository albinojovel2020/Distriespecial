<!-- inicio del pie -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">

      <div class="row">
          <div class="col s12 m12 l6">
            <center>
                 <i class="material-icons large grey-text text-darken-1">location_city</i>
            </center>

            <h5 class="grey-text text-darken-1"><b>Distribuidora Especial</b></h5>
              <p class="grey-text text-darken-3" style="text-align: justify;">Para hornear y más, somos una empresa dedicada a la venta de productos de pasteleria ofreciendo una variedad de productos de alta calidad, que en convenio con la Universidad Luterana Salvadoreña y el grupo n°2 de Practicas Profecionales se desarrollo el presente sistema de inventario y facturación con el objetivo de automatizar los procesos administrativos de la antes mencionada empresa.</p>

          </div>
          <div class="col s12 m12 l6">
             <center>
                 <i class="material-icons large grey-text text-darken-1">assignment_ind</i>
             </center>

             <h5 class="grey-text text-darken-1"><b style="font-weight: bold; color: #000; text-decoration:underline;">Desarrollado por:</b></h5>
              <p style="font-weight: bold; color: #000;" class=""> * Jacqueline Ivette Hernández Vásquez<br> * Brayan Eleazar Rosales Alfaro<br> * Andrés Josué Hernández Pineda<br> * Luis Alberto Carranza Muñoz<br> * Norberto Alexander Fuentes Velado<br> * Rafael Albino Jovel Alfaro</p>


          </div>

      </div>

  </div>
  <div class="container">
      <div class="row">
      <center>
      <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Desarrollo de Sistema Web de Inventario y Facturación</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">J. Hernández & B. Rosales & A. Hernández & L. Carranza & N. Fuentes & R. Jovel </span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Reconocimiento-NoComercial-CompartirIgual 4.0 Internacional License</a>.
      </center>
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
 <script src="vistas/js/validacion_text_num.js"></script>
<script src="vistas/js/dui_nit_tel.js"></script>
<script src="vistas/js/previa.js"></script>
<script src="vistas/js/init.js"></script>




<!--Validacion-->
 <script type="text/javascript">
    //Mensaje de comprobar password y respuesta secreta
$(document).ready(function() {
  //variables
  var nombre = $('[name=nombres]');
  var pass1 = $('[name=clave1]');
  var pass2 = $('[name=clave2]');
  var pas1 = $('[name=n_pass1]');
  var pas2 = $('[name=n_pass2]');
  var res1 = $('[name=respuestasecreta1]');
  var res2 = $('[name=respuestasecreta2]');
  var confirmacion = "Las contraseñas si coinciden";
  var confirmacion2 = "La respuesta secreta si coinciden";
  var confirmacion1 = "";
  var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
  var longitud2 = "La respuesta secreta debe estar formada entre 6-10 carácteres (ambos inclusive)";
  var negacion = "No coinciden las contraseñas";
  var negacion2 = "No coinciden las respuesta secreta";
  var vacio = "La contraseña no puede estar vacía";
  var vacio1 = "";
  var vacio2 = "La respuesa secreta no puede estar vacía";
  //oculto por defecto el elemento span
  var span = $('<span ></span>').insertAfter(pass2);
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
    if(valor1.length<6 || valor1.length>12){
      span.text(longitud).addClass('negacion');
    }
    if(valor2.length<6 || valor2.length>12){
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
  var span2 = $('<span></span>').insertAfter(res2);
  span.hide();
  //función que comprueba las dos contraseñas
  function coincideRes(){
    var respu1 = res1.val();
    var respu2 = res2.val();
    //muestro el span
    span2.show().removeClass();
    //condiciones dentro de la función
    if(respu1 != respu2){
      span2.text(negacion2).addClass('negacion');
    }
    if(respu1.length==0 || respu1==""){
      span2.text(vacio2).addClass('negacion');
    }
    if(respu1.length<4 || respu1.length>10){
      span2.text(longitud2).addClass('negacion');
    }
    if(respu1.length!=0 && respu1==respu2){
      span2.text(confirmacion2).removeClass("negacion").addClass('confirmacion');
    }
  }
  //ejecuto la función al soltar la tecla
  res2.keyup(function(){
  coincideRes();
  });

  var span3 = $('<span></span>').insertAfter(pas2);
  span.hide();
  //función que comprueba las dos contraseñas
  function coincideRess(){
    var respuu1 = pas1.val();
    var respuu2 = pas2.val();
    //muestro el span
    span3.show().removeClass();
    //condiciones dentro de la función
    if(respuu1 != respuu2){
      span3.text(negacion).addClass('negacion');
    }
    if(respuu1.length==0 || respuu1==""){
      span3.text(vacio).addClass('negacion');
    }
    if(respuu1.length<4 || respuu1.length>10){
      span3.text(longitud).addClass('negacion');
    }
    if(respuu1.length!=0 && respuu1==respuu2){
      span3.text(confirmacion).removeClass("negacion").addClass('confirmacion');
    }
  }
  //ejecuto la función al soltar la tecla
  pas2.keyup(function(){
  coincideRess();
  });
  /*//oculto por defecto el elemento span
  var span1 = $('<span></span>').insertAfter(nombre);
  span.hide();
  function nombresCorrecto(){
    var nombre1 = nombre.val();
    //muestro el span
    span1.show().removeClass();

    if(nombre1.length==0 || nombre1==""){
        span1.text(vacio1).addClass('negacion');
      }
    if(nombre1.length!=0){
        span1.text(confirmacion1).removeClass("negacion").addClass('confirmacion');
      }
  }
  //ejecuto la función al soltar la tecla
  nombre.keyup(function(){
  nombresCorrecto();
  });*/
});
</script>



</body>

</html>
