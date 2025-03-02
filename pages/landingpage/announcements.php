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

<?php if (!empty($announcement)): ?>
    <section class="news-section">
        <div class="news-container">
            <div class="left-box">
                <div class="news-content">
                    <h2 class="news-title"><?php echo htmlspecialchars($announcement['announcement_title']); ?></h2>
                    <p class="news-meta"><i class="fas fa-calendar-alt"></i> 
                        <?php echo htmlspecialchars($announcement['announcement_date'] ?? 'Date not available'); ?>
                    </p>
                    <p><?php echo nl2br(htmlspecialchars($announcement['announcement_description'] ?? 'No description available.')); ?></p>
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
