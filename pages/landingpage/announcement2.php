<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPPAM - Volunteer</title>
    <link rel="stylesheet" href="LandingPage/css/news-events.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include("LandingPage/navbar.php"); ?>

    <section class="news-section">
        <a href="/events" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="news-container">
            <div class="left-box">
                <div class="news-content">
                    <h2 class="news-title">DPPAM-PPCRV Strengthens 2025 Election Preparations in Courtesy Call with COMELEC Navotas</h2>
                    <div class="news-meta">
                        <p><i class="fas fa-calendar-alt"></i> February 10, 2025</p>
                        <p><i class="fas fa-user"></i> By Juan Dela Cruz</p>
                    </div>
                    <p>The Diocese of Kalookan Public and Political Affairs Ministry (DPPAM) - Parish Pastoral Council for Responsible Voting (PPCRV) 
                        recently held a courtesy call with Atty. Gregoria A. Bonifacio, Election Officer IV of COMELEC Navotas City, to discuss election 
                        preparations for the upcoming 2025 national and local polls. The meeting highlighted the ongoing efforts of DPPAM-PPCRV in 
                        promoting voter education and empowerment, conducting training sessions for volunteers and poll watchers, and ensuring effective 
                        election monitoring.
                    </p> 
                        
                    <br>

                    <div class="gallery">
                        <img src="Landingpage/img/e1.jpg" alt="">
                        <img src="Landingpage/img/e2.jpg" alt="">
                        <img src="Landingpage/img/e3.jpg" alt="">
                        <img src="Landingpage/img/e4.jpg" alt="">
                        <img src="Landingpage/img/e5.jpg" alt="">
                        <img src="Landingpage/img/e6.jpg" alt="">
                        <img src="Landingpage/img/e7.jpg" alt="">
                        <img src="Landingpage/img/e8.jpg" alt="">
                    </div>                      
                    <br>  

                    <p>Both parties also tackled the challenges faced in the lead-up to the elections and shared strategies to overcome them, ensuring a fair and efficient electoral process. 
                        In attendance were key DPPAM-PPCRV representatives, including Bro. Angelito Bautista Jr. (Diocesan Coordinator), Bro. Pedie Ang (City District 1 Coordinator), 
                        Bro. Ross Palomer (City District 2 Coordinator), and Sis. Aileen Estudillo from San Lorenzo Ruiz Parish.
                    </p> 

                    <br>

                    <p>This collaboration reflects the continuous support and partnership between the Diocese of Kalookan and COMELEC, aiming to uphold the principles of clean, 
                        honest, accountable, meaningful, and peaceful (CHAMP) elections across the diocese. Both organizations remain committed to fostering transparency, empowering voters, 
                        and ensuring that the electoral process remains credible and fair for all citizens.</p>  

                    <br>  

                    <p>This meeting signifies the continued partnership and active cooperation between COMELEC and DPPAM-PPCRV in promoting clean, honest, accountable, meaningful, and 
                        peaceful (CHAMP) elections throughout the Diocese of Kalookan.</p>  

                    <br>  

                    <p>As the 2025 elections draw closer, both organizations are committed to working hand-in-hand to ensure an electoral process that upholds democratic values, 
                        empowers voters, and promotes active citizen participation.</p>  

                    <br>
                </div>
            </div>
        </div>
    </section>

    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>
    <?php include 'LandingPage/footer.php'; ?>

    <script src="LandingPage/js/carousel.js"></script>
    <script src="LandingPage/js/toggle.js"></script>

    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active'); 
    });
    </script>
</body>
</html>
