<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="../css/volunteer_dashboard.css">
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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


        <h5>Announcements</h5>

        <div class="border mb-2 p-3 rounded">
            <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-3">
                <!-- PROFILE PIC, NAME AND DATE POSTED -->
                <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                <div class="d-flex flex-column">
                    <span><strong>Vicmar M. Guzman</strong></span>
                    <span class="text-muted">21 mins. ago</span>
                </div>
            </div>

            <!-- ANNOUNCEMENT TEXT -->
            <p>Assignment #1</p>

            <!-- COMMENT BUTTON -->
            <div>
                <button type="button" class="btn btn-sm see-comment-btn border-0">See comment</button>
            </div>

            <!-- COMMENT SECTION -->
            <div class="comment-section border p-3 rounded mt-2" style="display: none;">
                <div class="d-flex flex-row justify-content-start align-items-start gap-2 mb-3">
                    <!-- PROFILE PIC, NAME AND DATE COMMENT -->
                    <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                    <div class="d-flex flex-column">
                        <div>
                            <span><strong>Vicmar M. Guzman</strong></span>
                            <small class="text-muted">21 mins. ago</small>
                        </div>
                        <div>
                            <p>Assignment agad hayup</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-start align-items-start gap-2 mb-3">
                    <!-- PROFILE PIC, NAME AND DATE COMMENT -->
                    <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                    <div class="d-flex flex-column">
                        <div>
                            <span><strong>Vicmar M. Guzman</strong></span>
                            <small class="text-muted">25 mins. ago</small>
                        </div>
                        <div>
                            <p>AYAAAAWW KO NAAAAAAA</p>
                        </div>
                    </div>
                </div>

                <!-- COMMENT BOX -->
                <form action="">
                    <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                        <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                        <input type="text" class="form-control" name="comment" id="comment" placeholder="Add comment..." required>
                        <button type="submit" class="btn border-0" name="comment-btn"><i class="bi bi-send send-icon"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="border mb-2 p-3 rounded">
            <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-3">
                <!-- PROFILE PIC, NAME AND DATE POSTED -->
                <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                <div class="d-flex flex-column">
                    <span><strong>Vicmar M. Guzman</strong></span>
                    <span class="text-muted">21 mins. ago</span>
                </div>
            </div>

            <!-- ANNOUNCEMENT TEXT -->
            <p>Announcementtttttttttt</p>

            <!-- COMMENT BUTTON -->
            <div>
                <button type="button" class="btn btn-sm see-comment-btn border-0">See comment</button>
            </div>

            <!-- COMMENT SECTION -->
            <div class="comment-section border p-3 rounded mt-2" style="display: none;">
                <div class="d-flex flex-row justify-content-start align-items-start gap-2 mb-3">
                    <!-- PROFILE PIC, NAME AND DATE COMMENT -->
                    <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                    <div class="d-flex flex-column">
                        <div>
                            <span><strong>Vicmar M. Guzman</strong></span>
                            <small class="text-muted">21 mins. ago</small>
                        </div>
                        <div>
                            <p>Sukooo na koooooooooo</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-start align-items-start gap-2 mb-3">
                    <!-- PROFILE PIC, NAME AND DATE COMMENT -->
                    <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                    <div class="d-flex flex-column">
                        <div>
                            <span><strong>Vicmar M. Guzman</strong></span>
                            <small class="text-muted">25 mins. ago</small>
                        </div>
                        <div>
                            <p>AYAAAAWW KO NAAAAAAA</p>
                        </div>
                    </div>
                </div>

                <!-- COMMENT BOX -->
                <form action="">
                    <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                        <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                        <input type="text" class="form-control" name="comment" id="comment" placeholder="Add comment..." required>
                        <button type="submit" class="btn border-0" name="comment-btn"><i class="bi bi-send send-icon"></i></button>
                    </div>
                </form>
            </div>
        </div>



        <script>
          document.addEventListener("DOMContentLoaded", () => {
    // Toggle comment sections
    const commentButtons = document.querySelectorAll(".see-comment-btn");

    commentButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const commentSection = button.closest(".border").querySelector(".comment-section");

            if (commentSection.style.display === "none" || commentSection.style.display === "") {
                commentSection.style.display = "block";
                button.textContent = "Hide comment";
            } else {
                commentSection.style.display = "none";
                button.textContent = "See comment";
            }
        });
    });

    // Change send icon color based on input
    const commentInputs = document.querySelectorAll("input.form-control[name='comment']");

    commentInputs.forEach((input) => {
        const sendIcon = input.closest("form").querySelector(".send-icon");

        input.addEventListener("input", () => {
            // Check if the input has non-whitespace content
            if (input.value.trim().length > 0) {
                sendIcon.style.color = "blue"; // Change icon color to blue
            } else {
                sendIcon.style.color = ""; // Reset icon color (default)
            }
        });

        // Handle form submission without reloading the page
        const form = input.closest("form");
        form.addEventListener("submit", (event) => {
            event.preventDefault(); // Prevent the form from reloading the page

            const comment = input.value.trim(); // Get the trimmed input value
            if (comment.length === 0) {
                alert("Please enter a valid comment."); // Notify the user
                return;
            }

            // Example of dynamically appending the comment to the comment section
            const commentSection = form.closest(".comment-section");
            const newComment = document.createElement("div");
            newComment.className = "d-flex flex-row justify-content-start align-items-start gap-2 mb-3";

            newComment.innerHTML = `
                <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                <div class="d-flex flex-column">
                    <div>
                        <span><strong>Vicmar M. Guzman</strong></span>
                        <small class="text-muted">Just now</small>
                    </div>
                    <div>
                        <p>${comment}</p>
                    </div>
                </div>
            `;

            commentSection.insertBefore(newComment, form); // Add the new comment above the form
            input.value = ""; // Clear the input field
            sendIcon.style.color = ""; // Reset icon color
        });
    });
});

        </script>



    </main>
    </div>
    </div>





    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>