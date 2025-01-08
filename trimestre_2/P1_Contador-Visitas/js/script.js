let text = document.getElementById("text");
let contador = localStorage.getItem("contador");

incrementarContador();

function incrementarContador() {
    contador++;
    localStorage.setItem("contador", contador);
    actualizarContador();
}

function actualizarContador() {
    localStorage.getItem("contador") ? contador = localStorage.getItem("contador") : contador = 1;
    text.innerHTML = "Has entrado a esta pagina web: " + contador + " veces";
}

function resetearContador() {
    contador = 1;
    localStorage.setItem("contador", contador);
    actualizarContador();
}