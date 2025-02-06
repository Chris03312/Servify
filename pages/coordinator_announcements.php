<?php
// Fetch announcements from database
try {
    $db = Database::getConnection();
    $stmt = $db->prepare("SELECT announcement_id, announcement_recipients, announcement_title, announcement_content, created_at FROM announcements ORDER BY created_at DESC");
    $stmt->execute();
    $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Error fetching announcements: " . $e->getMessage() . "</div>";
}
?>

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
    #edit-editor-container,
    .edit-editor-container {
        height: 200px;
    }
</style>

<body>

    <?php
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container py-2 p-md-5">


        <div class="d-flex flex-row justify-content-between align-items-center mb-5">
            <h4>Announcements</h4>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#createAnnouncementModal"><i class="bi bi-plus me-2"></i>Create Announcement</button>

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
                                <form id="announcementForm" action="/coordinator_announcements/submit" method="POST">
                                    <div class="mb-3">
                                        <select name="announcement_recipients" id="announcement_recipients" class="form-select" required>
                                            <option value="" selected disabled>Select Recipients</option>
                                            <option value="Volunteer">Volunteer</option>
                                            <option value="Coordinator">Coordinator</option>
                                            <option value="All">All</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="announcement_title" name="announcement_title" placeholder="Announcement Title" required>
                                    </div>

                                    <div class="mb-3">
                                        <div id="editor-container"></div>
                                        <!-- Hidden input to store the editor content -->
                                        <input type="hidden" name="announcement_content" id="announcement_content">
                                    </div>

                                    <div class="modal-footer justify-content-end gap-3">
                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="post-announcement-btn" class="btn btn-primary px-5">Post</button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }
        ?>



        <!-- ANNOUNCEMENT CONTAINER -->
        <?php if (!empty($announcements)): ?>
            <?php foreach ($announcements as $announcement): ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-3">
                                <!-- PROFILE PIC, NAME AND DATE POSTED -->
                                <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                                <div class="d-flex flex-column">
                                    <span><strong><?php echo $coordinator_info['first_name'] . ' ' . $coordinator_info['surname'] ?></strong></span><!--NAME OF AUTHOR-->
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <small class="text-muted"><?= date("F j, Y, g:i a", strtotime($announcement['created_at'])); ?></small>
                                        <small class="badge text-bg-primary"><?= htmlspecialchars($announcement['announcement_recipients']); ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal<?= ($announcement['announcement_id']) ?>"><small><i class="bi bi-pen me-2"></i>Edit</small></button></li>
                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteAnnouncementModal<?= ($announcement['announcement_id']); ?>"><small><i class="bi bi-trash me-2"></i>Delete</button></small></li>
                                </ul>
                            </div>
                        </div>

                        <!-- ANNOUNCEMENT CONTENT -->
                        <h4><?= htmlspecialchars($announcement['announcement_title']) ?></h4>
                        <span><?php echo html_entity_decode($announcement['announcement_content']); ?></span>
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
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">No announcements available.</p>
        <?php endif; ?>



        <!--MODAL - DELETE ANNOUNCEMENT CONFIRMATION-->
        <?php if (!empty($announcements)): ?>
            <?php foreach ($announcements as $announcement): ?>

                <div class="modal fade" id="deleteAnnouncementModal<?= ($announcement['announcement_id']); ?>" tabindex="-1" aria-labelledby="deleteAnnouncementModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary"></div>
                            <div class="modal-body">

                                <div class="text-center">
                                    <img src="../img/icons8-announcement-90.png" alt="">

                                    <h5 class="text-center">Do you want to delete this announcement?</h5>
                                </div>

                                <form action="/coordinator_announcements/delete" method="POST">
                                    <input type="hidden" name="announcement_id" value="<?= $announcement['announcement_id']; ?>" />
                                    <div class="d-flex flex-row justify-content-center align-items-center mt-5 gap-3">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger" name="del-announcement-btn">Delete</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


        <!--MODAL - ANNOUNCEMENT DELETED SUCCESSFULLY-->
        <?php if (!empty($announcements)): ?>
            <?php foreach ($announcements as $announcement): ?>

                <div class="modal fade" id="announcementDeletedModal<?= ($announcement['announcement_id']); ?>" tabindex="-1" aria-labelledby="announcementDeletedModalLabel" aria-hidden="true">
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
            <?php endforeach; ?>
        <?php endif; ?>


        <!--MODAL - EDIT ANNOUNCEMENT-->
        <?php if (!empty($announcements)): ?>
            <?php foreach ($announcements as $announcement): ?>
                <div class="modal fade" id="editAnnouncementModal<?= $announcement['announcement_id'] ?>" tabindex="-1" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary"></div>
                            <div class="modal-body">
                                <h4 class="text-center text-primary">Edit Announcement</h4>

                                <!--EDIT FORM-->
                                <div class="container mt-4">
                                    <p class="text-muted">Edit this announcement for clarity and accuracy.</p>
                                    <form id="editAnnouncementForm<?= $announcement['announcement_id'] ?>" action="/coordinator_announcements/update" method="POST">
                                        <!-- Hidden input for announcement ID -->
                                        <input type="hidden" name="announcement_id" value="<?= $announcement['announcement_id'] ?>">

                                        <div class="mb-3">
                                            <select name="edit_announcement_recipients" id="edit_announcement_recipients" class="form-select" required>
                                                <option value="" selected disabled>Select Recipients</option>
                                                <option value="Volunteer" <?= $announcement['announcement_recipients'] === 'Volunteer' ? 'selected' : '' ?>>Volunteer</option>
                                                <option value="Coordinator" <?= $announcement['announcement_recipients'] === 'Coordinator' ? 'selected' : '' ?>>Coordinator</option>
                                                <option value="All" <?= $announcement['announcement_recipients'] === 'All' ? 'selected' : '' ?>>All</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="edit_announcement_title" name="edit_announcement_title" placeholder="Announcement Title" value="<?= $announcement['announcement_title'] ?>" required />
                                        </div>
                                        <div class="mb-3">
                                            <div class="edit-editor-container" id="edit-editor-container-<?= $announcement['announcement_id'] ?>"></div>
                                            <!-- Hidden input to store the editor content -->
                                            <input type="hidden" name="edit_announcement_content"
                                                id="edit_announcement_content-<?= $announcement['announcement_id'] ?>"
                                                value="<?= htmlspecialchars($announcement['announcement_content']) ?>">
                                        </div>
                                        <div class="modal-footer justify-content-end gap-3">
                                            <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="edit-announcement-btn" class="btn btn-primary px-5">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


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
            theme: "snow",
            placeholder: "Write your announcement here...",
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

        // Handle form submission
        document.getElementById("announcementForm").addEventListener("submit", function(event) {
            // Get the hidden input and Quill editor content
            const announcementBody = document.getElementById("announcement_content");
            const quillContent = quill.root.innerHTML.trim(); // Get content and trim whitespace

            // Validate Quill editor content
            if (!quill.getText().trim().length) { // Check if Quill text content is empty
                alert("Announcement body cannot be empty."); // Show error message
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Set the value of the hidden input field to Quill content
            announcementBody.value = quillContent;
        });
    </script>




    <!-- UPDATE ANNOUNCEMENT SCRIPT -->
    <script>
        // Initialize Quill for each edit announcement form
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".edit-editor-container").forEach(function(editorContainer) {
                let announcementId = editorContainer.id.replace("edit-editor-container-", ""); // Extract ID

                let quill = new Quill("#edit-editor-container-" + announcementId, {
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

                // Fetch the hidden input and set Quill's content
                let hiddenInput = document.getElementById("edit_announcement_content-" + announcementId);
                quill.root.innerHTML = hiddenInput.value; // Load stored content

                // Fetch other inputs within the specific form context
                let form = document.getElementById("editAnnouncementForm" + announcementId);
                let recipientSelect = form.querySelector("#edit_announcement_recipients");
                let titleInput = form.querySelector("#edit_announcement_title");
                let saveButton = form.querySelector("button[name='edit-announcement-btn']");
                let cancelButton = form.querySelector("button[data-bs-dismiss='modal']");

                // Store initial values
                const initialValues = {
                    recipients: recipientSelect.value,
                    title: titleInput.value,
                    content: hiddenInput.value.trim(),
                };

                saveButton.disabled = true; // Disable save button initially

                function checkChanges() {
                    const hasChanged =
                        recipientSelect.value !== initialValues.recipients ||
                        titleInput.value !== initialValues.title ||
                        quill.root.innerHTML.trim() !== initialValues.content;

                    saveButton.disabled = !hasChanged;
                }

                // Update hidden input on Quill text change
                quill.on("text-change", function() {
                    hiddenInput.value = quill.root.innerHTML;
                    checkChanges();
                });

                // Detect changes in other input fields
                recipientSelect.addEventListener("change", checkChanges);
                titleInput.addEventListener("input", checkChanges);

                // Reset form fields to initial values when cancel button is clicked
                cancelButton.addEventListener("click", function() {
                    recipientSelect.value = initialValues.recipients;
                    titleInput.value = initialValues.title;
                    quill.root.innerHTML = initialValues.content;
                    hiddenInput.value = initialValues.content;
                    saveButton.disabled = true; // Disable save button initially
                });

                // Prevent submission if no changes
                form.addEventListener("submit", function(event) {
                    if (!quill.getText().trim().length) {
                        alert("Announcement body cannot be empty.");
                        event.preventDefault();
                    }
                });
            });
        });
    </script>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>