document.getElementById("archivo").addEventListener("change", leerFichero);
document.getElementById("elegir").addEventListener("click", mostrarPrecio);
let productos = [];
let nombreProductos = [];
let precioProductos = [];

function leerFichero(e) {
	const archivo = e.target.files[0];
	
	if (!archivo) return;

	const lector = new FileReader();

	lector.readAsText(archivo);
	lector.onload = function(e) {
		const datos = e.target.result;
		productos = datos.split(/[;\n]/);
		mostrarProductos();
	}
}

function mostrarProductos() {
	document.getElementById("contenedorArchivo").style.display = "none";
	document.getElementById("contenedorProductos").style.display = "block";
	normalizarDatos();
}

function normalizarDatos() {
	productos.forEach(element => {
		if (isNaN(element)) nombreProductos.push(element);
		else precioProductos.push(element);
	});
	rellenarDesplegable();
}

function rellenarDesplegable() {
	const desplegable = document.getElementById("productos");
	for(let i = 0; i < nombreProductos.length;i++) {
		const option = document.createElement("option");
		option.setAttribute("value", nombreProductos[i]);
		option.textContent = nombreProductos[i];
		desplegable.appendChild(option);
	}
}

function mostrarPrecio() {
	const p = document.getElementById("precio");
	const nombre = document.getElementById("productos").value;

	p.textContent += "El precio es de: " + precioProductos[nombreProductos.indexOf(nombre)];
	p.style.display = "block";
}