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

    <div class="whoarewe">
        <div class="whoarewe-container">
            <!-- Text Content -->
            <div class="whoarewe-text-content">
                <h1>
                    <span class="highlight-red">WHO</span>
                    <span class="highlight-black">WE</span>
                    <span class="highlight-blue">ARE?</span>
                </h1>
                <p>
                    <span class="highlight-smallblue">DPPAM - Diocese of Caloocan Public and Political Affairs
                        Ministry</span>
                    is an organization dedicated to empowering individuals to actively participate in the electoral
                    process.
                </p>
                <br>
                <p>
                    We focus on promoting transparency, accountability, and democratic values through various programs
                    and initiatives.
                    By fostering a community of engaged citizens, we aim to ensure free, fair, and credible elections
                    that reflect the
                    true will of the people.
                </p>
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

    <div class="content-container">
        <img src="LandingPage/img/logo.jpg" alt="PPCRV Image" class="left-image">
        <div class="additional-info">
            <p>
                The Three (3) major symbols of the Coat of Arms represent the three jurisdictions that comprise the
                Diocese of Kalookan; namely:
            </p>
            <br>
            <p>
                The Monument at the very center represents Caloocan City from which the name of the Diocese was derived;
            </p>
            <br>
            <p>
                The Fishes on the right represent the City of Malabon; and
            </p>
            <br>
            <p>
                The Banca on the left represents the Municipality of Navotas
            </p>
            <br>
            <p>
                The <span class="red">red color</span> of the lower half of the insignia symbolizes not only the valor
                of martyrdom of our Philippine heroes with which Kalookan
                is noted for, but, more importantly, the sanguine ardor, fortitude and love of the Diocese of Kalookan
                in the fulfillment of her mission.
            </p>
            <br>
            <p>
                The <span class="blue">blue color</span> of the upper half of the insignia denotes the Marian Character
                of the diocesan ministry.
            </p>
            <br>
            <p>
                The <span class="brown">Cross</span> on the top of the insignia signifies the centrality of Jesus Christ
                in the life and function of the entire Diocese of Kalookan while
                the <span class="brown">dove</span>, hovering above the monument, represents the Holy Spirit sanctifying
                the lives of the People of God – the bishop, priests, religious men and women and the laity – in the new
                diocese.
            </p>
            <br>
            <p>
                The theme, the latin words: <span class="red">“DUC IN ALTUM”</span> (Lk. 5:4) – “put out into the deep”
                – binds together all the elements of the insignia and captures the spirit and direction of the Diocese
                of Kalookan in the
                Third Christian Millennium.
            </p>
            <br>
            <p>
                The new diocese, powered by the love of Jesus and the grace of the Holy Spirit, sails forth with faith
                and courage, accompanied by Mary, to casts its net so that a bountiful harvest maybe reaped for the
                Glory
                of God and the salvation of souls.
            </p>
        </div>
    </div>

    <?php include 'LandingPage/footer.php'; ?>
    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>


    <script src="LandingPage/js/carousel.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>