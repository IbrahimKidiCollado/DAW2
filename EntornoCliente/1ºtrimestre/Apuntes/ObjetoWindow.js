/*******************************************************
 *               OBJETO WINDOW en JavaScript
 *   Propiedades y Métodos más usados del navegador
 *******************************************************/


/**********************
 * PROPIEDADES WINDOW
 **********************/

// closed → Indica si la ventana ha sido cerrada
console.log(window.closed);  // false (la ventana sigue abierta)

// defaultStatus → Texto por defecto de la barra de estado (ya obsoleto)
window.defaultStatus = "Estado por defecto";

// document → Devuelve el objeto document de la ventana
console.log(window.document); // HTML del documento actual

// frames → Array con todos los iframes de la ventana
console.log(window.frames);  // colección de frames

// history → Objeto que permite navegar hacia atrás/adelante
console.log(window.history);

// length → Número de frames dentro de la ventana
console.log(window.length);

// location → URL de la ventana actual
console.log(window.location.href);  // muestra la URL

// name → Nombre asignado a la ventana
window.name = "MiVentana";
console.log(window.name);

// navigator → Información del navegador
console.log(window.navigator);

// opener → Ventana que abrió esta ventana (si existe)
console.log(window.opener); // null si no fue abierta desde otra ventana

// parent → Ventana padre (especialmente en frames)
console.log(window.parent);

// self → Devuelve la misma ventana actual (igual que window)
console.log(window.self);

// status → Texto de la barra de estado (obsoleto en la mayoría de navegadores)
window.status = "Cargando...";


/**********************
 * MÉTODOS WINDOW
 **********************/

// alert(): muestra un mensaje emergente
alert("Mensaje de alerta");

// blur(): quita el foco de la ventana actual
window.blur();

// clearInterval(): detiene un intervalo creado con setInterval()
let id = setInterval(() => console.log("Ejecutando..."), 1000);
clearInterval(id); // detiene el intervalo

// setInterval(): ejecuta una función cada cierto intervalo
setInterval(() => {
    console.log("Esto se ejecuta cada segundo");
}, 1000);

// close(): cierra la ventana actual (solo funciona si la abrió tu script)
window.close();

// confirm(): muestra un cuadro de confirmación con Aceptar/Cancelar
let respuesta = confirm("¿Segur@ que deseas continuar?");
console.log(respuesta);

// focus(): da foco a la ventana actual
window.focus();

// open(): abre una nueva ventana o pestaña
let nuevaVentana = window.open("https://www.example.com", "MiNuevaVentana");

// prompt(): pide datos al usuario mediante un cuadro de entrada
let nombre = prompt("Introduce tu nombre:");
console.log("Hola, " + nombre);

