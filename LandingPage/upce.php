<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPPAM - Volunteer</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include("navbar.php"); ?>
    
    <div class="volunteer-types">
        <div class="volunteer-types-container">
            <div class="volunteer-types-text-content">
                <h1>
                <span class="highlight-title">Unofficial Parallel Count Encoder (UPCE)</span>
                </h1>
                <p>
                    The Unofficial Parallel Count Encoder (UPCE) is a tool designed to process and encode data 
                    in parallel, improving efficiency and accuracy in counting and encoding tasks.
                </p>
                <p>
                    What they do:
                </p>
                <ul>
                    <li>Guides voters through the voting process.</li>
                    <li>Provides information on voting procedures.</li>
                    <li>Assists voters with special needs.</li>
                    <li>Answers questions and resolves concerns.</li>
                    <li>Ensures smooth voter flow at polling stations.</li>
                </ul>
            </div>

            <div class="image-section">
                <div class="image-container">
                    <div class="img-carousel">
                        <img src="img/whoweare1.jpg" class="active">
                        <img src="img/whoweare2.jpg">
                        <img src="img/whoweare3.jpg">
                        <img src="img/whoweare4.jpg">
                        <img src="img/whoweare5.jpeg">
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
    
    <?php # include 'chatbotfolder/chatbot.php';?>
    <?php include 'footer.php'; ?>

    <script src="js/carousel.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active'); 
    });
    </script>
</body>
</html>
