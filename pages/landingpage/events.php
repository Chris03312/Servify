<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servify | DPPAM - Events</title>
    <link rel="stylesheet" href="LandingPage/css/news-events.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
<?php include("LandingPage/navbar.php"); ?>
    <div class="events-container">
        <div class="content-container">
            <div class="title-container">
                <h1>
                <span class="highlight-black">Stay Updated with the Latest </span>
                <span class="highlight-red">Events </span>
                <span class="highlight-black">and </span>
                <span class="highlight-blue">Announcements </span>
                </h1>
                <p>Get the latest updates, important announcements, and upcoming events 
                    related to the 2025 Election Volunteer Program. Stay informed about 
                    orientation schedules, training sessions, volunteer activities, and other 
                    key events happening in your community.</p>
            </div>

            <div class="boxes-container">
                <?php if (!empty($events)): ?>
                    <?php foreach ($events as $event): ?>
                        <div class="box">
                            <div class="image-container">
                                <img src="Landingpage/img/<?php echo htmlspecialchars($event['announcement_image'] ?? 'default.jpg'); ?>" 
                                    alt="<?php echo htmlspecialchars($event['announcement_title']); ?>">
                            </div>
                            <h3><?php echo htmlspecialchars($event['announcement_title']); ?></h3>
                            <a href="/announcements?announcement=<?php echo urlencode($event['announcement_title']); ?>" class="btn">Read More</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No events available.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>


    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>
    <?php include 'LandingPage/footer.php'; ?>

    <script src="LandingPage/js/toggle.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>