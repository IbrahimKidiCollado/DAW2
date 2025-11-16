/*******************************************************
 *     FUNCIONES Y PROPIEDADES GLOBALES EN JAVASCRIPT
 *******************************************************/

/**********************
 * PROPIEDADES GLOBALES
 **********************/

// Infinity → Representa el infinito positivo o negativo
console.log(Infinity);       // Infinity
console.log(-Infinity);      // -Infinity

// NaN → Valor que indica "Not a Number"
console.log(NaN);            // NaN
console.log(0 / "hola");     // NaN

// undefined → Una variable existe pero no tiene valor asignado
let x;
console.log(x);              // undefined


/************************
 * FUNCIONES GLOBALES
 ************************/

/***** TRABAJO CON URLs *****/

// decodeURI(): decodifica caracteres especiales de una URL (excepto: , / ? : @ & = + $ #)
console.log(decodeURI("https://ejemplo.com/hola%20mundo")); // "https://ejemplo.com/hola mundo"

// decodeURIComponent(): decodifica TODOS los caracteres especiales
console.log(decodeURIComponent("%40%23%24")); // "@#$"

// encodeURI(): codifica caracteres especiales de una URL (excepto: , / ? : @ & = + $ #)
console.log(encodeURI("hola mundo")); // "hola%20mundo"

// encodeURIComponent(): codifica TODOS los caracteres especiales
console.log(encodeURIComponent("@hola?")); // "%40hola%3F"


/***** FUNCIONES DE CADENAS Y CARACTERES *****/

// escape(): codifica algunos caracteres especiales (obsoleta, no usar en proyectos modernos)
console.log(escape("hola@adiós")); // "hola%40adi%F3s"

// unescape(): decodifica cadenas generadas con escape() (también obsoleta)
console.log(unescape("hola%40adi%F3s")); // "hola@adiós"


/***** EVALUACIÓN DE CÓDIGO *****/

// eval(): ejecuta código escrito como cadena (⚠️ PELIGROSO, evitar su uso)
eval("console.log('Eval ejecutado')"); // Eval ejecutado


/***** COMPROBACIÓN DE VALORES NUMÉRICOS *****/

// isFinite(): determina si un valor es finito
console.log(isFinite(10));       // true
console.log(isFinite(Infinity)); // false

// isNaN(): determina si algo "no es un número"
console.log(isNaN("hola"));      // true
console.log(isNaN(123));         // false


/***** CONVERSIÓN DE TIPOS NUMÉRICOS *****/

// Number(): convierte cualquier cosa a número
console.log(Number("123"));      // 123
console.log(Number("hola"));     // NaN

// parseFloat(): convierte un texto a número REAL
console.log(parseFloat("3.14")); // 3.14
console.log(parseFloat("10px")); // 10

// parseInt(): convierte un texto a número ENTERO
console.log(parseInt("20px"));   // 20
console.log(parseInt("3.99"));   // 3


/*******************************************************
 * EJEMPLO GENERAL
 *******************************************************/
let url = "https://sitio.com/hola mundo";

// Codificar una URL
let codificada = encodeURI(url);
console.log(codificada);

// Decodificarla
let decodificada = decodeURI(codificada);
console.log(decodificada);

