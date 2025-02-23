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
                <span class="highlight-title">Voter's Assistance Desk (VAD)</span>
                </h1>
                <p>
                The Voter's Assistance Desk (VAD) is a team that helps voters at polling stations by providing information, guidance on the voting process, and 
                assistance for those with special needs or questions.
                </p>
                <p>
                    What they do:
                </p>
                <ul>
                    <li>Manages the encoding of multiple datasets at the same time to reduce processing time.</li>
                    <li>Automatically checks for discrepancies and ensures reliable data encoding.</li>
                    <li>Updates information in real-time for faster reporting and decision-making.</li>
                    <li>Verifies consistency and prevents data errors during the encoding process.</li>
                </ul>
                <p>Qualifications:</p>
                <ul>
                    <li>Strong analytical and data management skills.</li>
                    <li>Proficiency with data encoding software and tools.</li>
                    <li>Attention to detail to ensure accuracy.</li>
                    <li>Ability to work under pressure and meet deadlines.</li>
                    <li>Commitment to confidentiality and data security.</li>
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
