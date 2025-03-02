<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries</title>
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


        <form action="/ContactUs/submit" method="POST" id="contactForm" style="display: none;">

            <div class="text-center">
                <img src="../img/icons8-ask-90.png" alt="Contact Logo">
                <h4>Chat to our team</h4>
                <p class="text-muted">Need help to something?</p>
            </div>

            <!--SUBJECT-->
            <div class="p-5 border">
                <input type="hidden" class="form-control mb-3" name="name" id="name" value="<?php echo htmlspecialchars(($sidebarinfo['FIRST_NAME'] ?? " ") . ' ' . ($sidebarinfo['SURNAME'] )); ?>">
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



        <!-- TABLE -->
        <div class="container-fluid p-5" id="inquiriesTable">
            <h4 class="mb-5">Inquiries</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Timestamp</th>
                            <th>Subject</th>
                            <th>Inquiry</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Time</td>
                            <td>Subject</td>
                            <td class="truncate-text">Inquiry</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>Subject</td>
                            <td class="truncate-text">Inquiry</td>
                            <td><button type="button" class="btn border-0 p-0" data-bs-toggle="modal" data-bs-target="#messageBoxModal"><span class="badge bg-success">Responded</span></button></td>
                        </tr>
                        <!-- More rows can be added dynamically -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL FOR REPLYING IN INQUIRIES -->
        <div class="modal fade" id="messageBoxModal" tabindex="-1" aria-labelledby="messageBoxModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-start align-items-start gap-2">
                                    <!-- IMAGE -->
                                    <div><img src="../../img/PPCRV LOGO.png" alt="Profile Picture" class="img-fluid" width="50px"></div>
                                    <!-- NAME, DATE, AND TIME -->
                                    <div class="d-flex flex-column">
                                        <h5>Vicmar M. Guzman</h5>
                                        <div class="d-flex flex-row gap-2">
                                            <span>Feb. 28, 2025</span>
                                            <span>08:44:55</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- REPLY CONTENT -->
                                <p class="my-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam quidem reiciendis quis at numquam aliquam facilis unde saepe ducimus. Eos?</p>
                            </div>

                        </div>

                        <form action="" method="POST" class="mt-4">
                            <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                                <input type="text" class="form-control" name="comment" id="comment"
                                    placeholder="Add reply..." required>
                                <button type="submit" class="btn border-0" name="comment-btn"><i
                                        class="bi bi-send send-icon"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- MESSAGE ICON BUTTON TO SHOW THE MESSAGE BOX -->
        <div class="container">
            <div class="position-fixed bottom-0 end-0 p-3">
                <button id="toggleFormBtn" type="button" class="btn btn-sm bg-primary text-light p-3 rounded-5 border-0">
                    <i id="toggleIcon" class="bi bi-pen-fill"></i>
                </button>
            </div>
        </div>






    </main>
    </div>
    </div>


    <!-- JavaScript to toggle the form -->
    <script>
        document.getElementById("toggleFormBtn").addEventListener("click", function() {
            var form = document.getElementById("contactForm");
            var table = document.getElementById("inquiriesTable");
            var icon = document.getElementById("toggleIcon");

            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "block";
                table.style.display = "none"; // Hide table
                icon.classList.remove("bi-pen-fill");
                icon.classList.add("bi-chat-dots-fill"); // Change to message box icon
            } else {
                form.style.display = "none";
                table.style.display = "block"; // Show table again
                icon.classList.remove("bi-chat-dots-fill");
                icon.classList.add("bi-pen-fill"); // Change back to pen icon
            }
        });
    </script>



    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>