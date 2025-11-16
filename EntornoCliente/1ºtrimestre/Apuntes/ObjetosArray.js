/********************************************
 *            APUNTES — OBJETO ARRAY
 *              JavaScript Completo
 ********************************************/

/************* 1. PROPIEDADES DEL ARRAY *************/

 /*
  * constructor
  * Devuelve la función creadora del prototipo del array.
  */
 let numeros = [1, 2, 3];
 console.log(numeros.constructor);   

 /*
  * length
  * Devuelve o modifica la cantidad de elementos del array.
  */
 console.log(numeros.length); // 3
 numeros.length = 1;          // [1]

 /*
  * prototype
  * Permite añadir funciones nuevas a todos los arrays.
  */
 Array.prototype.saludar = function() {
     console.log("Hola, soy un Array");
 };
 numeros.saludar();


/************* 2. MÉTODOS DEL OBJETO ARRAY *************/

/********* MÉTODOS DE COMBINACIÓN Y COPIA *********/

/*
 * concat()
 * Une dos o más arrays y devuelve uno nuevo.
 */
let a = [1,2], b = [3,4];
let c = a.concat(b); // [1,2,3,4]

/*
 * copyWithin(destino, inicio, fin?)
 * Copia elementos dentro del mismo array.
 */
let arr1 = [1,2,3,4];
arr1.copyWithin(1, 2); // [1,3,4,4]

/*
 * from()
 * Crea un array a partir de objetos iterables.
 */
let arr2 = Array.from("Hola"); // ["H","o","l","a"]


/********* MÉTODOS DE ITERACIÓN *********/

/*
 * entries()
 * Devuelve un iterador clave/valor.
 */
for (let [i, v] of ["a","b"].entries()) {
    console.log(i, v);
}

/*
 * every()
 * Devuelve true si TODOS cumplen la condición.
 */
[2,4,6].every(n => n % 2 === 0); // true

/*
 * filter()
 * Crea un nuevo array que cumple la condición.
 */
let mayores = [10, 20, 5].filter(n => n > 10); // [20]

/*
 * find()
 * Devuelve el PRIMER elemento que cumple la condición.
 */
let encontrado = [4,5,6].find(n => n > 4); // 5

/*
 * findIndex()
 * Devuelve el índice del primer elemento que cumpla la condición.
 */
let indice = [4,5,6].findIndex(n => n > 4); // 1

/*
 * forEach()
 * Ejecuta una función por cada elemento.
 */
[1,2,3].forEach(n => console.log(n));

/*
 * keys()
 * Devuelve un iterador con los índices.
 */
for (let k of [10,20].keys()) {
    console.log(k); // 0 1
}

/*
 * map()
 * Devuelve un nuevo array aplicando una función.
 */
let dobles = [1,2,3].map(n => n * 2); // [2,4,6]

/*
 * some()
 * Devuelve true si ALGÚN elemento cumple la condición.
 */
[1,3,5].some(n => n % 2 === 0); // false

/*
 * reduce()
 * Reduce el array a un único valor.
 */
[1,2,3].reduce((a,b) => a + b); // 6

/*
 * reduceRight()
 * Igual que reduce, pero de derecha a izquierda.
 */
[1,2,3].reduceRight((a,b) => a - b); // 3 - 2 - 1


/********* MÉTODOS DE BÚSQUEDA *********/

/*
 * includes()
 * Comprueba si un valor está en el array.
 */
[1,2,3].includes(2); // true

/*
 * indexOf()
 * Devuelve la primera posición del valor.
 */
["a","b","a"].indexOf("a"); // 0

/*
 * lastIndexOf()
 * Devuelve la última posición.
 */
["a","b","a"].lastIndexOf("a"); // 2


/********* MÉTODOS DE ORDENACIÓN *********/

/*
 * sort()
 * Ordena el array. (Alfabéticamente por defecto)
 */
[3,1,2].sort(); // [1,2,3]

/*
 * reverse()
 * Invierte el array.
 */
[1,2,3].reverse(); // [3,2,1]


/********* MÉTODOS PARA MODIFICAR EL ARRAY *********/

/*
 * pop()
 * Elimina el último elemento.
 */
let x = [1,2,3];
x.pop(); // [1,2]

/*
 * push()
 * Añade elementos al final.
 */
x.push(4); // [1,2,4]

/*
 * shift()
 * Elimina el primer elemento.
 */
x.shift(); // [2,4]

/*
 * unshift()
 * Añade elementos al principio.
 */
x.unshift(10); // [10,2,4]

/*
 * splice(pos, num, ...items)
 * Añade, elimina o reemplaza elementos.
 */
let y = [1,2,3,4];
y.splice(1, 2, 9, 9); // [1,9,9,4]

/*
 * slice(inicio, fin)
 * Crea una copia parcial del array.
 */
let z = [1,2,3,4].slice(1,3); // [2,3]


/********* MÉTODOS DE CONVERSIÓN *********/

/*
 * join()
 * Convierte el array en texto con un separador.
 */
[1,2,3].join(" - "); // "1 - 2 - 3"

/*
 * toString()
 * Convierte el array en texto.
 */
[1,2,3].toString(); // "1,2,3"

/*
 * valueOf()
 * Devuelve el valor primitivo del array (él mismo).
 */
[1,2,3].valueOf(); // [1,2,3]
