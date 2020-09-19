/*
// Hay muchas formas de elegir un nodo DOM; aquí obtenemos el formulario y, a continuación, el campo de entrada
// del correo electrónico, así como el elemento span en el que colocaremos el mensaje de error.
const form  = document.getElementsByTagName('form')[0];

const text = document.getElementById('usuario');
const textError = document.querySelector('#usuario + span.error');

text.addEventListener('input', function (event) {
  // Cada vez que el usuario escribe algo, verificamos si
  // los campos del formulario son válidos.

  if (text.validity.valid) {
    // En caso de que haya un mensaje de error visible, si el campo
    // es válido, eliminamos el mensaje de error.
    textError.innerHTML = ''; // Restablece el contenido del mensaje
    textError.className = 'error'; // Restablece el estado visual del mensaje
  } else {
    // Si todavía hay un error, muestra el error exacto
    showError();
  }
});

form.addEventListener('submit', function (event) {
  // si el campo de correo electrónico es válido, dejamos que el formulario se envíe

  if(!text.validity.valid) {
    // Si no es así, mostramos un mensaje de error apropiado
    showError();
    // Luego evitamos que se envíe el formulario cancelando el evento
    event.preventDefault();
  }
});

function showError() {
  if(text.validity.valueMissing) {
    // Si el campo está vacío
    // muestra el mensaje de error siguiente.
    textError.textContent = 'Debe introducir una dirección de correo electrónico.';
  } else if(text.validity.typeMismatch) {
    // Si el campo no contiene una dirección de correo electrónico
    // muestra el mensaje de error siguiente.
    textError.textContent = 'El valor introducido debe ser una dirección de correo electrónico.';
  } else if(text.validity.tooShort) {
    // Si los datos son demasiado cortos
    // muestra el mensaje de error siguiente.
    textError.textContent = 'El correo electrónico debe tener al menos ${ email.minLength } caracteres; ha introducido ${ email.value.length }.';
  }

  // Establece el estilo apropiado
  textError.className = 'error activo';
}

*/

function validarPasswd(){
    var p1 = document.getElementById("clave1").value;
    var p2 = document.getElementById("clave2").value;

    var espacios = false;
var cont = 0;

while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}
   
if (espacios) {
  alert ("La contraseña no puede contener espacios en blanco");
  return false;
}

if (p1.length == 0 || p2.length == 0) {
    alert("Los campos de la password no pueden quedar vacios");
    return false;
  }

  if (p1 != p2) {
    alert("Las passwords deben de coincidir");
    return false;
  } else {
    alert("Todo esta correcto");
    return true; 
  }
}