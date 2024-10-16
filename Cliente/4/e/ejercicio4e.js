function conversor(){
    let num = Number(document.getElementById("num").value);
    let result = document.getElementById("result");

    const conversor = 0.0328084;
    result.value = num * conversor;
}