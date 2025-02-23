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
                <span class="highlight-title">Polling Stations Volunteers (PSV)</span>
                </h1>
                <p>
                Volunteers who help manage the flow of voters at polling stations, guide people to their assigned areas, 
                and ensure that voting procedures are followed smoothly and efficiently.
                </p>
                <p>
                    What they do:
                </p>
                <ul>
                    <li>Assist voters in finding their designated areas.</li>
                    <li>Manage voter queues and flow.</li>
                    <li>Assists voters with special needs.</li>
                    <li>Ensure adherence to voting protocols.</li>
                    <li>Support election officials with logistical tasks.</li>
                </ul>

                <p>Qualifications:</p>
                <ul>
                    <li>Good communication and interpersonal skills.</li>
                    <li>Ability to handle large crowds calmly and efficiently.</li>
                    <li>Basic understanding of voting procedures.</li>
                    <li>Physically fit to assist with logistical tasks.</li>
                    <li>Commitment to maintaining a neutral and supportive role.</li>
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
