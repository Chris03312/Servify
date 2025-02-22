document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll('.img-carousel img');
    const dotsNav = document.getElementById('dots-nav');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentIndex = 0;
    let interval;

    // Ensure dots are generated dynamically
    dotsNav.innerHTML = ''; // Clear existing dots
    images.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => showImage(index));
        dotsNav.appendChild(dot);
    });

    const allDots = document.querySelectorAll('.dot');

    // Function to show image & update active dot
    function showImage(index) {
        images[currentIndex].classList.remove('active');
        allDots[currentIndex].classList.remove('active');
        
        currentIndex = index;
        
        images[currentIndex].classList.add('active');
        allDots[currentIndex].classList.add('active');

        restartSlideshow();
    }

    // Previous & Next Button Events
    prevBtn.addEventListener('click', () => {
        let newIndex = currentIndex - 1 < 0 ? images.length - 1 : currentIndex - 1;
        showImage(newIndex);
    });

    nextBtn.addEventListener('click', () => {
        let newIndex = currentIndex + 1 >= images.length ? 0 : currentIndex + 1;
        showImage(newIndex);
    });

    // Auto-Slideshow with Loading Line
    function startSlideshow() {
        interval = setInterval(() => {
            let newIndex = currentIndex + 1 >= images.length ? 0 : currentIndex + 1;
            showImage(newIndex);
        }, 7000);
        
        // Reset & Apply Loading Line
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
