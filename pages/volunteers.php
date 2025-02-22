<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servify | DPPAM - Volunteer</title>
    <link rel="stylesheet" href="LandingPage/css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include("LandingPage/navbar.php"); ?>

    <?php if ($volunteers): ?>
        <?php foreach ($volunteers as $volunteer): ?>
            <section id="<?php echo $volunteer['MISSION_DESCRIPTION'] ?? ' '; ?>">
                <div class="volunteer-types border border-2">
                    <div class="volunteer-types-container">
                        <div class="volunteer-types-text-content">
                            <h1>
                                <span
                                    class="highlight-title"><?php echo $volunteer['MISSION_NAME'] . ' ' . $volunteer['MISSION_DESCRIPTION'] ?? ' '; ?>
                                </span>
                            </h1>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita esse quidem earum facilis.
                                Quidem, quas rem ullam eos iste illum!
                            </p>
                            <p>
                                What they do:
                            </p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam totam sequi laboriosam cumque
                                    ipsa aperiam ea autem dolore? Hic in similique perferendis soluta, sed provident minus
                                    doloribus officia ullam vitae.</li>
                                <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus blanditiis libero
                                    qui illum error sunt reprehenderit at nulla provident dolorem?
                                </li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque molestias nam accusantium non
                                    laudantium quam, aperiam rem aliquid ex ea!.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque rerum cumque minima adipisci
                                    eos voluptatem!</li>
                            </ul>
                        </div>

                        <div class="image-section">
                            <div class="image-container">
                                <div class="img-carousel">
                                    <img src="LandingPage/img/whoweare1.jpg" class="active">
                                    <img src="LandingPage/img/whoweare2.jpg">
                                    <img src="LandingPage/img/whoweare3.jpg">
                                    <img src="LandingPage/img/whoweare4.jpg">
                                    <img src="LandingPage/img/whoweare5.jpg">
                                    <img src="LandingPage/img/whoweare6.jpg">
                                </div>
                            </div>

                            <div class="carousel-controls">
                                <div class="nav-buttons">
                                    <button class="prev-btn">&lt;</button> <!-- Left Arrow -->
                                    <button class="next-btn">&gt;</button> <!-- Right Arrow -->
                                </div>
                                <div id="dots-nav"></div> <!-- Dots Navigation -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <section id="#">
            <div class="volunteer-types">
                <div class="volunteer-types-container">
                    <div class="volunteer-types-text-content">
                        <h1>
                            <span class="highlight-title">Unofficial Parallel Count Encoder (UPCE)</span>
                        </h1>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita esse quidem earum facilis.
                            Quidem, quas rem ullam eos iste illum!
                        </p>
                        <p>
                            What they do:
                        </p>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam totam sequi laboriosam cumque
                                ipsa aperiam ea autem dolore? Hic in similique perferendis soluta, sed provident minus
                                doloribus officia ullam vitae.</li>
                            <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus blanditiis libero
                                qui illum error sunt reprehenderit at nulla provident dolorem?
                            </li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque molestias nam accusantium non
                                laudantium quam, aperiam rem aliquid ex ea!.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque rerum cumque minima adipisci
                                eos voluptatem!</li>
                        </ul>
                    </div>

                    <div class="image-section">
                        <div class="image-container">
                            <div class="img-carousel">
                                <img src="LandingPage/img/whoweare1.jpg" class="active">
                                <img src="LandingPage/img/whoweare2.jpg">
                                <img src="LandingPage/img/whoweare3.jpg">
                                <img src="LandingPage/img/whoweare4.jpg">
                                <img src="LandingPage/img/whoweare5.jpg">
                                <img src="LandingPage/img/whoweare6.jpg">
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
    <?php endif; ?>

    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>
    <?php include 'LandingPage/footer.php'; ?>

    <script src="LandingPage/js/carousel.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>