function conversor(tipo){
    let num = Number(document.getElementById("num").value);
    let img = document.getElementById("img");
    let result = document.getElementById("result");

    let conversor = 0;

    if(num !== 0){
        switch (tipo) {
            case "£":
                img.src = 'uk.png'
                conversor = 0.84;
                break;
    
            case "¥":
                img.src = 'jp.svg'
                conversor = 162.47;
                break;
        
            default:
                img.src = 'eeuu.jpg'
                conversor = 1.09;
                break;
        }
        img.hidden = false;
        result.value = num * conversor;
    } else{
        alert("Debes introducir un numero para poder convertir.")
    }
}