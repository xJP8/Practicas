const text = document.getElementById("text");
const resultado = document.getElementById("resultado");
const colores = document.getElementById("colores");
const tamano = document.getElementById("tamano");




function escribir(){
    resultado.value = text.value;
}

function cambiarColorTexto(){
    resultado.style.color = colores.value;
}

function cambiarTamanoTexto() {
    resultado.style.fontSize = tamano.value + "px"; 
}

function alternarSubreayado() {
    resultado.style.blod = tamano.value + "px"; 
}
