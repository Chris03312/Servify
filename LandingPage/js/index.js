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

    const hiddenElements = document.querySelectorAll(".organization-container, .about-container, .volunteers-container, .news-events-container, .bottom-info-section, .contactus-container, .resources-container");
    hiddenElements.forEach((el) => observer.observe(el));

    console.log("Observing elements:", hiddenElements.length); 
});



