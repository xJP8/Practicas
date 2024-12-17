function actualizarReloj() {
    const ahora = new Date();
    const horas = String(ahora.getHours()).padStart(2, '0');
    const minutos = String(ahora.getMinutes()).padStart(2, '0');
    const segundos = String(ahora.getSeconds()).padStart(2, '0');
    const tiempo = `${horas}:${minutos}:${segundos}`;
    
    document.getElementById('reloj').textContent = tiempo;
    
    const progreso = (ahora.getSeconds() / 60) * 100;
    document.getElementById('progress-bar').style.width = `${progreso}%`;
}

setInterval(actualizarReloj, 1000);
actualizarReloj();