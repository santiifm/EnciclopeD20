function validarForm() {
	var x = document.forms["formLogin"]["usuario"].value;
	if (x == "" || x == null) {
	alert("Debe ingresar un nombre de usuario.");
	return false;
  }
	var y = document.forms["formLogin"]["contraseña"].value;
	if (y == "" || y == null) {
	alert("Debe ingresar una contraseña.");
	return false;
  }
}