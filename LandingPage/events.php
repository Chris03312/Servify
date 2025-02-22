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
    <?php include("navbar.php"); ?>
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
                <div class="box">
                    <div class="image-container">
                        <img src="LandingPage/img/event1.jpeg" alt="Volunteer 1">
                    </div>
                    <h3>2025 National and Local Elections: Volunteers Driving Change and Ensuring Fairness in Action
                    </h3>
                    <!-- <p>Volunteers are vital in ensuring a smooth, fair, and transparent election process 
                        by supporting voter education, precinct monitoring, and logistical tasks, helping 
                        make every vote count.</p> -->
                    <a href="announcement1.php" class="btn">Read More</a>
                </div>
                <div class="box">
                    <div class="image-container">
                        <img src="LandingPage/img/event2.jpg" alt="Volunteer 2">
                    </div>
                    <h3>DPPAM Hosts Successful Orientation for 2025 Election Volunteers</h3>
                    <!-- <p>DPPAM trained volunteers for the 2025 elections, preparing them for key roles 
                        in ensuring a smooth and fair voting process.  Their efforts will help ensure 
                        transparency and voter engagement.</p> -->
                    <a href="announcement2.php" class="btn">Read More</a>
                </div>
                <div class="box">
                    <div class="image-container">
                        <img src="LandingPage/img/event3.jpg" alt="Volunteer 1">
                    </div>
                    <h3>Ethical Leadership and Good Governance Seminar 2024: Empowering Leaders in Malabon</h3>
                    <!-- <p>The Ethical Leadership and Good Governance Seminar 2024, hosted by DPPAM in Malabon, empowered community 
                        leaders and barangay officials through expert talks by Prof. Ryan Aguinaldo and Prof. Alexander Gonzales 
                        of PUP.</p> -->
                    <a href="announcement3.php" class="btn">Read More</a>
                </div>
                <div class="box">
                    <div class="image-container">
                        <img src="LandingPage/img/event4.jpg" alt="Volunteer 2">
                    </div>
                    <h3>Disaster Preparedness Seminar Held by Diocese of Kalookan in Malabon Parish Church</h3>
                    <!-- <p>On August 31, 2024, the Diocese of Kalookan held a Disaster Preparedness Seminar at 
                        St. Clare of Assisi Parish in Malabon, with Mr. Aldrin Sevilla of the Malabon City 
                        DRRMO discussing disaster readiness. </p> -->
                    <a href="announcement4.php" class="btn">Read More</a>
                </div>
                <div class="box">
                    <div class="image-container">
                        <img src="LandingPage/img/event5.jpg" alt="Volunteer 2">
                    </div>
                    <h3>DPPAM Launches Voters' Education and Empowerment Trainers' Training in Kalookan</h3>
                    <!-- <p>On July 8, 2023, the Diocese of Kalookan's Public & Political Affairs Ministry trained over 50 parish volunteers for the Voters' 
                        Education and Empowerment Program, supporting the 2023 Barangay and SK Elections. </p> -->
                    <a href="announcement5.php" class="btn">Read More</a>
                </div>
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