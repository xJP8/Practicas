let passValid  = false;
let emailValid = false;
let dateValid = false;

/** 
 * Comprueba que el nombre no tenga:
 * - Numeros
 * - Espacios
 */
function validateName(){
    let nombre = document.getElementById("name");
    nombre.value = nombre.value.replace(/[0-9\s]/g, '');
}

/** 
 * Comprueba que la contraseña tenga:
 * - 3 Numeros
 * - 1 Mayuscula
 * - 1 Caracter Especial
 * - 8~12 Longitud
 */
function validatePass(){
    const input = document.getElementById('pass');
    const resultadoPass = document.getElementById('resultadoPass');
    const password = input.value;

    const regex = /^(?=.*[A-Z])(?=.*[0-9].*[0-9].*[0-9])(?=.*[!@#$%^&*()\-_=+{}[\]:;"'<>,.?/\\|~`]).{8,12}$/;

    if (regex.test(password)) {
        resultadoPass.textContent = "La contraseña es válida ✅";
        resultadoPass.style.color = "green";
        passValid = true;
    } else {
        resultadoPass.textContent = "La contraseña no cumple con los requisitos ❌";
        resultadoPass.style.color = "red";
        passValid = false;
    }
}

/** 
 * Comprueba que el mail contenga: 
 * - gmail.com
 * - hotmail.com
 * - yahoo.com
 * - icloud.com
 */
function validateEmail() {
    const email = document.getElementById('email').value;
    const resultadoEmail = document.getElementById('resultadoEmail');

    // Expresión regular para los dominios permitidos
    const regex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|yahoo\.com|icloud\.com)$/;

    if (regex.test(email)) {
        resultadoEmail.textContent = "El email es válido ✅";
        resultadoEmail.style.color = "green";
        emailValid = true;
    } else {
        resultadoEmail.textContent = "El email no es válido o no pertenece a los dominios permitidos ❌";
        resultadoEmail.style.color = "red";
        emailValid = false;
    }
}


/**
 * Comprueba que la fecha sea anterior al día de mañana.
 */
function validateDate() {
    const fechaInput = document.getElementById('fecha');
    const fechaSeleccionada = new Date(fechaInput.value); 
    const fechaActual = new Date();
    fechaActual.setHours(0, 0, 0, 0);
    const manana = new Date(fechaActual);
    manana.setDate(manana.getDate() + 1);

    if (fechaSeleccionada < manana) {
        fechaInput.style. border = "2px solid green";
        fechaInput.title = "La fecha es válida.";
        dateValid = true;
    } else {
        fechaInput.style.border = "2px solid red";
        fechaInput.title = "La fecha debe ser anterior al día de mañana.";
        dateValid = false;
    }
}


/**
 * Comprueba que todos los datos del formulario sean validos y "envía la información."
 */
function sendForm(){
    switch (false) {
        case passValid:
            alert("La contraseña no es valida.");
            break;
        case emailValid:
            alert("El correo no es valido.");
            break;
        case dateValid:
            alert("La fecha no es valida.");
            break;
    
        default:
            alert("Datos enviados")
            break;
    }
}

/**
 * 
 */
function reset() {
    let nombre = document.getElementById("name");
    let pass = document.getElementById("pass");
    let email = document.getElementById("email");
    let fecha = document.getElementById("fecha");
    nombre.value = "";
    pass.value = "";
    email.value = "";
    fecha.value = "";

    validateName();
    validatePass();
    validateEmail();
    validateDate();
}