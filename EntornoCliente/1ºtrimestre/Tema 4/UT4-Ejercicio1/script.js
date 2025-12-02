const elementos = [
	"Rojo",
	"Azul",
	"Verde",
	"Amarillo",
	"Naranja",
	"Violeta",
	"Negro",
	"Blanco",
	"Gris",
	"Marrón"
];

function ejercicio1() {
	// Visualiza por pantalla todo el contenido del array, separando cada dato en líneas distintas.
	console.log(elementos);

	// Añade al array un dato más. (mediante el uso [longitud]
	elementos[elementos.length] = "Cián";
	console.log(elementos);

	// Añade al array dos datos más mediante utilizando un solo método.
	elementos.push("Morado", "Rosa");
	console.log(elementos);

	// Añade un dato más al principio del array.
	elementos.unshift("Color");
	console.log(elementos);

	// Localiza un cierto dato dentro del array.
	console.log(elementos.indexOf("Cián")); 

	// Elimina los últimos tres datos del array.
	elementos.splice(elementos.length - 3, 3);
	console.log(elementos);

	// Crea un sub-array llamado array_recortado con los datos del array elementos, comprendidos entre la posición 4 y 8 (ambos inclusive).
	const array_cortado = elementos.slice(4, 9);
	console.log(array_cortado);

	// Crea un nuevo array llamado elementos_MYCLS con los datos del array elementos en mayúsculas.
	const elementos_MYCLS = Array.from(elementos).map(e => e.toUpperCase());
	console.log(elementos_MYCLS);
}

ejercicio1();

document.addEventListener('DOMContentLoaded', function() {
	const fileInput = document.getElementById('fileInput');
	const contenedor = document.getElementById('contenedorContenido');

    fileInput.addEventListener('change', function(event) {
        const archivo = event.target.files[0];

        if (!archivo) {
            contenedor.textContent = 'No se ha seleccionado ningún fichero.';
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            const contenido = e.target.result;

            var datos = contenido.split('\n').map(linea => linea.replace('\r', ''));


            contenedor.innerHTML = '<pre>' + JSON.stringify(datos, null, 2) + '</pre>';
        };

        reader.onerror = function(e) {
            contenedor.textContent = 'Error al leer el fichero: ' + e.target.error;
        };

        reader.readAsText(archivo);
    });
});