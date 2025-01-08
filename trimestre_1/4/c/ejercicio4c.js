function potencia(){
    num = document.getElementById("numero").value;
    alert(num**2);
}

function raiz(){
    num = document.getElementById("numero").value;
    alert(num**0.5);
}

function factorial(){
    num = document.getElementById("numero").value;
    for (let i = num-1; i > 0; i--) {
        num *= i;
    }
    alert(num);
}

function suma(){
    num1 = Number(document.getElementById("num1").value);
    num2 = Number(document.getElementById("num2").value);
    result = document.getElementById("result");

    result.value = num1+num2;
}

function rest(){
    num1 = Number(document.getElementById("num1").value);
    num2 = Number(document.getElementById("num2").value);
    result = document.getElementById("result");

    result.value = num1-num2;
}

function mult(){
    num1 = Number(document.getElementById("num1").value);
    num2 = Number(document.getElementById("num2").value);
    result = document.getElementById("result");

    result.value = num1*num2;
}

function divi(){
    num1 = Number(document.getElementById("num1").value);
    num2 = Number(document.getElementById("num2").value);
    result = document.getElementById("result");

    result.value = num1/num2;
}