let currentPosition = 1;
const totalItems = 5;
const carousel = document.querySelector('#carousel');

document.getElementById('next').addEventListener('click', () => {
    currentPosition = (currentPosition % totalItems) + 1;
    updateCarouselPosition();
});

document.getElementById('prev').addEventListener('click', () => {
    currentPosition = (currentPosition - 1) || totalItems;
    updateCarouselPosition();
});

function updateCarouselPosition() {
    carousel.style.setProperty('--position', currentPosition);
}
