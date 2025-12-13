const formulario = document.getElementById("formulario");
const div = document.getElementById("div");
const hijoDiv = document.getElementById("url");

formulario.addEventListener("click", useCapture, true);
div.addEventListener("click", useCapture, false);
hijoDiv.addEventListener("click", useCapture, true);

function useCapture(e) {
	let el = e.target;
	let name = "Nombre: " + el.id;
	let current = "Current Target: " + e.currentTarget.id;
	let value = "Fase del evento: " + e.eventPhase;

	console.log(name);
	console.log(current);
	console.log(value);
}