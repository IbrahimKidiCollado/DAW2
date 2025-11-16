// =====================================================
// PROPIEDADES Y MÉTODOS DEL OBJETO MATH (JavaScript)
// =====================================================

// NOTA: Math no se instancia. Se usa directamente: Math.propiedad, Math.metodo()

// ----- PROPIEDADES DEL OBJETO Math -----

console.log(Math.E);       // Número Euler ≈ 2.718
console.log(Math.LN2);     // Logaritmo neperiano de 2 ≈ 0.693
console.log(Math.LN10);    // Logaritmo neperiano de 10 ≈ 2.302
console.log(Math.LOG2E);   // Logaritmo base 2 de E ≈ 1.442
console.log(Math.LOG10E);  // Logaritmo base 10 de E ≈ 0.434
console.log(Math.PI);      // Número PI ≈ 3.14159
console.log(Math.SQRT2);   // Raíz cuadrada de 2 ≈ 1.414


// ----- MÉTODOS DEL OBJETO Math -----

// abs(x): valor absoluto
console.log(Math.abs(-5)); // 5

// acos(x): arccoseno en radianes
console.log(Math.acos(1)); // 0

// asin(x): arcseno en radianes
console.log(Math.asin(0)); // 0

// atan(x): arcotangente en radianes
console.log(Math.atan(1)); // ≈ 0.785

// atan2(y, x): ángulo del vector (x, y)
console.log(Math.atan2(1, 1)); // ≈ 0.785

// ceil(x): redondea hacia arriba
console.log(Math.ceil(4.2)); // 5

// cos(x): coseno (x en radianes)
console.log(Math.cos(Math.PI)); // -1

// floor(x): redondea hacia abajo
console.log(Math.floor(4.8)); // 4

// log(x): logaritmo neperiano (base e)
console.log(Math.log(Math.E)); // 1

// max(x, y, z...): mayor valor
console.log(Math.max(1, 5, 3)); // 5

// min(x, y, z...): menor valor
console.log(Math.min(1, 5, 3)); // 1

// pow(x, y): x elevado a y
console.log(Math.pow(2, 3)); // 8

// random(): número aleatorio entre 0 y 1
console.log(Math.random());

// round(x): redondeo al entero más cercano
console.log(Math.round(4.6)); // 5

// sin(x): seno (x en radianes)
console.log(Math.sin(Math.PI / 2)); // 1

// sqrt(x): raíz cuadrada
console.log(Math.sqrt(25)); // 5

// tan(x): tangente
console.log(Math.tan(Math.PI / 4)); // 1
