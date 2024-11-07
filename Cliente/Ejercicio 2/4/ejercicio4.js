function generarArrayAleatorio(longitud) {
    const array = [];
    for (let i = 0; i < longitud; i++) {
        array.push(Math.floor(Math.random() * 100) + 1); // Números aleatorios entre 1 y 100
    }
    return array;
}

function combinarArrays() {
    // Generar dos arrays aleatorios de longitud 5
    const array1 = generarArrayAleatorio(5);
    const array2 = generarArrayAleatorio(5);

    // Intercalar los dos arrays
    const arrayCombinado = [];
    for (let i = 0; i < array1.length; i++) {
        arrayCombinado.push(array1[i], array2[i]);
    }

    // Mostrar los arrays en la página
    document.getElementById('array1').textContent = array1.join(', ');
    document.getElementById('array2').textContent = array2.join(', ');
    document.getElementById('arrayCombinado').textContent = arrayCombinado.join(', ');
}