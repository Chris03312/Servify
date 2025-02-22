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
                    <h2 class="news-title">2025 National and Local Elections: Volunteers in Action</h2>
                    <div class="news-meta">
                        <p><i class="fas fa-calendar-alt"></i> February 10, 2025</p>
                        <p><i class="fas fa-user"></i> By Juan Dela Cruz</p>
                    </div>
                    <p>With the 2025 National and Local Elections fast approaching, thousands of dedicated volunteers
                        from across the country are preparing to ensure
                        a clean, fair, and transparent voting process. The Parish Pastoral Council for Responsible
                        Voting (PPCRV) and other civic organizations have
                        launched intensive training programs to equip volunteers with essential skills for election day.
                    </p>

                    <br>

                    <p>These efforts aim to safeguard electoral integrity by mobilizing poll watchers, voter assistance
                        desks, and IT support teams. Volunteers will be
                        stationed at various precincts nationwide, monitoring vote counting and reporting any
                        irregularities in real time.</p>

                    <br>

                    <div class="gallery">
                        <img src="LandingPage/img/e-pic1.jpg" alt="">
                        <img src="LandingPage/img/e-pic2.jpg" alt="">
                        <img src="LandingPage/img/e-pic3.jpg" alt="">
                        <img src="LandingPage/img/e-pic4.jpg" alt="">
                        <img src="LandingPage/img/e-pic5.jpg" alt="">
                        <img src="LandingPage/img/e-pic6.jpg" alt="">
                        <img src="LandingPage/img/e-pic7.jpg" alt="">
                        <img src="LandingPage/img/e-pic8.jpg" alt="">
                    </div>
                    <br>

                    <p>The active participation of volunteers plays a crucial role in upholding democracy. Their
                        commitment ensures that every vote is counted accurately,
                        fostering trust in the electoral process and reinforcing the importance of free and fair
                        elections.</p>

                    <br>

                    <p>According to PPCRV officials, more than 500,000 volunteers are expected to participate
                        nationwide, covering thousands of polling precincts.
                        These volunteers undergo specialized training in election monitoring, digital reporting, and
                        conflict resolution. Their role is to act as the
                        citizen’s watchdog, ensuring that elections remain transparent and credible.</p>

                    <br>

                    <p>In addition to on-ground monitoring, PPCRV is also enhancing its digital reporting system to
                        allow volunteers to submit real-time data
                        regarding voter turnout, potential irregularities, and other critical election-related updates.
                        This will help authorities respond quickly
                        to any concerns and ensure a smooth election process.</p>

                    <br>

                    <p>Beyond election day, volunteer efforts will continue in the post-election period. Teams will be
                        deployed to verify election returns and
                        assist in the transparency audit process, which helps confirm that all votes are properly
                        recorded and counted. This post-election review
                        process is a key safeguard against potential fraud and discrepancies.</p>

                    <br>

                    <p>As the nation prepares for this crucial democratic exercise, the dedication and vigilance of
                        election volunteers stand as a testament to
                        the power of civic engagement. Their efforts not only protect the integrity of the ballot but
                        also strengthen public confidence in the
                        electoral system. With the growing importance of volunteerism in elections, organizations like
                        PPCRV continue to encourage citizens to take
                        an active role in safeguarding democracy.</p>
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