/*******************************************************
 *                   OBJETO NAVIGATOR
 * Información sobre el navegador del usuario.
 *******************************************************/

/*
El objeto navigator permite conocer:
✔ El nombre del navegador
✔ La versión
✔ El sistema/plataforma donde se ejecuta
✔ Si las cookies están habilitadas
✔ El user-agent completo
*/

console.log("Nombre del navegador:", navigator.appName);
console.log("Versión:", navigator.appVersion);
console.log("Plataforma:", navigator.platform);
console.log("Cookies habilitadas:", navigator.cookieEnabled);
console.log("User-Agent:", navigator.userAgent);



/**********************
 * PROPIEDADES
 **********************/

// appCodeName → Nombre en código del navegador (generalmente "Mozilla")
console.log("appCodeName:", navigator.appCodeName);

// appName → Nombre del cliente (históricamente "Netscape" en casi todos)
console.log("appName:", navigator.appName);

// appVersion → Información sobre la versión del navegador
console.log("appVersion:", navigator.appVersion);

// cookieEnabled → Indica si las cookies están habilitadas
console.log("Cookies habilitadas:", navigator.cookieEnabled);

// platform → Plataforma/Sistema operativo (ej: "Win32", "Linux x86_64", "MacIntel")
console.log("Plataforma:", navigator.platform);

// userAgent → Cadena completa enviada en las peticiones HTTP
console.log("User Agent:", navigator.userAgent);


/**********************
 * MÉTODO
 **********************/

// javaEnabled() → Indica si el navegador permite Java (normalmente false hoy en día)
console.log("Java habilitado:", navigator.javaEnabled());
