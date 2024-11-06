const text = document.getElementById("text");
const resultado = document.getElementById("resultado");
const colores = document.getElementById("colores");
const bk_color = document.getElementById("bk_color");
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

function alternarSubrayado() {
    if (resultado.style.textDecoration === "underline") {
        resultado.style.textDecoration = "none";
    } else {
        resultado.style.textDecoration = "underline";
    }
}

function alternarCursiva() {
    if (resultado.style.fontStyle === "italic") {
        resultado.style.fontStyle = "normal";
    } else {
        resultado.style.fontStyle = "italic";
    }
}

function alternarNegrita() {
    if (resultado.style.fontWeight === "bold") {
        resultado.style.fontWeight = "normal";
    } else {
        resultado.style.fontWeight = "bold";
    }
}

function cambiarFondo() {    
    resultado.style.backgroundColor = bk_color.value;
}

function cambiarBorde(border_color) {    
    resultado.style.borderColor = border_color;
}

function cambiarTipografia(fuente) {
    resultado.style.fontFamily = fuente;
}
