document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                } else {
                    entry.target.classList.remove("show");
                }
            });
        },
        { threshold: 0.3 }
    );

    // Select multiple elements for observation
    const hiddenElements = document.querySelectorAll(".organization-container, .about-container, .volunteers-container, .news-events-container, .bottom-info-section");
    hiddenElements.forEach((el) => observer.observe(el));

    console.log("Observing elements:", hiddenElements.length); 
});


