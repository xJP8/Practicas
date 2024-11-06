let notas = [];
const calificaciones = {
    "A": 10,
    "B": 8,
    "C": 7,
    "D": 6,
    "E": 5,
    "F": 4
};

function anadir() {
    let nota = document.getElementById("nota").value.toUpperCase();
    if (calificaciones.hasOwnProperty(nota)) {
        notas.push(calificaciones[nota]);
        document.getElementById("notas").value = notas.join(", ");
        agregarNotaTabla(nota, calificaciones[nota]);
        document.getElementById("nota").value = ''; // Limpia el input
    } else {
        alert("Nota inválida. Ingresa una letra de la A a la F.");
    }
}

function agregarNotaTabla(letra, valor) {
    let tabla = document.getElementById("tablaNotas");
    let fila = tabla.insertRow();
    fila.insertCell(0).innerText = letra;
    fila.insertCell(1).innerText = valor;
}

function calcularMedia() {
    if (notas.length === 0) {
        alert("No hay notas para calcular la media.");
        return;
    }
    let suma = notas.reduce((a, b) => a + b, 0);
    let media = (suma / notas.length).toFixed(2);
    document.getElementById("media").value = media;
}