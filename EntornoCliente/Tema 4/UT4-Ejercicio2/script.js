let arrayDeNombresCompletos = [];
const buttonContainer = document.getElementById("buttons-container");
let elegidos = {};
let contador = 0;

function BotonesCandidatos() {
	let tamañoArray = arrayDeNombresCompletos.length;

	for (let i = 0; i < tamañoArray; i++) {
		const boton = document.createElement("button");
		boton.setAttribute("id", i + 1);
		boton.textContent = arrayDeNombresCompletos[i];
		buttonContainer.appendChild(boton);
		boton.addEventListener("click", seleccionCandidato);
	}
}

function cargarArray(fichero) {
	const urlArchivo = fichero;
	
	fetch(urlArchivo)
		
		.then (response => {
			if (!response.ok) {
				throw new Error("Eror al cargar el archivo. Codigo: " + response.status);
			}

			return response.text();
		})
		.then (contenido => {
			const lineas = contenido.split('\n');
			arrayDeNombresCompletos = lineas
			.map(linea => linea.trim())
			.filter(linea => linea.length > 0);

			console.log("Archivo cargado correctamente");
			console.log("Contenido de Array:", arrayDeNombresCompletos);

			BotonesCandidatos();
		})
		.catch (error => {
			console.error("Fallo durante la operacion de fetch o procesamiento:", error);
		});
}

cargarArray("alumnos.txt")

let candidatos = [];

function seleccionCandidato(event) {
	const elemento = event.currentTarget;
	candidatos.push(elemento.textContent);
	elemento.setAttribute("class", "seleccionado");
}

function enviarDelegados() {
	const elementoPadre = document.getElementById("buttons-container");
	for(let i = 1; i <= arrayDeNombresCompletos.length; i++) {
		elementoPadre.removeChild(document.getElementById(i));
	}

	document.getElementById("enviarDelegados").style.display = "none";
	document.getElementById("elegirCandidatos").textContent = "Vota a un delegado";
	mostrarCandidatos();

	const padre = document.getElementById("elegirCandidatos");
	const p = document.createElement("p");
	p.setAttribute("id", "parrafo");
	p.textContent = arrayDeNombresCompletos[contador] + " es tu turno para votar";;
	padre.insertAdjacentElement("afterend", p);

}

function mostrarCandidatos() {
	for(let i = 0; i < candidatos.length; i++) {
		const boton = document.createElement("button");
		boton.setAttribute("id", i + 1);
		boton.textContent = candidatos[i];
		elegidos[boton.textContent] = 0;
		buttonContainer.appendChild(boton);
		boton.addEventListener("click", votar);
	}
}

function votar(event) {
	if (contador >= arrayDeNombresCompletos.length) {
        mostrarResultados();
        return;
    }

	const parrafo = document.getElementById("parrafo");
	parrafo.textContent = arrayDeNombresCompletos[contador] + " es tu turno para votar";
	const elemento = event.currentTarget;
	elegidos[elemento.textContent]++;
	contador++;
}

function mostrarResultados() {
	document.getElementById("buttons-container").style.display = "none";
	document.getElementById("elegirCandidatos").textContent = "Resultados";

    const parrafoElemento = document.getElementById("parrafo");
    let contenidoResultado = "Votación finalizada. Resultados:<br><br>";
    
for (const [clave, valor] of Object.entries(elegidos)) {
    contenidoResultado += `${clave}: ${valor} votos<br>`; 
}

	parrafoElemento.innerHTML = contenidoResultado;
}