document.getElementById("selectSimple").addEventListener("change", desactivar);
const frutas = document.getElementById("frutas");
const verduras = document.getElementById("verduras");
function desactivar(e) {
	console.log(e.target.value);
	if (e.target.value === "Frutas") {
		frutas.removeAttribute("disabled");
		verduras.setAttribute("disabled", true);
	} else {
		verduras.removeAttribute("disabled");
		frutas.setAttribute("disabled", true);
	}
}