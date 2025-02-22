<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPPAM - Volunteer</title>
    <link rel="stylesheet" href="LandingPage/css/profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include("LandingPage/navbar.php"); ?>

    <section class="org-profile">
        <div class="title-section">
            <h2>
                <span class="highlight-black">Our</span>
                <span class="highlight-red">Coordinators</span>
            </h2>
            <p class="subtitle">Meet our dedicated volunteers who serve their communities with passion.</p>
        </div>

        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">
                    <span>COORDINATORS FROM MALABON</span>
                    <span class="icon">+</span>
                </div>
                <div class="accordion-content">
                    <div class="coordinator">
                        <img src="LandingPage/img/c1.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>
                    <div class="coordinator">
                        <img src="LandingPage/img/c2.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>
                    <div class="coordinator">
                        <img src="LandingPage/img/c1.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>
                    <div class="coordinator">
                        <img src="LandingPage/img/c2.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>

                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <span>COORDINATORS FROM NAVOTAS</span>
                    <span class="icon">+</span>
                </div>
                <div class="accordion-content">
                    <div class="coordinator">
                        <img src="LandingPage/img/c1.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>
                    <div class="coordinator">
                        <img src="LandingPage/img/c2.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <span>COORDINATORS FROM NOVALICHES</span>
                    <span class="icon">+</span>
                </div>
                <div class="accordion-content">
                    <div class="coordinator">
                        <img src="LandingPage/img/c1.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>
                    <div class="coordinator">
                        <img src="LandingPage/img/c2.jpg" alt="Coordinator Photo" class="coordinator-img">
                        <div class="coordinator-info">
                            <span class="name">Juan Dela Cruz</span><br>
                            <span class="parish">Coordinator at St. Peter Parish</span><br>
                            <span class="address">267 St. Peter Parish, Malabon City</span><br>
                            <span class="contact">Contact: (02)8928-8741 / peterparish@gmail.com</span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <?php include 'chatbotfolder/chatbot.php'; ?>

    <script src="LandingPage/js/toggle.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>