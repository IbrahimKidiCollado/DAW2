/*******************************************************
 *                    OBJETO SCREEN
 *      Información sobre la pantalla del usuario
 *******************************************************/

/*
El objeto screen proporciona datos sobre:
✔ La resolución total del monitor
✔ El área disponible para la ventana del navegador
✔ La profundidad de color del dispositivo


Muy útil para adaptar diseños y detectar tamaños de pantalla.
*/

console.log("Resolución total:", screen.width, "x", screen.height);
console.log("Área disponible:", screen.availWidth, "x", screen.availHeight);
console.log("Profundidad de color:", screen.colorDepth, "bits");


/**********************
 * PROPIEDADES SCREEN
 **********************/

// availHeight → Altura disponible para usar (excluye barra de tareas)
console.log("Altura disponible:", screen.availHeight);

// availWidth → Anchura disponible para usar (excluye barra de tareas)
console.log("Anchura disponible:", screen.availWidth);

// colorDepth → Profundidad de color en bits (normalmente 24 o 32)
console.log("Profundidad de color:", screen.colorDepth);

// height → Altura total del monitor en píxeles
console.log("Altura total:", screen.height);

// width → Anchura total del monitor en píxeles
console.log("Anchura total:", screen.width);


/**********************
 * EJEMPLO DE USO:
 * Redimensionar la ventana según tamaño de pantalla
 **********************/

// Redimensiona la ventana a la mitad del tamaño de la pantalla
let nuevaAltura = screen.availHeight / 2;
let nuevaAnchura = screen.availWidth / 2;

window.resizeTo(nuevaAnchura, nuevaAltura);  // ⚠ Solo funciona en ventanas abiertas por JS
