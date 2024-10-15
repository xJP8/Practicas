function conversor(tipo){
    let num = Number(document.getElementById("num").value);
    let result = document.getElementById("result");

    let conversor = 0;

    switch (tipo) {
        case "£":
            conversor = 0.84;
            break;

        case "¥":
            conversor = 162.47;
            break;
    
        default:
            conversor = 1.09;
            break;
    }

    result.value = num * conversor;

}