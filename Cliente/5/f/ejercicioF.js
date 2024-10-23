let array = []

function aleatorio(){
    array = [];
    let tamano = Math.floor(Math.random() * 10) + 1;
    for (let i = 0; i < tamano; i ++) {

        let num = Math.floor(Math.random() * 16) + 1;

        array.push(num);
    }
    mostrar();
}

function mostrar(){
    let inp = document.getElementById("array");
    inp.value = array.join(' - ');
}


function eliminar(){
    let num = Number(document.getElementById("valor").value);

    array = array.filter(valor => valor != num);

    mostrar();
}

function maximo(){
    let maximo = 0;

    for (let i = 0; i < array.length; i++) {
        if(maximo<array[i]){
            maximo = array[i];
        }
    }

    document.getElementById("max").value = maximo;
}

function minimo(){
    let minimo = 99;

    for (let i = 0; i < array.length; i++) {
        if(minimo>array[i]){
            minimo = array[i];
        }
    }

    document.getElementById("min").value = minimo;
}

function hexadecimal(){
    let hex = document.getElementById("hex");

    hex.value = array.map(n => n.toString(16).toUpperCase()).join(" - ");
}