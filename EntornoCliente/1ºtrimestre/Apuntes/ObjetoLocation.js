/*******************************************************
 *                  OBJETO LOCATION
 * Información sobre la URL actual del navegador.
 * Se accede mediante: window.location  (o simplemente location)
 *******************************************************/


/**********************
 * PROPIEDADES
 **********************/

// hash → Parte del enlace después de # (ancla)
console.log("hash:", location.hash);

// host → Nombre del servidor + puerto (ej: "example.com:3000")
console.log("host:", location.host);

// hostname → Nombre de dominio (sin puerto)
console.log("hostname:", location.hostname);

// href → URL completa
console.log("href:", location.href);

// pathname → Ruta del recurso dentro de la URL (ej: /carpeta/pagina.html)
console.log("pathname:", location.pathname);

// port → Número de puerto del servidor (ej: "8080")
console.log("port:", location.port);

// protocol → Protocolo utilizado (ej: "https:")
console.log("protocol:", location.protocol);

// search → Parámetros enviados en la URL (todo lo que va después de ?)
console.log("search:", location.search);


/**********************
 * MÉTODOS
 **********************/

// assign(url) → Carga un nuevo documento
// location.assign("https://www.google.com");

// reload() → Recarga la página actual (como F5)
// location.reload();

// replace(url) → Sustituye la página actual en el historial (no se puede volver atrás)
// location.replace("https://www.google.com");
