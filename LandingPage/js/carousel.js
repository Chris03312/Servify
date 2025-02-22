document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll('.img-carousel img');
    const dotsNav = document.getElementById('dots-nav');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentIndex = 0;
    let interval;

    dotsNav.innerHTML = ''; 
    images.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => showImage(index));
        dotsNav.appendChild(dot);
    });

    const allDots = document.querySelectorAll('.dot');

    function showImage(index) {
        images[currentIndex].classList.remove('active');
        allDots[currentIndex].classList.remove('active');
        
        currentIndex = index;
        
        images[currentIndex].classList.add('active');
        allDots[currentIndex].classList.add('active');

        restartSlideshow();
    }

    prevBtn.addEventListener('click', () => {
        let newIndex = currentIndex - 1 < 0 ? images.length - 1 : currentIndex - 1;
        showImage(newIndex);
    });

    nextBtn.addEventListener('click', () => {
        let newIndex = currentIndex + 1 >= images.length ? 0 : currentIndex + 1;
        showImage(newIndex);
    });

    function startSlideshow() {
        interval = setInterval(() => {
            let newIndex = currentIndex + 1 >= images.length ? 0 : currentIndex + 1;
            showImage(newIndex);
        }, 7000);
        
        document.querySelector('.loading-line')?.remove();
        const loadingLine = document.createElement('div');
        loadingLine.classList.add('loading-line');
        document.querySelector('.image-container').appendChild(loadingLine);
    }

    function restartSlideshow() {
        clearInterval(interval);
        startSlideshow();
    }

    startSlideshow();
});


const images = document.querySelectorAll(".carousel-image");
let currentIndex = 0;
let interval;

function showNextImage() {
    images[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].classList.add("active");
}

function startCarousel() {
    interval = setInterval(showNextImage, 2000);
}

function stopCarousel() {
    clearInterval(interval);
}

images[currentIndex].classList.add("active");
startCarousel();

document.querySelector(".news-events-poster").addEventListener("mouseenter", stopCarousel);
document.querySelector(".news-events-poster").addEventListener("mouseleave", startCarousel);