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

<?php if (!empty($announcements) && is_array($announcements)): ?>
    <section class="news-section">
        <a href="/events" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="news-container">
            <div class="left-box">
                <div class="news-content">
                    <h2 class="news-title">
                        <?php echo isset($announcements['announcement_title']) ? htmlspecialchars($announcements['announcement_title']) : 'No Title Available'; ?>
                    </h2>
                    <div class="news-meta">
                        <p><i class="fas fa-calendar-alt"></i>
                            <?php echo isset($announcements['announcement_date']) ? htmlspecialchars($announcements['announcement_date']) : 'Date not available'; ?>
                        </p>
                        <p><i class="fas fa-user"></i>
                            <?php echo isset($announcements['announcement_by']) ? htmlspecialchars($announcements['announcement_by']) : 'Author not available'; ?>
                        </p>
                    </div>
                    <p>
                        <?php echo isset($announcements['announcement_desc']) ? nl2br(htmlspecialchars($announcements['announcement_desc'])) : 'No description available.'; ?>
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
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <p>Announcement not found.</p>
<?php endif; ?>





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
