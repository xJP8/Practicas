let teclado = document.getElementById('teclado');
let raton = document.getElementById('raton');

document.addEventListener('keypress', function(event) {
    teclado.style.backgroundColor = "cyan";
});

document.addEventListener('mousedown', function(event) {
    raton.style.backgroundColor = "yellow";
});

document.addEventListener('mousemove', function(event) {
    raton.style.backgroundColor = "white";
    teclado.style.backgroundColor = "white";
});
