let video = document.getElementById('video');
let btnPlayPause = document.getElementById('playPause');
let btnStop = document.getElementById('stop');
let btnMute = document.getElementById('mute');
let btnSpeed = document.getElementById('speed');
let volumeSlider = document.getElementById('volume');
let progressBar = document.getElementById('progress');
let btnBackward = document.getElementById('backward');
let btnForward = document.getElementById('forward');

// Función para reproducir o pausar el video
function control() {
    if (video.paused) {
        video.play();
        btnPlayPause.innerHTML = '<img src="pause.png" alt="⏸">';
    } else {
        video.pause();
        btnPlayPause.innerHTML = '<img src="play.png" alt="▶">';
    }
};

// Función para detener el video y restablecer el tiempo actual
function stop(){
    video.pause();
    video.currentTime = 0;
}

// Función para silenciar o activar el sonido del video
function mute() {
    video.muted = !video.muted;
    if(video.muted){
        btnMute.innerHTML = '<img src="volume_mute.png" alt="🔇">';
    } else {
        changeVolume();
    }
}

// Función para cambiar la velocidad de reproducción del video
function changeSpeed() {
    if (video.playbackRate == 1) {
        video.playbackRate = 2;
        btnSpeed.innerHTML = 'Rápido';
    } else if (video.playbackRate == 2) {
        video.playbackRate = 0.5;
        btnSpeed.innerHTML = 'Lento';
    } else {
        video.playbackRate = 1;
        btnSpeed.innerHTML = 'Normal';
    }
}

// Función para cambiar el volumen del video
function changeVolume() {
    let volumeLevel = volumeSlider.value;
    if (volumeLevel == 0) {
        video.volume = 0;
        btnMute.innerHTML = '<img src="volume_mute.png" alt="🔇">';
    } else if (volumeLevel == 1) {
        video.volume = 0.5;
        btnMute.innerHTML = '<img src="volume_low.png" alt="🔉">';
    } else {
        video.volume = 1;
        btnMute.innerHTML = '<img src="volume_high.png" alt="🔊">';
    }
}

// Función para actualizar la barra de progreso mientras se reproduce el video
function updateProgressBar() {
    let percentage = Math.floor((100 / video.duration) * video.currentTime);
    progressBar.value = percentage;
    progressBar.innerHTML = percentage + '%';
}

// Función para actualizar el tiempo del video basado en la barra de progreso
function updateVideoTime() {
    let newTime = video.duration * (progressBar.value / 100);
    video.currentTime = newTime;
}

// Función para retroceder el video 10 segundos
function backward() {
    video.currentTime -= 10;
    updateProgressBar();
}

// Función para adelantar el video 10 segundos
function forward() {
    video.currentTime += 10;
    updateProgressBar();
}

// Event listeners para los botones de control y los sliders
btnPlayPause.addEventListener('click', control);
btnStop.addEventListener('click', stop);
btnMute.addEventListener('click', mute);
btnSpeed.addEventListener('click', changeSpeed);
volumeSlider.addEventListener('change', changeVolume);
progressBar.addEventListener('change', updateVideoTime);
btnBackward.addEventListener('click', backward);
btnForward.addEventListener('click', forward);
