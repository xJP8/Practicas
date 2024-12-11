document.addEventListener('mousemove', function(event) {
    var posX = event.clientX;
    var posY = event.clientY;
    this.getElementById('posX').value = posX;
    this.getElementById('posY').value = posY;
});