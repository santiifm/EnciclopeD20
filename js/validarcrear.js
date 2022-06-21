var extension = {};
listaExtension.imagen = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG', 'jpg_large', 'bmp'];
listaExtension.pdf = ['pdf'];

  
function isValidFileType(fName, fType) {
    return extensionLists[fType].indexOf(fName.split('.').pop()) > -1;
}
function validarForm() {
	var x = document.forms["formCrear"]["nombre"].value;
	if (x == "" || x == null) {
	alert("Debe ingresar un nombre de personaje.");
	return false;
    }
	var y = document.forms["formCrear"]["img"].value;
	if (y == "" || x == null) {
	alert("Debe ingresar un PDF.");
	return false;
	}
	var z = document.forms["formRegistro"]["pdf"].value;
	if (z == "" || z == null) {
	alert("Debe ingresar un retrato.");
	return false;
	}
}