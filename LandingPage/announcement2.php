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
    <?php include("navbar.php"); ?>

    <section class="news-section">
        <a href="events.php" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="news-container">
            <div class="left-box">
                <div class="news-content">
                    <h2 class="news-title">DPPAM Hosts Successful Orientation for 2025 Election Volunteers</h2>
                    <div class="news-meta">
                        <p><i class="fas fa-calendar-alt"></i> February 10, 2025</p>
                        <p><i class="fas fa-user"></i> By Juan Dela Cruz</p>
                    </div>
                    <p>With the 2025 National and Local Elections just around the corner, DPPAM has successfully
                        conducted an orientation session for volunteers who will
                        play a crucial role in ensuring a smooth and fair election process. The orientation was attended
                        by both new and returning volunteers eager to contribute
                        their time and skills to support the democratic process.
                    </p>

                    <br>

                    <div class="gallery">
                        <img src="LandingPage/img/o-pic1.jpg" alt="">
                        <img src="LandingPage/img/o-pic2.jpg" alt="">
                        <img src="LandingPage/img/o-pic3.jpg" alt="">
                        <img src="LandingPage/img/o-pic4.jpg" alt="">
                        <img src="LandingPage/img/o-pic5.jpg" alt="">
                        <img src="LandingPage/img/o-pic1.jpg" alt="">
                        <img src="LandingPage/img/o-pic4.jpg" alt="">
                        <img src="LandingPage/img/o-pic3.jpg" alt="">
                    </div>
                    <br>

                    <p>The event provided a comprehensive overview of the various responsibilities volunteers will
                        undertake, including voter education, precinct monitoring,
                        and logistical support. Volunteers were briefed on the importance of their roles in maintaining
                        the integrity of the election, ensuring transparency,
                        and promoting voter participation. Detailed training was also provided on how to effectively
                        assist voters and manage election-day tasks to ensure
                        everything runs smoothly.
                    </p>

                    <br>

                    <p>A key highlight of the session was the introduction of digital tools and resources that
                        volunteers will use on election day, including mobile apps for
                        real-time reporting and QR code-based attendance tracking. Volunteers also had the chance to
                        meet their fellow team members and ask questions, fostering
                        a sense of community and collaboration.</p>

                    <br>

                    <p>“We are deeply grateful to all the volunteers who have committed to helping make this election
                        fair, transparent, and accessible to all citizens,” said a
                        DPPAM spokesperson. “Their dedication is critical in ensuring that every voter has the support
                        they need and that the election process is carried out
                        with integrity.”</p>

                    <br>

                    <p>As Election Day approaches, DPPAM volunteers are ready to step into action, ensuring that the
                        2025 elections are a success, and that every voice is heard.
                        The team is now fully trained and prepared to assist in making the upcoming elections as
                        seamless and inclusive as possible.</p>

                    <br>
                </div>
            </div>
        </div>
    </section>

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