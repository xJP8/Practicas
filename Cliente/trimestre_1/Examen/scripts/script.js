const conv1 = 1.8;
const conv2 = 32;

/**
 * Grados Celsius ➡ Grados Fahrenheit.
 */
function convCelsFahr(){
    let num = Number(document.getElementById("cels").value);
    let result = document.getElementById("fahr");

    result.value = ((num * conv1) + conv2).toFixed(4);
}

/**
 * Grados Fahrenheit ➡ Grados Celsius.
 */
function convFahrCels(){
    let num = Number(document.getElementById("fahr").value);
    let result = document.getElementById("cels");

    result.value = ((num - conv2) / conv1).toFixed(4); 
}