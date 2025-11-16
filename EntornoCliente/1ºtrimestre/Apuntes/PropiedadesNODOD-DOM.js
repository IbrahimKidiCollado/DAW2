/******************************************************
 * PROPIEDADES DE LOS NODOS DEL DOM
 ******************************************************/

//Nombre del nodo ("DIV", "#text", etc.)
console.log(nodo.nodeName);

//Valor del nodo (solo útil en nodos de texto y atributos)
console.log(nodo.nodeValue);

//Número que identifica el tipo de nodo (1 = elemento, 3 = texto, etc.)
console.log(nodo.nodeType);

//Nodo padre
console.log(nodo.parentNode);

//Lista de nodos hijos (NodeList, similar a array)
console.log(nodo.childNodes);

//Primer nodo hijo
console.log(nodo.firstChild);

//Último nodo hijo
console.log(nodo.lastChild);

// Hermano anterior
console.log(nodo.previousSibling);

// Hermano siguiente
console.log(nodo.nextSibling);

//Lista (NodeMap) de atributos del nodo
console.log(nodo.attributes);

//Referencia al documento dueño del nodo
console.log(nodo.ownerDocument);

//URI del namespace (solo para XML/SVG/MathML, etc.)
console.log(nodo.namespaceURI);

// Prefijo del namespace (si aplica)
console.log(nodo.prefix);

// Nombre local dentro del namespace
console.log(nodo.localName);


/******************************************************
 * MÉTODOS DE LOS NODOS DEL DOM
 ******************************************************/

// Añade un nodo hijo al final
nodo.appendChild(nuevoHijo);

//Clona el nodo (deep = true → copia con hijos)
let copia = nodo.cloneNode(true);

// Devuelve true si tiene hijos
console.log(nodo.hasChildNodes());

//Inserta "new" antes del nodo "ref"
nodo.insertBefore(nuevoNodo, referencia);

//Elimina un nodo hijo
nodo.removeChild(nodoAEliminar);

//Sustituye un hijo por otro
nodo.replaceChild(nuevoNodo, nodoViejo);

//Comprueba si el nodo soporta una característica
console.log(nodo.isSupported("XML", "1.0"));
