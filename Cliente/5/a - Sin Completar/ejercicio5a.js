let notas = [];
const calificaciones = [
    {clave: "A", valor: 10}, 
    {clave: "B", valor: 8}, 
    {clave: "C", valor: 6},
    {clave: "D", valor: 7},
    {clave: "E", valor: 5},
    {clave: "F", valor: 4}
];

function anadir(){
    let nota = document.getElementById("nota").value.toUpperCase();
    if (calificaciones.includes(nota)){
        notas.push(calificaciones.find(item => item.clave === clave));
        document.getElementById("notas").value = notas;
    }
}

function conversor(){
    let num = Number(document.getElementById("num").value);
    let result = document.getElementById("result");

    const conversor = 0.0328084;
    result.value = num * conversor;
}