const carousel = document.querySelector('.carousel');
const items = carousel.querySelectorAll('.carousel-item');
let currentIndex = 0;

function showItem(index) {
    items.forEach((item, i) => {
        item.style.display = i === index ? 'block' : 'none';
    });
}

function goToPrevItem() {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : items.length - 1;
    showItem(currentIndex);
}

function goToNextItem() {
    currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
    showItem(currentIndex);
}

showItem(currentIndex);
