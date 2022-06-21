function validarForm() {
	var x = document.forms["formRegistro"]["usuario"].value;
	if (x == "" || x == null) {
	alert("Debe ingresar un nombre de usuario.");
	return false;
  }
	var y = document.forms["formRegistro"]["contraseña_1"].value;
	if (y == "" || y == null) {
	alert("Debe ingresar una contraseña.");
	return false;
  }
	var z = document.forms["formRegistro"]["contraseña_2"].value;
	if (z == "" || z == null) {
	alert("Debe confirmar su contraseña.");
	return false;
  }
	if (y != z) {
	alert("Las contraseñas no coinciden.");
	return false;
  }
}