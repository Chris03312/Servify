<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servify | DPPAM - Contact Us</title>
    <link rel="stylesheet" href="DPPAM-website/css/contactus.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php"); ?>
    <div class="contactus" id="contactus">
        <div class="contactus-container">
            <div class="contactus-leftsection">
                <h3>VISIT THE NEAREST PARISH IN YOUR AREA FOR MORE QUESTIONS.</h3>
                <p><span>Contact:</span> A. (02) 8288-9116</p>
                <p><span>Mail:</span> example_email@gmail.com</p>
                <img src="DPPAM-website/img/contactus-logo.png" alt="ddpam-logo">
            </div>
            <div class="contactus-rightsection">
                <h2 class="form-header">LEAVE YOUR MESSAGE HERE</h2>
                <p class="form-text">We really appreciate you taking the time to get in touch. Please fill in the form
                </p>
                <form action="">
                    <input type="email" id="form-input-email" name="form-input-email" placeholder="Your Email">
                    <input type="text" id="form-input-name" name="form-input-name" placeholder="Name">
                    <textarea name="form-textarea" id="form-textarea" rows="20" cols="100"
                        placeholder="Write your message here..." style="resize: none;"></textarea>
                    <button type="submit" name="form-submit" id="form-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("LandingPage/footer.php"); ?>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function () {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('active');
        });
    </script>
</body>

</html>