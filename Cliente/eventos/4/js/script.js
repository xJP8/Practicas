let video = document.getElementById('video');

function action() {
    if (video.paused) {
        video.play();
    } else {
        video.pause();
    }
}

function redimensionar(tamano) {
    video.width = tamano;
}

function mute() {
    video.muted = !video.muted;
}


function volume() {
    let vol = document.getElementById('vol');
    let volumeValue = vol.value / 100;
    video.volume = Math.max(0, Math.min(1, volumeValue));
}

function time() {
    let time = document.getElementById('time');
    video.currentTime = time.value;
}