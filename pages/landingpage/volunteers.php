<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPPAM - Volunteer</title>
    <link rel="stylesheet" href="Landingpage/css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php include("LandingPage/navbar.php"); ?>

<?php if (!empty($volunteers)): ?>
        <?php foreach ($volunteers as $volunteer): ?>
            <section id="<?php echo htmlspecialchars($volunteer['MISSION_DESCRIPTION'] ?? ''); ?>">
                <div class="volunteer-types border border-2">
                    <div class="volunteer-types-container">
                        <div class="volunteer-types-text-content">
                            <h1>
                                <span class="highlight-title">
                                    <?php echo htmlspecialchars($volunteer['MISSION_NAME'] ?? 'Volunteer Type Not Found'); ?>
                                </span>
                            </h1>
                            <p>
                                <?php echo htmlspecialchars($volunteer['MISSION_DESC'] ?? 'No description available for this role.'); ?>
                            </p>

                            <p class="desc">What they do:</p>
                            <ul>
                                <?php 
                                $works = isset($volunteer['MISSION_WORK']) ? explode(',', $volunteer['MISSION_WORK']) : []; 
                                foreach ($works as $work): 
                                ?>
                                    <li><?php echo htmlspecialchars(trim($work)); ?></li>
                                <?php endforeach; ?>
                            </ul>

                            <p class="desc">Qualifications:</p>
                            <ul>
                                <?php 
                                $qualifications = isset($volunteer['MISSION_QUALIFICATION']) ? explode(',', $volunteer['MISSION_QUALIFICATION']) : []; 
                                foreach ($qualifications as $qualification): 
                                ?>
                                    <li><?php echo htmlspecialchars(trim($qualification)); ?></li>
                                <?php endforeach; ?>
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
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No volunteer information found for the selected mission.</p>
    <?php endif; ?>

    <?php include 'Landingpage/chatbotfolder/chatbot.php'; ?>
    <?php include 'Landingpage/footer.php'; ?>

    <script src="Landingpage/js/carousel.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>

</body>
</html>
