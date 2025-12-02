document.getElementById("selectFrutas").addEventListener("change", verDatos);
document.getElementById("inputFrutas").addEventListener("change", verDatos);
const p = document.getElementById("texto");
const div = document.getElementById("ultimoContainer");
const input = document.getElementById("inputFrutas");

function verDatos(e) {
	p.textContent = e.target.value;
	p.textContent = e.target.value;

	comprobarContainer();
}

function comprobarContainer() {
	if (p.textContent === "") {
		div.style.display = "none";
	} else {
		div.style.display = "block";
	}
}