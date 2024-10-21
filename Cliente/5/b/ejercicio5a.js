let notas = [];
const calificaciones = ["A", "B", "C", "D", "E", "F"];

function anadir(){
    let nota = document.getElementById("nota");

    if (calificaciones.includes(nota)){
        notas.push(nota);
    }
    document.getElementById("notas").value = notas;
}

function conversor(){
    let num = Number(document.getElementById("num").value);
    let result = document.getElementById("result");

    const conversor = 0.0328084;
    result.value = num * conversor;
}