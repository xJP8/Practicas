function generarNumeros() {
    let numeros = [];

    for (let i = 0; i < 20; i++) {
        let numeroAleatorio = Math.floor(Math.random() * 101) - 50; // Rango entre -50 y 50
        numeros.push(numeroAleatorio);
    }

    document.getElementById('resultados').value = numeros.join(', '); // Unir los números con comas y mostrarlos en el input
}