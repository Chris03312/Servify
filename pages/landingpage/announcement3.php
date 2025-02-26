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
<?php include("LandingPage/navbar.php"); ?>

    <section class="news-section">
        <a href="/events" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="news-container">
            <div class="left-box">
                <div class="news-content">
                    <h2 class="news-title">DPPAM Conducts Ethical Leadership and Good Governance Seminar in Malabon</h2>
                    <div class="news-meta">
                        <p><i class="fas fa-calendar-alt"></i> February 10, 2025</p>
                        <p><i class="fas fa-user"></i> By Juan Dela Cruz</p>
                    </div>
                    <p>The Diocesan Public and Political Affairs Ministry (DPPAM) is currently hosting the Ethical Leadership and Good Governance Seminar 2024 at San Bartolome 
                        Parish in Malabon City. The seminar, aimed at strengthening leadership skills and promoting ethical governance, features insightful lectures by Prof. 
                        Ryan Aguinaldo and Prof. Alexander Gonzales, both respected professors from the Polytechnic University of the Philippines (PUP).</p> 
                        
                    <br>
                    
                    <p>The event has gathered a diverse group of barangay officials and community leaders, with Punong Barangay Doming Elape of NBBS Dagat-Dagatan, Navotas 
                        in attendance. The seminar focuses on practical approaches to effective governance, enhancing transparency, accountability, and integrity within local 
                        government units.</p> 
                        
                    <br>

                    <div class="gallery">
                        <img src="Landingpage/img/pic1.jpg" alt="">
                        <img src="Landingpage/img/pic2.jpg" alt="">
                        <img src="Landingpage/img/pic3.jpg" alt="">
                        <img src="Landingpage/img/pic4.jpg" alt="">
                        <img src="Landingpage/img/pic5.jpg" alt="">
                        <img src="Landingpage/img/pic6.jpg" alt="">
                        <img src="Landingpage/img/pic7.jpg" alt="">
                        <img src="Landingpage/img/pic8.jpg" alt="">
                    </div>                    
                    <br>  

                    <p>Attendees are being equipped with valuable knowledge and skills to promote good governance and foster ethical leadership within their respective 
                        communities. This initiative is part of DPPAM's ongoing commitment to supporting and empowering local leaders in the mission for a more just 
                        and responsible society.</p>  

                    <br>  

                    <p>As the seminar progresses, participants are engaging in meaningful discussions and sharing insights on how they can implement these principles 
                        in their communities, furthering DPPAM’s goal of promoting sustainable and transparent governance across the region.</p>  

                    <br>  

                    <p>A diverse group of barangay officials, community leaders, and local representatives are participating, including Punong Barangay Doming Elape of 
                        NBBS Dagat-Dagatan, Navotas. The event fosters discussions on real-world governance challenges, empowering attendees with actionable solutions 
                        to enhance public service delivery and uphold good governance principles.</p>  

                    <br>  

                    <p>Throughout the seminar, participants are actively engaging in interactive workshops, case studies, and open forums, sharing experiences and best 
                        practices in community leadership and ethical governance. These collaborative discussions highlight the importance of moral integrity, participatory 
                        governance, and civic engagement in building a just and accountable society.</p>  

                    <br>  

                    <p>This event is part of DPPAM’s broader advocacy for ethical leadership and community empowerment, reinforcing its mission to develop principled leaders 
                        who serve with honesty, transparency, and a commitment to social justice. By equipping local leaders with the right tools and knowledge, DPPAM continues 
                        to pave the way for sustainable and effective governance across the Diocese of Kalookan.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'LandingPage/chatbotfolder/chatbot.php'; ?>
    <?php include 'LandingPage/footer.php'; ?>

    <script src="LandingPage/js/carousel.js"></script>
    <script src="LandingPage/js/toggle.js"></script>
    
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active'); 
    });
    </script>
</body>
</html>
