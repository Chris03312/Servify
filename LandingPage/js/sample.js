const images = document.querySelectorAll('.gallery img'); // Select all images

images.forEach(image => {
    image.addEventListener('click', function() {
        images.forEach(img => img.classList.remove('active'));

        this.classList.add('active');
    });
});
