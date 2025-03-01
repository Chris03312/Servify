<?php
// Fetch announcements from database
try {
    $db = Database::getConnection();
    $stmt = $db->prepare("SELECT * FROM announcements ORDER BY created_at DESC");
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
    <title>Announcements</title>
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


        <h5>Announcements</h5>

        <?php if ($announcements): ?>
            <?php foreach ($announcements as $announcement): ?>
                <div class="border mb-2 p-3 rounded">
                    <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-3">
                        <!-- PROFILE PIC, NAME, AND DATE POSTED -->
                        <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                        <div class="d-flex flex-column">
                            <span><strong><?php echo htmlspecialchars($announcement['announcement_author']); ?></strong></span>
                            <span class="text-muted">21 mins ago</span>
                        </div>
                    </div>

                    <!-- ANNOUNCEMENT TEXT -->
                    <h4><?= htmlspecialchars($announcement['announcement_title']) ?></h4>
                    <p><?php echo htmlspecialchars($announcement['announcement_content']); ?></p>

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
                                                <small class="text-muted time-elapsed"
                                                    data-timestamp="<?php echo strtotime($comment['created_at']); ?>">
                                                    <?php echo date("m/d/Y, h:i A", strtotime($comment['created_at'])); ?>
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
                        <form action="/announcement/submit" method="POST"
                            data-username="<?php echo htmlspecialchars($_SESSION['username'] ?? 'Anonymous'); ?>">
                            <div class="d-flex flex-row justify-content-center align-items-center gap-1">
                                <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                                <input type="hidden" name="announcement_id"
                                    value="<?php echo $announcement['announcement_id']; ?>">
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
    // Comment toggling for show/hide comments
    document.querySelectorAll(".see-comment-btn").forEach((button) => {
        button.addEventListener("click", () => {
            const commentSection = button.closest(".border").querySelector(".comment-section");
            commentSection.style.display = (commentSection.style.display === "none" || commentSection.style.display === "") ? "block" : "none";
            button.textContent = commentSection.style.display === "block" ? "Hide comment" : "See comment";
        });
    });

    // Handle the comment submission
    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", async (event) => {
            event.preventDefault();

            const input = form.querySelector("input[name='comment']");
            const announcementId = form.querySelector("input[name='announcement_id']").value;
            const commentSection = form.closest(".comment-section");
            const username = form.getAttribute("data-username") || "Anonymous";

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
                const response = await fetch("/announcement/submit", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json(); // Parse JSON response

                if (!result.success) {
                    throw new Error(result.error || "Failed to submit comment.");
                }

                // Create new comment element
                const newComment = document.createElement("div");
                newComment.classList.add("d-flex", "flex-row", "justify-content-start", "align-items-start", "gap-2", "mb-3");
                newComment.innerHTML = `
                    <img src="../img/DPPAM LOGO.png" alt="Profile Picture" width="50px">
                    <div class="d-flex flex-column">
                        <div>
                            <span><strong>${username}</strong></span>
                            <small class="text-muted time-elapsed" data-timestamp="${Math.floor(Date.now() / 1000)}">
                                Just now
                            </small>
                        </div>
                        <div>   
                            <p>${comment}</p>
                        </div>
                    </div>
                `;

                commentSection.insertBefore(newComment, form);
                input.value = "";

                // Update timestamps dynamically
                updateTimes();

            } catch (error) {
                console.error("Error:", error);
                alert("Something went wrong. Please try again.");
            }
        });
    });

    // Function to format timestamp into human-readable "X ago" format
   // Function to format timestamp into human-readable "X ago" format
function formatTimestamp(timestamp) {
    const now = new Date();
    const diff = now.getTime() - timestamp * 1000; // Difference in milliseconds
    const seconds = Math.floor(diff / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);

    // Handle time difference formatting
    if (days > 0) {
        return days + " day" + (days > 1 ? "s" : "") + " ago";
    } else if (hours > 0) {
        return hours + " hour" + (hours > 1 ? "s" : "") + " ago";
    } else if (minutes > 0) {
        return minutes + " minute" + (minutes > 1 ? "s" : "") + " ago";
    } else if (seconds > 0) {
        return seconds + " second" + (seconds > 1 ? "s" : "") + " ago";
    } else {
        return "Just now"; // When the timestamp is very recent
    }
}

// Function to update all timestamps on the page
function updateTimes() {
    document.querySelectorAll(".time-elapsed").forEach(el => {
        const timestamp = el.getAttribute("data-timestamp");
        if (timestamp) {
            let newTime = formatTimestamp(parseInt(timestamp)); // Make sure the timestamp is an integer
            if (el.innerText !== newTime) {
                el.innerText = newTime;
            }
        }
    });
}

// Run once on page load to update timestamps
updateTimes();

// Auto-update timestamps every minute
setInterval(() => {
    updateTimes();
}, 60000); // 60,000 ms = 1 minute
 })

        </script>



    </main>
    </div>
    </div>





    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>