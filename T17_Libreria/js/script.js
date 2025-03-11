function buscar() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    ul = document.getElementsByClassName("productos")[0];
    li = ul.getElementsByClassName("producto");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h3")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function filtrar() {
    var select, filter, ul, li, i;
    select = document.getElementById("filtro");
    filter = select.value;
    ul = document.getElementsByClassName("productos")[0];
    li = ul.getElementsByClassName("producto");
    for (i = 0; i < li.length; i++) {
        if (filter === "none" || li[i].classList.contains(filter)) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function mostrarCarro() {
    var dialog = document.getElementById("carrito");
    dialog.showModal();
}

function anadirCarrito() {
    alert("Producto añadido al carrito");
}
