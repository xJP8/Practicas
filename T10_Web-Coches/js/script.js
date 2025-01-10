let hora = document.getElementById("hora");

function solicitarCita(){
    hora.innerHTML = Date();
}

function cambiarTema(){
    document.body.classList.toggle("dark");
}