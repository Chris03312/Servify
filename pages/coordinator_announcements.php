<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Announcements</title>
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

    <!--QUILL JS CDN-->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
</head>

<style>
    #editor-container,
    #edit-editor-container {
        height: 200px;
    }
</style>

<body>

    <?php
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container p-5">


        <div class="d-flex flex-row justify-content-between align-items-center mb-5">
            <h4>Announcements</h4>
            <button type="button" class="btn border-dark btn-light px-4" data-bs-toggle="modal" data-bs-target="#createAnnouncementModal">Create Announcement</button>

            <!--MODAL - CREATE ANNOUNCEMENT-->
            <div class="modal fade" id="createAnnouncementModal" tabindex="-1" aria-labelledby="createAnnouncementModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary"></div>
                        <div class="modal-body">
                            <h4 class="text-center text-primary">Create Announcement</h4>

                            <!--FORM-->
                            <div class="container mt-4">
                                <p class="text-muted">Fill out this form below to create an announcement.</p>
                                <form id="announcementForm" action="" method="POST">
                                    <div class="mb-3">
                                        <select name="recepients" id="recepients" class="form-select" required>
                                            <option value="" selected disabled>Select Recepients</option>
                                            <option value="">...</option>
                                            <option value="">...</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Announcement Title" required>
                                    </div>

                                    <div class="mb-3">
                                        <div id="editor-container"></div>
                                        <!-- Hidden input to store the editor content -->
                                        <input type="hidden" name="announcement_body" id="announcement_body">
                                    </div>

                                    <div class="modal-footer justify-content-end gap-3">
                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary px-5">Post</button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="card mb-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-3">
                        <!-- PROFILE PIC, NAME AND DATE POSTED -->
                        <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                        <div class="d-flex flex-column">
                            <span><strong>Vicmar M. Guzman</strong></span>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <small class="text-muted">21 mins. ago</small>
                                <small class="bg-primary rounded py-1 px-2 text-light">For volunteers only</small>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal">Edit</button></li>
                            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAnnouncementModal">Delete</button></li>
                        </ul>
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
        </div>

        <!--MODAL - DELETE ANNOUNCEMENT CONFIRMATION-->
        <div class="modal fade" id="deleteAnnouncementModal" tabindex="-1" aria-labelledby="deleteAnnouncementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary"></div>
                    <div class="modal-body">

                        <div class="text-center">
                            <img src="../img/icons8-announcement-90.png" alt="">

                            <h5 class="text-center">Do you want to delete this announcement?</h5>
                        </div>

                        <div class="d-flex flex-row justify-content-center align-items-center mt-5 gap-3">
                            <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger px-5" data-bs-toggle="modal" data-bs-target="#announcementDeletedModal">Delete</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!--MODAL - ANNOUNCEMENT DELETED SUCCESSFULLY-->
        <div class="modal fade" id="announcementDeletedModal" tabindex="-1" aria-labelledby="announcementDeletedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary"></div>
                    <div class="modal-body">

                        <div class="text-center">
                            <img src="../img/icons8-announcement-90.png" alt="">

                            <h5 class="text-center">Your announcement has been successfully deleted.</h5>
                        </div>

                        <div class="d-flex flex-row justify-content-center align-items-center mt-5 gap-3">
                            <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!--MODAL - EDIT ANNOUNCEMENT-->
        <div class="modal fade" id="editAnnouncementModal" tabindex="-1" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary"></div>
                    <div class="modal-body">
                        <h4 class="text-center text-primary">Edit Announcement</h4>

                        <!--EDIT FORM-->
                        <div class="container mt-4">
                            <p class="text-muted">Edit this announcement for clarity and accuracy.</p>
                            <form id="editAnnouncementForm" action="" method="POST">
                                <div class="mb-3">
                                    <select name="recepients" id="editRecepients" class="form-select" required>
                                        <option value="" selected disabled>Select Recepients</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="editTitle"
                                        name="title"
                                        placeholder="Announcement Title"
                                        required />
                                </div>

                                <div class="mb-3">
                                    <div id="edit-editor-container"></div>
                                    <!-- Hidden input to store the editor content -->
                                    <input type="hidden" name="edit_announcement_body" id="edit_announcement_body">
                                </div>

                                <div class="modal-footer justify-content-end gap-3">
                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary px-4"
                                        data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary px-5">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </main>
    </div>
    </div>



    <!--COMMENT SECTION SCRIPT-->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Toggle comment sections
            const commentButtons = document.querySelectorAll(".see-comment-btn");

            commentButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    const commentSection = button.closest(".card").querySelector(".comment-section");

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

    <!-- Include Quill.js -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        // Initialize Quill editor
        var quill = new Quill("#editor-container", {
            theme: "snow", // "snow" is the default theme
            placeholder: "Enter Announcement body (255 words)",
            modules: {
                toolbar: [
                    ["bold", "italic", "underline"], // Text formatting
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }], // Lists
                    [{
                        align: []
                    }], // Alignment options
                ],
            },
        });

        // Handle form submission
        const form = document.getElementById("announcementForm");
        form.onsubmit = function(event) {
            // Get the content from the Quill editor
            const announcementBody = document.getElementById("announcement_body");
            const quillContent = quill.root.innerHTML.trim(); // Trim whitespace

            // Validate Quill editor content
            if (
                quillContent === "" || // Empty content
                quillContent === "<p><br></p>" // Quill's representation of an empty editor
            ) {
                alert("Announcement body cannot be empty."); // Display an error message
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Set the value of the hidden input for form submission
            announcementBody.value = quillContent;
        };
    </script>

    <script>
        // Initialize Quill for the edit announcement form
        var editQuill = new Quill("#edit-editor-container", {
            theme: "snow",
            placeholder: "Edit Announcement body (255 words)",
            modules: {
                toolbar: [
                    ["bold", "italic", "underline"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }],
                    [{
                        align: []
                    }],
                ],
            },
        });

        // Handle submission for the edit announcement form
        const editForm = document.getElementById("editAnnouncementForm");
        editForm.onsubmit = function(event) {
            const announcementBody = document.getElementById("edit_announcement_body");
            const quillContent = editQuill.root.innerHTML.trim();
            if (quillContent === "" || quillContent === "<p><br></p>") {
                alert("Announcement body cannot be empty.");
                event.preventDefault();
                return;
            }
            announcementBody.value = quillContent;
        };
    </script>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>