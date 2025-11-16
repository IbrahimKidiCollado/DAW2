/****************************************************
 * OBJETO BOOLEAN EN JAVASCRIPT
 * ----------------------------------------------
 * Permite trabajar con valores booleanos (true/false)
 * y convertir otros tipos de datos a booleanos.
 ****************************************************/

// Ejemplo 1: Sin pasar parámetro → false
var b1 = new Boolean();
document.write("b1 = " + b1 + "<br>");   // false

// Ejemplo 2: Cadena vacía → false
var b2 = new Boolean("");
document.write("b2 = " + b2 + "<br>");   // false

// Ejemplo 3: Valor false explícito → false
var b25 = new Boolean(false);
document.write("b25 = " + b25 + "<br>"); // false

// Ejemplo 4: Número 0 → false
var b3 = new Boolean(0);
document.write("b3 = " + b3 + "<br>");   // false

// Ejemplo 5: Cadena "0" → true (toda cadena NO vacía es true)
var b35 = new Boolean("0");
document.write("b35 = " + b35 + "<br>"); // true

// Ejemplo 6: Número distinto de 0 → true
var b4 = new Boolean(3);
document.write("b4 = " + b4 + "<br>");   // true

// Ejemplo 7: Cadena no vacía → true
var b5 = new Boolean("Hola");
document.write("b5 = " + b5 + "<br>");   // true


/****************************************************
 * PROPIEDADES DEL OBJETO BOOLEAN
 ****************************************************/

// .constructor → indica la función que creó el objeto
document.write("<br>Constructor de b5: " + b5.constructor + "<br>");

// .prototype → permite añadir métodos y propiedades
// (ejemplo simple: añadimos un método propio)
Boolean.prototype.esVerdadero = function() {
    return this.valueOf() === true;
};

document.write("¿b35 es verdadero?: " + b35.esVerdadero() + "<br>");

/****************************************************
 * MÉTODOS DEL OBJETO BOOLEAN
 ****************************************************/

// .toString() → convierte el valor booleano a texto
document.write("b4.toString(): " + b4.toString() + "<br>"); // "true"

// .valueOf() → devuelve el valor primitivo (true / false)
document.write("b4.valueOf(): " + b4.valueOf() + "<br>");   // true
