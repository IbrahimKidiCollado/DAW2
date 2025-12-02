class Alumno {
    constructor(id, nombreCompleto) {
        this.id = id;
        this.nombreCompleto = nombreCompleto;
    }
}

class Candidato extends Alumno {
    constructor(alumno) {
        super(alumno.id, alumno.nombreCompleto);
        this.votos = 0;
    }
}

let arrayDeAlumnos = [];
const buttonContainer = document.getElementById("buttons-container");
let candidatos = [];
let contador = 0;

function BotonesCandidatos() {
    let tamañoArray = arrayDeAlumnos.length;

    for (let i = 0; i < tamañoArray; i++) {
        const alumno = arrayDeAlumnos[i];
        const boton = document.createElement("button");
        boton.setAttribute("data-id", alumno.id);
        boton.textContent = alumno.nombreCompleto;
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
            let idCounter = 1;

            arrayDeAlumnos = lineas
                .map(linea => linea.trim())
                .filter(linea => linea.length > 0)
                .map(nombre => new Alumno(`id-${idCounter++}`, nombre));

            console.log("Archivo cargado correctamente");
            console.log("Contenido de Array de Alumnos:", arrayDeAlumnos);

            BotonesCandidatos();
        })
        .catch (error => {
            console.error("Fallo durante la operacion de fetch o procesamiento:", error);
            
            const mensajeError = document.createElement("p");
            mensajeError.textContent = "Error: No se pudo cargar el archivo alumnos.txt.";
            mensajeError.style.color = "red";
            buttonContainer.appendChild(mensajeError);
        });
}

cargarArray("alumnos.txt")

function seleccionCandidato(event) {
    const elemento = event.currentTarget;
    const alumnoId = elemento.getAttribute("data-id");
    
    const yaSeleccionado = candidatos.some(c => c.id === alumnoId);

    if (!yaSeleccionado) {
        const alumnoBase = arrayDeAlumnos.find(a => a.id === alumnoId);
        if (alumnoBase) {
            const nuevoCandidato = new Candidato(alumnoBase);
            candidatos.push(nuevoCandidato);
            elemento.classList.add("seleccionado");
            console.log(`Candidato seleccionado: ${nuevoCandidato.nombreCompleto}`);
        }
    }
}

function enviarDelegados() {
    if (candidatos.length === 0) {
        const mensaje = document.getElementById("parrafo") || document.createElement("p");
        mensaje.setAttribute("id", "parrafo");
        mensaje.textContent = "Selecciona al menos un candidato antes de enviar.";
        document.getElementById("elegirCandidatos").insertAdjacentElement("afterend", mensaje);
        return;
    }
    
    buttonContainer.innerHTML = '';

    document.getElementById("enviarDelegados").style.display = "none";
    document.getElementById("elegirCandidatos").textContent = "Vota a un delegado";
    
    mostrarCandidatos();

    const padre = document.getElementById("elegirCandidatos");
    let p = document.getElementById("parrafo");
    
    if (!p) {
        p = document.createElement("p");
        p.setAttribute("id", "parrafo");
        padre.insertAdjacentElement("afterend", p);
    }
    
    p.textContent = arrayDeAlumnos[contador].nombreCompleto + " es tu turno para votar";
}

function mostrarCandidatos() {
    candidatos.forEach((candidato, index) => {
        const boton = document.createElement("button");
        boton.setAttribute("data-id", candidato.id); 
        boton.textContent = candidato.nombreCompleto;
        buttonContainer.appendChild(boton);
        boton.addEventListener("click", votar);
    });
}

function votar(event) {
    if (contador >= arrayDeAlumnos.length) {
        mostrarResultados();
        return;
    }

    const elemento = event.currentTarget;
    const candidatoId = elemento.getAttribute("data-id");
    
    const candidatoVotado = candidatos.find(c => c.id === candidatoId);

    if (candidatoVotado) {
        candidatoVotado.votos++;
        contador++;
    } else {
        console.error("Error: Candidato no encontrado para votar.");
        return;
    }

    if (contador >= arrayDeAlumnos.length) {
        mostrarResultados();
        return;
    }
    
    const parrafo = document.getElementById("parrafo");
    parrafo.textContent = arrayDeAlumnos[contador].nombreCompleto + " es tu turno para votar";
}

function mostrarResultados() {
    document.getElementById("buttons-container").style.display = "none";
    document.getElementById("elegirCandidatos").textContent = "Resultados";

    const parrafoElemento = document.getElementById("parrafo");
    let contenidoResultado = "Votación finalizada. Resultados:<br><br>";
    
    const resultadosOrdenados = candidatos.sort((a, b) => b.votos - a.votos);

    resultadosOrdenados.forEach(candidato => {
        contenidoResultado += `${candidato.nombreCompleto}: ${candidato.votos} votos<br>`; 
    });

    parrafoElemento.innerHTML = contenidoResultado;
}