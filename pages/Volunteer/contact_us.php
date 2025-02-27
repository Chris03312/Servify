<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/volunteer_dashboard.css">
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--BOOTSTRAP CDN ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Font awesome CDN ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php
    include('includes/volunteer_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">


        <form action="/ContactUs/submit" method="POST">

            <div class="text-center">
                <img src="../img/icons8-ask-90.png" alt="Contact Logo">
                <h4>Chat to our team</h4>
                <p class="text-muted">Need help to something?</p>
            </div>

            <!--SUBJECT-->
            <div class="p-5 border">
                <input type="text" class="form-control mb-3" name="subject" id="subject" placeholder="Add Subject"
                    required>
                <textarea name="message" id="message" class="form-control mb-3" rows="5"
                    placeholder="Type your concerns/message here" required style="resize: none;"></textarea>

                <div class="d-flex flex-row justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary px-5" data-bs-toggle="modal"
                        data-bs-target="#messageSent">Submit</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="messageSent" tabindex="-1" aria-labelledby="messageSentLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary p-2">
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="../img/icons8-chat-message-sent-90.png" alt="Message Sent Logo">
                                <h6 class="text-primary">Message sent successfully!</h6>

                                <p class="text-center">
                                    Thank you for rearching out to us. We've received your message and will get back to
                                    you
                                    shortly. <strong>Please check your email for our reply.</strong>
                                </p>

                                <div class="d-flex flex-row justify-content-around align-items-center mt-3">
                                    <button type="button" class="btn btn-primary px-5"
                                        data-bs-dismiss="modal">Omki</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>






    </main>
    </div>
    </div>





    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>