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

        <?php if ($announcements): ?>
    <?php foreach ($announcements as $announcement): ?>
        <div class="border mb-2 p-3 rounded">
            <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-3">
                <!-- PROFILE PIC, NAME, AND DATE POSTED -->
                <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                <div class="d-flex flex-column">
                    <span><strong><?php echo htmlspecialchars($announcement['name']); ?></strong></span>
                    <span class="text-muted">21 mins ago</span>
                </div>
            </div>

            <!-- ANNOUNCEMENT TEXT -->
            <p><?php echo htmlspecialchars($announcement['content']); ?></p>

            <!-- COMMENT BUTTON -->
            <div>
                <button type="button" class="btn btn-sm see-comment-btn border-0">See comment</button>
            </div>

            <!-- COMMENT SECTION -->
            <div class="comment-section border p-3 rounded mt-2" style="display: none;">
                <?php 
                $hasComments = false; // Flag to check if the announcement has comments
                if ($comments): 
                    foreach ($comments as $comment): 
                        if ($comment['announcement_id'] == $announcement['announcement_id']): 
                            $hasComments = true;
                ?>
                    <div class="d-flex flex-row justify-content-start align-items-start gap-2 mb-3">
                        <!-- PROFILE PIC, NAME, AND DATE COMMENT -->
                        <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                        <div class="d-flex flex-column">
                            <div>
                            <span><strong><?php echo htmlspecialchars($comment['username']); ?></strong></span>
                            <small class="text-muted time-elapsed" data-timestamp="<?php echo strtotime($comment['created_at']); ?>">
                                <?php echo strtotime($comment['created_at']); ?>
                            </small>


                            </div>
                            <div>
                                <p><?php echo htmlspecialchars($comment['content']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                        endif;
                    endforeach;
                endif; 
                ?>

                <!-- Show a message if no comments exist -->
                <?php if (!$hasComments): ?>
                    <p class="text-muted">No comments yet.</p>
                <?php endif; ?>

                <!-- COMMENT BOX -->
                <form action="/Announcement/submit" method="POST" data-username="<?php echo htmlspecialchars($_SESSION['username'] ?? 'Anonymous'); ?>">
                    <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                        <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                        <input type="hidden" name="announcement_id" value="<?php echo $announcement['announcement_id']; ?>">
                        <input type="text" class="form-control" name="comment" placeholder="Add comment..." required>
                        <button type="submit" class="btn border-0"><i class="bi bi-send send-icon"></i></button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>



        <script>
          document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".see-comment-btn").forEach((button) => {
        button.addEventListener("click", () => {
            const commentSection = button.closest(".border").querySelector(".comment-section");
            commentSection.style.display = (commentSection.style.display === "none" || commentSection.style.display === "") ? "block" : "none";
            button.textContent = commentSection.style.display === "block" ? "Hide comment" : "See comment";
        });
    });

    document.querySelectorAll("form").forEach((form) => {   
        form.addEventListener("submit", async (event) => {
            event.preventDefault();

            const input = form.querySelector("input[name='comment']");
            const announcementId = form.querySelector("input[name='announcement_id']").value;
            const commentSection = form.closest(".comment-section");
            const username = form.getAttribute("data-username") || "Anonymous"; // ✅ Get the correct username

            if (!input || !announcementId || !commentSection) {
                alert("Error: Form elements missing.");
                return;
            }

            const comment = input.value.trim();
            if (comment.length === 0) {
                alert("Please enter a valid comment.");
                return;
            }

            const formData = new FormData();
            formData.append("comment", comment);
            formData.append("announcement_id", announcementId);

            try {
                const response = await fetch("/Announcement/submit", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json(); // Parse JSON response

                if (!result.success) {
                    throw new Error(result.error || "Failed to submit comment.");
                }

                // Create new comment element with the correct name
                const newComment = document.createElement("div");
                newComment.classList.add("d-flex", "flex-row", "justify-content-start", "align-items-start", "gap-2", "mb-3");
                newComment.innerHTML = `
                    <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                    <div class="d-flex flex-column">
                        <div>
                            <span><strong>${username}</strong></span> <!-- ✅ Correctly displays user's name -->
                            <small class="text-muted">Just now</small>
                        </div>
                        <div>
                            <p>${comment}</p>
                        </div>
                    </div>
                `;

                commentSection.insertBefore(newComment, form);
                input.value = "";

            } catch (error) {
                console.error("Error:", error);
                alert("Something went wrong. Please try again.");
            }
        });
    });
});

function timeAgo(timestamp) {
    if (!timestamp) return "Invalid date"; // Check if it's null or undefined

    timestamp = parseInt(timestamp, 10); // Convert to a number safely
    if (isNaN(timestamp)) return "Invalid date"; // Ensure it's valid

    const now = new Date();
    const seconds = Math.floor((now - new Date(timestamp * 1000)) / 1000);

    if (seconds < 60) return seconds + " secs ago";
    const minutes = Math.floor(seconds / 60);
    if (minutes < 60) return minutes + " mins ago";
    const hours = Math.floor(minutes / 60);
    if (hours < 24) return hours + " hrs ago";
    const days = Math.floor(hours / 24);
    return days + " days ago";
}

// Update timestamps
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".time-elapsed").forEach(el => {
        const timestamp = el.getAttribute("data-timestamp");
        console.log("Timestamp from HTML:", timestamp); // Debugging log
        if (timestamp) {
            el.innerText = timeAgo(timestamp);
        }
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