(() => {
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

    if (images.length > 0) {
        images[currentIndex].classList.add("active");
        startCarousel();

        document.querySelector(".news-events-poster").addEventListener("mouseenter", stopCarousel);
        document.querySelector(".news-events-poster").addEventListener("mouseleave", startCarousel);
    } else {
        console.warn("No images found for the carousel.");
    }
})();
