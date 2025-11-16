// ========================================
// PROPIEDADES Y METODOS DEL OBJETO STRING
// ========================================

// ----- Propiedad -----
// length: devuelve la longitud de una cadena.
let texto = "Hola Mundo";
console.log(texto.length);  // 10


// ----- Métodos -----

//devuelve el carácter en la posición indicada.
console.log(texto.charAt(1)); // "o"

// devuelve el Unicode del carácter en la posición indicada.
console.log(texto.charCodeAt(0)); // 72

//une dos o más cadenas y devuelve una nueva.
console.log("Hola".concat(" ", "Mundo")); // "Hola Mundo"

//convierte códigos Unicode en caracteres.
console.log(String.fromCharCode(65)); // "A"

//devuelve la posición de la primera aparición de una subcadena.
console.log(texto.indexOf("Mundo")); // 5

//devuelve la posición de la última aparición de una subcadena.
console.log("banana".lastIndexOf("na")); // 4

//busca coincidencias con una expresión regular.
console.log("abc123".match(/\d+/)); // ["123"]

//sustituye una subcadena por otra.
console.log("Hola Mundo".replace("Mundo", "JS")); // "Hola JS"

//busca con una expresión regular y devuelve la posición.
console.log("abc123".search(/\d/)); // 3

//extrae una parte de la cadena sin modificarla.
console.log("abcdef".slice(1, 4)); // "bcd"

// divide la cadena en un array usando un separador.
console.log("1-2-3".split("-")); // ["1", "2", "3"]

//extrae caracteres desde una posición con una longitud dada.
console.log("abcdef".substr(2, 3)); // "cde"

//extrae caracteres entre dos posiciones.
console.log("abcdef".substring(1, 4)); // "bcd"

//convierte la cadena a minúsculas.
console.log("Hola".toLowerCase()); // "hola"

//convierte la cadena a mayúsculas.
console.log("Hola".toUpperCase()); // "HOLA"
