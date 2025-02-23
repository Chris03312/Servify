<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPPAM - Volunteer</title>
    <link rel="stylesheet" href="LandingPage/css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include("LandingPage/navbar.php"); ?>
    
    <div class="volunteer-types">
        <div class="volunteer-types-container">
            <div class="volunteer-types-text-content">
                <h1>
                <span class="highlight-title">Election Monitors/Observers</span>
                </h1>
                <p>
                Neutral individuals or groups who observe the election process to ensure it is fair, 
                transparent, and free from irregularities. They monitor everything from polling procedures to vote counting.
                </p>
                <p>
                    What they do:
                </p>
                <ul>
                    <li>Observe voting and counting processes.</li>
                    <li>Ensure election rules are followed.</li>
                    <li>Report irregularities or violations.</li>
                    <li>Maintain neutrality during the election.</li>
                    <li>Provide independent assessments of election integrity.</li>
                </ul>
                <p>
                    Qualifications:
                </p>
                <ul>
                    <li>Strong understanding of electoral laws and procedures.</li>
                    <li>Impartial and non-partisan stance.</li>
                    <li>Excellent observational and reporting skills.</li>
                    <li>Commitment to fairness and transparency.</li>
                    <li>Ability to remain neutral under pressure.</li>
                </ul>
            </div>

            <div class="image-section">
                <div class="image-container">
                    <div class="img-carousel">
                        <img src="Landingpage/img/whoweare1.jpg" class="active">
                        <img src="Landingpage/img/whoweare2.jpg">
                        <img src="Landingpage/img/whoweare3.jpg">
                        <img src="Landingpage/img/whoweare4.jpg">
                        <img src="Landingpage/img/whoweare5.jpeg">
                    </div>
                </div>

                <div class="carousel-controls">
                    <div class="nav-buttons">
                        <button class="prev-btn">&lt;</button> 
                        <button class="next-btn">&gt;</button> 
                    </div>
                    <div id="dots-nav"></div> 
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>
    <?php include 'LandingPage/footer.php'; ?>

    <script src="LandingPage/js/carousel.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active'); 
    });
    </script>
</body>
</html>
