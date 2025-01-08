// Función para calcular el factorial de un número
function factorial(numero) {
    let resultado = 1;
    for (let j = 1; j <= numero; j++) {
        resultado *= j;
    }
    return resultado;
}

// Crear el primer array con los 10 primeros números naturales
const numeros = Array.from({ length: 10 }, (_, i) => i);

// Crear el segundo array con los factoriales correspondientes
const factoriales = numeros.map(num => factorial(num));

// Selecciona el div donde se mostrarán los resultados
const outputDiv = document.getElementById("output");

// Imprimir cada valor del array de factoriales en una nueva línea
factoriales.forEach(fact => {
    const para = document.createElement("p");
    para.textContent = fact;
    outputDiv.appendChild(para);
});
