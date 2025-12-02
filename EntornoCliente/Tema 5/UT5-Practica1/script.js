document.getElementById("formulario").addEventListener("change", extraerDatos);
document.getElementById("restart").addEventListener("click", limpiar);
let p = document.getElementById("datos");

const container = document.getElementsByClassName("container");

if (p.textContent === "") container[1].style.display = "none";

function extraerDatos(e) {
	let el = e.target;
	let nom = el.id;

	p.innerHTML += `${nom}: ${el.value}</br>`;

	if (p.textContent !== "") container[1].style.display = "block";
}

function limpiar() {
	p.innerHTML = "";
	container[1].style.display = "none";
}