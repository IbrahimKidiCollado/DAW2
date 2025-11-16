// =====================================================
// PROPIEDADES Y MÉTODOS DEL OBJETO NUMBER (JavaScript)
// =====================================================

// ----- PROPIEDADES ESTÁTICAS DEL OBJETO Number -----

// constructor: devuelve la función que creó el objeto Number.
let n = new Number(5);
console.log(n.constructor); // function Number() { ... }

// MAX_VALUE: número más alto representable en JavaScript.
console.log(Number.MAX_VALUE);

// MIN_VALUE: número más pequeño representable.
console.log(Number.MIN_VALUE);

// NEGATIVE_INFINITY: infinito negativo (por overflow).
console.log(Number.NEGATIVE_INFINITY);

// POSITIVE_INFINITY: infinito positivo (por overflow).
console.log(Number.POSITIVE_INFINITY);

// prototype: permite añadir métodos o propiedades a Number.
Number.prototype.saludo = function () {
    return "Hola desde Number";
};
console.log((10).saludo()); // "Hola desde Number"


// ----- MÉTODOS DEL OBJETO Number -----

let num = 123.456;

// toExponential(x):
// Convierte un número a notación exponencial con x decimales.
console.log(num.toExponential(2)); // "1.23e+2"

// toFixed(x):
// Devuelve un número formateado con x decimales.
console.log(num.toFixed(1)); // "123.5"

// toPrecision(x):
// Formatea el número para que tenga una longitud total x.
console.log(num.toPrecision(4)); // "123.5"

// toString(base):
// Convierte el número en cadena. Si se indica base:
// base 2 = binario, base 8 = octal, base 16 = hexadecimal.
console.log((15).toString(2));  // "1111" (binario)
console.log((15).toString(8));  // "17"   (octal)
console.log((15).toString(16)); // "f"    (hexadecimal)

// valueOf():
// Devuelve el valor primitivo del número.
let x = new Number(42);
console.log(x.valueOf()); // 42
