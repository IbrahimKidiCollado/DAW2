document.getElementById("formulario").addEventListener("submit", validar);

function validaContraseña() {
    let el = document.getElementById("password"); 
    if (!el.checkValidity()) {
        error(el);
        return false;
    }
    return true;
}   

function validaMes() {
    let el = document.getElementById("mes"); 
    if(!el.checkValidity()) {
        error(el);
        return false;
    }
    return true
}

function validaUrl() {
    let el = document.getElementById("url_inicio"); 
    if(!el.checkValidity()) {
        error(el);
        return false;
    }
    return true
}

function validar(e) {
    borrarError();

    let passwordValida = validaContraseña(); 
    validaMes();
    validaUrl();
    
    if (passwordValida && confirm("Aceptar para enviar el formulario")) {
        return true; 
    } else {
        e.preventDefault(); 
        return false;
    }
}

function error(el) {
    document.getElementById("error").innerHTML = el.validationMessage;
    el.style.border = "1px solid red";
    el.focus();
}

function borrarError() {
    let formulario = document.forms[0];
    document.getElementById("error").innerHTML = "";
    for (let i = 0 ; i < formulario.elements.length; i++) {
        formulario.elements[i].style.border = "";
    }
}