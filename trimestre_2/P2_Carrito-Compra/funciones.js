window.onload = init;

function init() {
    const botonEnvio = document.getElementById("botonEnvio");
    const nuevoItem = document.getElementById("anadir");
    const listaCompra = document.getElementById("listaCompra");
    const resetearBtn = document.getElementById("resetear");

    botonEnvio.addEventListener("click", () => anadir(nuevoItem, listaCompra));
    resetearBtn.addEventListener("click", () => resetear(listaCompra));
    rellenarContenido(listaCompra);
}

function anadir(nuevoItem, listaCompra) {
    if (nuevoItem.value.trim() === "") {
        alert("Por favor, introduce un artículo válido.");
    } else {
        const lista = document.createElement("li");
        lista.textContent = nuevoItem.value;
        lista.addEventListener("dblclick", eliminarLi);
        listaCompra.appendChild(lista);
        nuevoItem.value = "";
        actualizarCookie(listaCompra);
    }
}

function actualizarCookie(listaCompra) {
    setCookie("compra", listaCompra.innerHTML, 7);
}

function resetear(listaCompra) {
    listaCompra.innerHTML = "";
    removeCookie("compra");
}

function rellenarContenido(listaCompra) {
    if (detectCookie("compra")) {
        listaCompra.innerHTML = getCookie("compra");
        const elementosLista = listaCompra.getElementsByTagName("li");
        Array.from(elementosLista).forEach((li) => {
            li.addEventListener("dblclick", eliminarLi);
        });
    }
}

function eliminarLi(event) {
    event.target.remove();
    actualizarCookie(document.getElementById("listaCompra"));
}