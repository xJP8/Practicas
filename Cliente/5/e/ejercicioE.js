function contar(){
    let texto = document.getElementById("texto").value;
    let letra = document.getElementById("letra").value;

    let contador = 0;

    for (let i = 0; i < texto.length; i++) {
        if (texto[i] === letra) {
            contador ++;
        }
    }

    if (contador > 0) {
        alert(`La letra "${letra}" se tiene: ${contador}`);
    } else {
        alert(`La letra "${letra}" no se encuentra en el texto.`);
    }
}