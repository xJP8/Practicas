

// Funciones para el manejo de la barra de navegación
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


// Funciones para el manejo de los filtros
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

// Funciones para el manejo del carrito
function mostrarCarro() {
    var dialog = document.getElementById("carrito");
    dialog.showModal();
}

function cargarCarrito() {
    const carritoLista = document.getElementById("carrito-lista");
    carritoLista.innerHTML = "";
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    carrito.forEach(producto => {
        const nuevoProducto = document.createElement("li");
        nuevoProducto.classList.add("carrito-producto");
        nuevoProducto.innerHTML = `
            <img src="${producto.imagenSrc}" alt="${producto.nombre}">
            <div>
                <h2>${producto.nombre}</h2>
                <p>Precio: ${producto.precio}</p>
                <p class="cantidad">${producto.cantidad}</p>
                <button onclick="modificarCantidad(this, 1)"><img src="/assets/img/icons/anadir.svg"></button>
                <button onclick="modificarCantidad(this, -1)"><img src="/assets/img/icons/quitar.svg"></button>
                <button onclick="eliminarProducto(this)"><img src="/assets/img/icons/eliminar.svg"></button>
            </div>
        `;
        carritoLista.appendChild(nuevoProducto);
    });
}

function guardarCarrito() {
    const carritoLista = document.getElementById("carrito-lista");
    const productos = carritoLista.getElementsByClassName("carrito-producto");
    const carrito = [];
    for (let item of productos) {
        carrito.push({
            imagenSrc: item.querySelector("img").src,
            nombre: item.querySelector("h2").textContent,
            precio: item.querySelector("p").textContent.split(": ")[1],
            cantidad: parseInt(item.querySelector(".cantidad").textContent)
        });
    }
    localStorage.setItem("carrito", JSON.stringify(carrito));
}

function anadirCarrito(boton) {
    const producto = boton.closest(".producto");
    const imagenSrc = producto.querySelector("img, audio, iframe")?.src || "";
    const nombre = producto.querySelector("h3").textContent;
    const precio = producto.querySelector(".descripcion p:nth-child(2)").textContent.split(": ")[1];
    
    const carritoLista = document.getElementById("carrito-lista");
    const productosEnCarrito = carritoLista.getElementsByClassName("carrito-producto");
    for (let item of productosEnCarrito) {
        if (item.querySelector("h2").textContent === nombre) {
            let cantidadElem = item.querySelector(".cantidad");
            cantidadElem.textContent = parseInt(cantidadElem.textContent) + 1;
            guardarCarrito();
            return;
        }
    }
    
    const nuevoProducto = document.createElement("li");
    nuevoProducto.classList.add("carrito-producto");
    nuevoProducto.innerHTML = `
        <img src="${imagenSrc}" alt="${nombre}">
        <div>
            <h2>${nombre}</h2>
            <p>Precio: ${precio}</p>
            <p class="cantidad">1</p>
            <button onclick="modificarCantidad(this, 1)"><img src="/assets/img/icons/anadir.svg"></button>
            <button onclick="modificarCantidad(this, -1)"><img src="/assets/img/icons/quitar.svg"></button>
            <button onclick="eliminarProducto(this)"><img src="/assets/img/icons/eliminar.svg"></button>
        </div>
    `;
    
    carritoLista.appendChild(nuevoProducto);
    guardarCarrito();
}

function modificarCantidad(boton, cambio) {
    const cantidadElem = boton.parentElement.querySelector(".cantidad");
    let cantidad = parseInt(cantidadElem.textContent) + cambio;
    if (cantidad <= 0) {
        boton.parentElement.parentElement.remove();
    } else {
        cantidadElem.textContent = cantidad;
    }
    guardarCarrito();
}

function eliminarProducto(boton) {
    boton.parentElement.parentElement.remove();
    guardarCarrito();
}

document.addEventListener("DOMContentLoaded", cargarCarrito);
