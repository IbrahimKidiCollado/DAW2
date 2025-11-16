/*******************************************************
 *                    OBJETO DOCUMENT
 * Representa el documento HTML cargado en la ventana.
 *******************************************************/


/*******************************************************
 * COLECCIONES DEL DOCUMENTO
 * Cada colección es un array-like con elementos del DOM.
 *******************************************************/

// anchors[] → Todos los hipervínculos <a> con atributo name
console.log("Anchors:", document.anchors);

// applets[] → Todos los applets del documento (obsoleto hoy en día)
console.log("Applets:", document.applets);

// forms[] → Todos los formularios del documento <form>
console.log("Formularios:", document.forms);

// images[] → Todas las imágenes <img> del documento
console.log("Imágenes:", document.images);

// links[] → Todos los enlaces <a href="">
console.log("Links:", document.links);



/*******************************************************
 * PROPIEDADES DEL DOCUMENTO
 *******************************************************/

// cookie → Obtiene o establece las cookies del documento
console.log("Cookies:", document.cookie);

// domain → Nombre de dominio del servidor
console.log("Dominio:", document.domain);

// lastModified → Fecha de la última modificación del documento
console.log("Última modificación:", document.lastModified);

// readyState → Estado de carga del documento ("loading", "interactive", "complete")
console.log("Estado de carga:", document.readyState);

// referrer → URL desde la cual se accedió al documento actual
console.log("Referrer:", document.referrer);

// title → Obtiene o modifica el título del documento
console.log("Título:", document.title);
document.title = "Nuevo título desde JavaScript";

// URL → URL completa del documento
console.log("URL:", document.URL);



/*******************************************************
 * MÉTODOS DEL DOCUMENTO
 *******************************************************/

// close() → Cierra el flujo de escritura iniciado con open()
document.close();

// getElementById() → Obtiene un elemento por su atributo id
// Ejemplo: obtener un párrafo con id="texto"
let elementoID = document.getElementById("texto");
console.log("Elemento por ID:", elementoID);

// getElementsByName() → Obtiene elementos por atributo name
let elementosName = document.getElementsByName("usuario");
console.log("Elementos por name:", elementosName);

// getElementsByTagName() → Obtiene elementos por etiqueta (ej: "p")
let parrafos = document.getElementsByTagName("p");
console.log("Párrafos:", parrafos);

// open() → Abre un flujo de escritura en el documento (sobrescribe la página)
document.open();

// write() → Escribe contenido HTML en el documento
document.write("<h2>Contenido escrito con document.write()</h2>");

// writeln() → Igual que write() pero añade salto de línea
document.writeln("Línea escrita con writeln()");
