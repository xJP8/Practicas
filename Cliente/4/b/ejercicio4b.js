function potencia(){
    num = Number(prompt("Introduzca un numero"));
    alert(num**2);
}

function raiz(){
    num = Number(prompt("Introduzca un numero"));
    alert(num**0.5);
}

function factorial(){
    num = Number(prompt("Introduzca un numero"));
    for (let i = num-1; i > 0; i--) {
        num *= i;
    }
    alert(num);
}

function suma(){
    num1 = Number(prompt("Introduzca un numero"));
    num2 = Number(prompt("Introduzca un numero"));
    result = document.getElementById("result");

    result.value = num1+num2;
}

function rest(){
    num1 = Number(prompt("Introduzca un numero"));
    num2 = Number(prompt("Introduzca un numero"));
    result = document.getElementById("result");

    result.value = num1-num2;
}

function mult(){
    num1 = Number(prompt("Introduzca un numero"));
    num2 = Number(prompt("Introduzca un numero"));
    result = document.getElementById("result");

    result.value = num1*num2;
}

function divi(){
    num1 = Number(prompt("Introduzca un numero"));
    num2 = Number(prompt("Introduzca un numero"));
    result = document.getElementById("result");

    result.value = num1/num2;
}