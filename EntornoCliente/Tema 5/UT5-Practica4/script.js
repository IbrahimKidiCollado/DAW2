document.getElementById("enviar").addEventListener("click", validarFormulario);

function validarFormulario(e) {
	const campos = document.querySelectorAll("#formualrio [data-validation]");
	let formValido = true;

	campos.forEach(campo => {
		if (!campo.checkValidity()) {
			formValido = false;

			mostrarMensajeError(campo);
		} else {
			limpiarMensajeError(campo);
		}
	});

	if (!formValido) {
		e.preventDefault();
	}

	return formValido;
}

function mostrarMensajeError(input) {
	const val = input.validity;
	let message = "";

	if (val.valueMissing) {
		message = "Debe introducir un valor...";
	} else if (val.patternMismatch) {
		if (input.type === "password") message = "Debe introducir 8 caracteres y un numero...";
		else message = "Debe introducir un formato valido...";
	} else if (val.typeMismatch) 
}