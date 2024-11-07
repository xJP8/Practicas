const iframe = document.getElementById('videoIframe');
const widthRange = document.getElementById('widthRange');
const heightRange = document.getElementById('heightRange');
const widthValue = document.getElementById('widthValue');
const heightValue = document.getElementById('heightValue');

widthRange.addEventListener('input', function() {
    const newWidth = widthRange.value;
    iframe.width = newWidth;
    widthValue.textContent = newWidth; 
});

heightRange.addEventListener('input', function() {
    const newHeight = heightRange.value;
    iframe.height = newHeight;
    heightValue.textContent = newHeight;
});