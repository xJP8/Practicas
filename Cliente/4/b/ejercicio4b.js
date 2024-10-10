function potencia(num){
    return num**2;
}

function raiz(num){
    return num**0.5;
}

function factorial(num){
    for (let i = num; i > 0; i--) {
        num *= i;
    }
    return num;
}