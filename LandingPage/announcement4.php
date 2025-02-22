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
                    <h2 class="news-title">Diocese of Kalookan Holds Disaster Preparedness Seminar in Malabon</h2>
                    <div class="news-meta">
                        <p><i class="fas fa-calendar-alt"></i> February 10, 2025</p>
                        <p><i class="fas fa-user"></i> By Juan Dela Cruz</p>
                    </div>
                    <p>On August 31, 2024, the Diocese of Kalookan Public and Political Affairs Ministry conducted a
                        Disaster Preparedness Seminar
                        at St. Clare of Assisi Parish in Longos, Malabon. The event gathered parishioners, volunteers,
                        parish leaders, and officials
                        from Barangay Longos and Barangay NBBS Dagat-Dagatan to enhance their knowledge and readiness
                        for potential disasters.</p>

                    <br>

                    <p>The seminar was facilitated by Mr. Aldrin Sevilla from the Malabon City Disaster Risk Reduction
                        and Management Office (DRRMO),
                        who shared essential disaster preparedness strategies, emergency response protocols, and risk
                        reduction measures. Topics included
                        early warning systems, evacuation procedures, first aid basics, and community-based disaster
                        response initiatives.</p>

                    <br>

                    <div class="gallery">
                        <img src="LandingPage/img/pics1.jpg" alt="">
                        <img src="LandingPage/img/pics2.jpg" alt="">
                        <img src="LandingPage/img/pics3.jpg" alt="">
                        <img src="LandingPage/img/pics4.jpg" alt="">
                        <img src="LandingPage/img/pics5.jpg" alt="">
                        <img src="LandingPage/img/pics6.jpg" alt="">
                        <img src="LandingPage/img/pics7.jpg" alt="">
                        <img src="LandingPage/img/pics8.jpg" alt="">
                    </div>
                    <br>

                    <p>Participants actively engaged in discussions and practical exercises, highlighting the importance
                        of collaboration between local government units,
                        church organizations, and the community in disaster risk reduction. The event underscored the
                        Diocese’s commitment to equipping communities with
                        the necessary skills and knowledge to respond effectively to natural calamities and emergencies.
                    </p>

                    <br>

                    <p>Through initiatives like this, the Diocese of Kalookan continues to promote resilience and
                        preparedness among its parish communities, fostering a
                        proactive approach to disaster management and community safety.</p>

                    <br>

                    <p>A key focus of the event was the collaboration between local government units, religious
                        institutions, and community organizations in strengthening
                        disaster resilience. By fostering active participation and knowledge-sharing, the Diocese of
                        Kalookan continues to support initiatives that promote
                        safety, preparedness, and effective emergency response within parish communities.</p>

                    <br>

                    <p>This seminar is part of the Diocese’s broader mission to empower communities in disaster risk
                        reduction, ensuring that parish leaders and volunteers
                        play a proactive role in safeguarding lives during natural disasters and emergencies</p>
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