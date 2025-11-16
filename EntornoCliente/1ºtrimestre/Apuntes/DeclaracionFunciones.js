/*******************************************************
 *   DECLARACIÓN DE FUNCIONES EN JAVASCRIPT
 *******************************************************/

/*
 Las funciones en JavaScript se definen con la palabra clave `function`.
 Permiten agrupar código para reutilizarlo y ejecutar operaciones.
*/

/**********************
 * 1. DECLARACIÓN NORMAL
 **********************/
function nombreFuncion(parametro1, parametro2, parametroN) {
    // Código de la función...
    console.log("Ejecutando función declarada");
}
// Llamada
nombreFuncion(1, 2);


/**************************************
 * 2. DECLARACIÓN DE FUNCIÓN POR ASIGNACIÓN
 **************************************/
var variable = function nombreFuncion(parametro1, parametro2) {
    // Código de la función...
    console.log("Ejecutando función asignada a variable");
};
// Llamada
variable(10, 20);


/**************************************
 * 3. FUNCIÓN FLECHA (ARROW FUNCTION)
 **************************************/
/*
   Versión corta ⇒ ideal para funciones simples
   let func = (arg1, arg2) => expresión;
*/
let suma = (a, b) => a + b;
console.log(suma(5, 7)); // 12


/*
   Versión larga ⇒ se parece más a una función clásica
*/
let resta = function(a, b) {
    return a - b;
};
console.log(resta(10, 4)); // 6



// Probando funciones
console.log(saludar("Mario"));
console.log(despedir("Lucía"));
console.log(agradecer("Carlos"));

