// =====================================================
// EXPRESIONES REGULARES (RegExp) - METACARACTERES
// =====================================================

// \  Carácter de escape. Permite usar caracteres especiales literalmente.
// Ejemplo: buscar un punto real:
let regex1 = /\./;   // coincide con "."
console.log("Hola.".match(regex1)); // ["." ]

// ^  Inicio de cadena.
// Ejemplo: cadenas que empiezan por "G":
let regex2 = /^G/;
console.log("Gato".match(regex2)); // ["G"]

// $  Fin de cadena.
// Ejemplo: cadenas que terminan en "a":
let regex3 = /a$/;
console.log("casa".match(regex3)); // ["a"]

// .  Cualquier carácter (solo uno).
let regex4 = /c.s/;  // c + cualquier caracter + s
console.log("caso".match(regex4)); // ["cas"]

// []  Conjunto de caracteres permitidos.
// Ejemplo: cualquiera de A, B o C:
let regex5 = /[ABC]/;
console.log("Bola".match(regex5)); // ["B"]

// También rangos:
let regex6 = /[a-z]/; // cualquier letra minúscula
console.log("Hola".match(regex6)); // ["o"]

// [^ ]  Conjunto negado: cualquier carácter excepto los que aparecen.
let regex7 = /[^0-9]/; // cualquier NO dígito
console.log("123a".match(regex7)); // ["a"]

// |  Operador OR (o).
let regex8 = /gato|perro/;
console.log("Tengo un perro".match(regex8)); // ["perro"]

// ()  Agrupación.
// Ejemplo: repetir un grupo o capturarlo.
let regex9 = /(ab)+/;
console.log("abab".match(regex9)); // ["abab"]

// *  Cero o más repeticiones.
let regex10 = /a*/;
console.log("aaaab".match(regex10)); // ["aaaa"]

// +  Una o más repeticiones.
let regex11 = /a+/;
console.log("baaa".match(regex11)); // ["aaa"]

// ?  Cero o una vez (opcional).
let regex12 = /colou?r/; // "u" es opcional
console.log("color".match(regex12));  // ["color"]
console.log("colour".match(regex12)); // ["colour"]
