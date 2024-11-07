function dibujarCuadrado(){
    let ancho = document.getElementById('quad_ancho').value;
    let alto = document.getElementById('quad_alto').value;
    let cuadrado = "";
    for (let i = 0; i < ancho; i++) {
        cuadrado+="*";
    }
    cuadrado+="<br>"
    for (let i = 0; i < alto-2; i++) {
        for (let j = 0; j < ancho-1; j++) {
            if(j==0){
                cuadrado+="*";
            } else {
                cuadrado+="&nbsp";
            }
        }
        cuadrado+="*";
        cuadrado+="<br>";
    }
    for (let i = 0; i < ancho; i++) {
        cuadrado+="*";
    }
    
    document.getElementById("cuadrado").innerHTML = cuadrado;
}

function dibujarDiamante(){
    let alto = document.getElementById('diamond_alto').value;
    let diamnte = "";
    let ancho = 0;
    let anchoMax = Math.round(alto/2);
    let incrementar=true;
    for (let i = 0; i < alto; i++) {

        if (ancho == anchoMax) {
            incrementar = false;
        }
        if (incrementar) {
            ancho++;
        }else{
            ancho--;
        }

        for (let j = 0; j < ancho; j++) {

            diamnte +="*";            
        }
        diamnte+="<br>"
    }
    document.getElementById("diamond").innerHTML = diamnte;
}