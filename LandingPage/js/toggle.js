const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                const icon = header.querySelector('.icon');

                // Close all other sections
                document.querySelectorAll('.accordion-content').forEach(section => {
                    if (section !== content) {
                        section.style.display = 'none';
                        section.previousElementSibling.querySelector('.icon').textContent = '+';
                    }
                });

                // Toggle the current section
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                    icon.textContent = '+';
                } else {
                    content.style.display = 'block';
                    icon.textContent = '-';
                }
            });
        });