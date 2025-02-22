<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servify | DPPAM - Volunteer</title>
    <link rel="stylesheet" href="LandingPage/css/resources.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php"); ?>
    <section class="resource">
        <div class="container">
            <div class="resource-content">
                <div class="resource-header">
                    <h1><span class="bold">GENERAL</span> <br> <span class="blue">RESOURCES</span></h1>
                </div>
                <div class="resource-text">
                    <p class="description">
                        Discover essential volunteer resources, guides, and tools to support your role,
                        enhance your experience and help you contribute effectively to our mission.
                    </p>
                </div>
            </div>
            <div id="card-area">
                <div class="wrapper">
                    <div class="box-area">
                        <div class="box">
                            <img src="LandingPage/img/upc.jpg" alt="">
                            <div class="overlay">
                                <h1>Election Guidelines</h1>
                                <p>description</p>
                                <a href="#">Learn More</a>
                            </div>
                        </div>
                        <div class="box">
                            <img src="LandingPage/img/upc.jpg" alt="">
                            <div class="overlay">
                                <h1>Volunteer's Guidelines</h1>
                                <p>description</p>
                                <a href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>
    <?php include("footer.php"); ?>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>