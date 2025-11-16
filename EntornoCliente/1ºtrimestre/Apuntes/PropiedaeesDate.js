// =====================================================
// PROPIEDADES Y MÉTODOS DEL OBJETO DATE (JavaScript)
// =====================================================

// ----- PROPIEDADES -----
// constructor: función que creó el objeto Date.
let fecha = new Date();
console.log(fecha.constructor); // function Date() { ... }

// prototype: permite añadir métodos al objeto Date.
Date.prototype.saludo = function () {
    return "Hola desde Date";
};
console.log(fecha.saludo()); // "Hola desde Date"


// ----- MÉTODOS DEL OBJETO DATE -----

let d = new Date(); // Fecha y hora actual

// getDate(): día del mes (1–31)
console.log(d.getDate());

// getDay(): día de la semana (0–6) -> 0 = Domingo
console.log(d.getDay());

// getFullYear(): año (4 dígitos)
console.log(d.getFullYear());

// getHours(): hora (0–23)
console.log(d.getHours());

// getMilliseconds(): milisegundos (0–999)
console.log(d.getMilliseconds());

// getMinutes(): minutos (0–59)
console.log(d.getMinutes());

// getMonth(): mes (0–11) -> 0 = Enero
console.log(d.getMonth());

// getSeconds(): segundos (0–59)
console.log(d.getSeconds());

// getTime(): milisegundos desde 1/1/1970
console.log(d.getTime());

// getTimezoneOffset(): diferencia entre hora local y GMT (en minutos)
console.log(d.getTimezoneOffset());

// Métodos basados en hora UTC (universal)

// getUTCDate(): día del mes en base a UTC
console.log(d.getUTCDate());

// getUTCDay(): día de la semana en UTC (0–6)
console.log(d.getUTCDay());

// getUTCFullYear(): año en UTC (4 dígitos)
console.log(d.getUTCFullYear());


// ----- MÉTODOS SET (para modificar fechas) -----

// setDate(x): cambia el día del mes (1–31)
d.setDate(15);
console.log(d);

// setHours(x): cambia la hora (0–23)
d.setHours(10);
console.log(d);

// setFullYear(x): cambia el año (4 dígitos)
d.setFullYear(2030);
console.log(d);
