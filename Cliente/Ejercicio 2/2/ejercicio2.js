const colores = ["azul", "amarillo", "rojo", "verde", "café", "rosa"];

function verificarColor() {
    const colorUsuario = document.getElementById('colorInput').value.toLowerCase(); // Obtener el color introducido y convertir a minúsculas
    const resultadoElemento = document.getElementById('resultado');

    if (colores.includes(colorUsuario)) {
        resultadoElemento.textContent = `¡El color ${colorUsuario} está en el array!`;
        resultadoElemento.style.color = "green";
    } else {
        resultadoElemento.textContent = `El color ${colorUsuario} no está en el array.`;
        resultadoElemento.style.color = "red";
    }
}