const meses = [
    {key: "ENERO", value:"31"},
    {key: "FEBRERO", value:"28"},
    {key: "MARZO", value:"31"},
    {key: "ABRIL", value:"30"},
    {key: "MAYO", value:"31"},
    {key: "JUNIO", value:"30"},
    {key: "JULIO", value:"31"},
    {key: "AGOSTO", value:"31"},
    {key: "SEPTIEMBRE", value:"30"},
    {key: "OCTUBRE", value:"31"},
    {key: "NOVIEMBRE", value:"30"},
    {key: "DICIEMBRE", value:"31"}
]

function diaMes(){
    let mesBuscado = document.getElementById("mes").value.toUpperCase();
    let ano = Number(document.getElementById("ano").value);

    switch (mesBuscado) {
        case "FEBRERO":
            if((ano % 4 === 0 && ano % 100 !== 0) || (ano % 400 === 0)){
                alert("Tu mes tiene: " + 29 + " días.");
            }else{
                alert("Tu mes tiene: " + 28 + " días.");
            }
            break;
    
        default:
            const mes = meses.find(m => m.key === mesBuscado);
            const valor = mes ? mes.value : null;
            alert("Tu mes tiene: " + valor + " días.");
            break;
    }
}