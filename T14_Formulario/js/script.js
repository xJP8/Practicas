document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('abrirBtn').addEventListener('click', abrir);
    document.getElementById('guardarBtn').addEventListener('click', guardar);
    document.getElementById('imprimirBtn').addEventListener('click', imprimir);
});

function abrir() {
    alert('Abriendo...');
}

function guardar() {
    alert('Guardando...');
}

function imprimir() {
    window.print();
    alert('Imprimiendo...');
}