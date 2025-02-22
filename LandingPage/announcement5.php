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
                    <h2 class="news-title">Diocese of Kalookan Empowers Parish Volunteers Through Voters' Education
                        Training</h2>
                    <div class="news-meta">
                        <p><i class="fas fa-calendar-alt"></i> February 10, 2025</p>
                        <p><i class="fas fa-user"></i> By Juan Dela Cruz</p>
                    </div>
                    <p>OOn July 8, 2023, the Public & Political Affairs Ministry of the Diocese of Kalookan conducted
                        the first session of the Voters' Education
                        and Empowerment (VEE) Trainers' Training, equipping over 50 parish volunteers with the necessary
                        knowledge and skills to lead voters'
                        education initiatives in their respective parishes.
                    </p>

                    <br>

                    <p>The training is part of the Diocesan Public and Political Affairs Ministry (DPPAM) - Parish
                        Pastoral Council for Responsible Voting (PPCRV)
                        efforts to strengthen voter education and promote responsible electoral participation,
                        particularly in preparation for the 2023 Barangay and
                        Sangguniang Kabataan Elections.
                    </p>

                    <br>

                    <div class="gallery">
                        <img src="LandingPage/img/s-pic1.jpg" alt="">
                        <img src="LandingPage/img/s-pic2.jpg" alt="">
                        <img src="LandingPage/img/s-pic3.jpg" alt="">
                        <img src="LandingPage/img/s-pic4.jpg" alt="">
                        <img src="LandingPage/img/s-pic5.jpg" alt="">
                        <img src="LandingPage/img/s-pic6.jpg" alt="">
                        <img src="LandingPage/img/s-pic7.jpg" alt="">
                        <img src="LandingPage/img/s-pic8.jpg" alt="">
                    </div>
                    <br>

                    <p>Participants underwent discussions on electoral processes, voter rights and responsibilities, and
                        community engagement strategies to ensure that
                        parish-led VEE programs effectively guide voters in making informed decisions. By empowering
                        local volunteers, the Diocese of Kalookan aims to
                        foster a culture of active and responsible citizenship, reinforcing its commitment to fair,
                        transparent, and participatory elections.</p>

                    <br>

                    <p>The initiative underscores the Diocese’s dedication to upholding democratic values and ensuring
                        that parish communities play an active role in
                        nation-building through voter awareness and empowerment.</p>

                    <br>

                    <p>The training also emphasized the importance of combating misinformation and promoting ethical
                        voting practices within communities. With this initiative,
                        the Diocese of Kalookan continues to empower faith-driven leaders in guiding voters toward a
                        more informed and responsible electorate.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>
    <?php include 'LandingPage/footer.php'; ?>

    <script src="LandingPage/js/sample.js"></script>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>