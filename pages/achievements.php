<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer | My Achievements</title>
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

        <div class="container-fluid">
            <h4>My Achievements</h4>

            <ul class="nav nav-pills nav-fill px-5 mt-5 gap-5">
                <li class="nav-item">
                    <button class="nav-link active" id="pills-badges-tab" data-bs-toggle="pill" data-bs-target="#pills-badges" type="button" role="tab" aria-controls="pills-badges" aria-selected="true">Badges</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-certificates-tab" data-bs-toggle="pill" data-bs-target="#pills-certificates" type="button" role="tab" aria-controls="pills-certificates" aria-selected="true">My Certificates</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-goals-tab" data-bs-toggle="pill" data-bs-target="#pills-goals" type="button" role="tab" aria-controls="pills-goals" aria-selected="true">Election Day Goals</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">

                <!--BADGES-->
                <div class="tab-pane fade show active" id="pills-badges" role="tabpanel" aria-labelledby="pills-badges-tab" tabindex="0">
                    <div class="container-fluid mt-5">

                        <div class="row">

                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if (!empty($attendance_count) && !empty($years_of_service) && !empty($date_approved)) { ?>
                                            <div class="container-fluid d-flex flex-column justify-content-center align-items-center gap-1">
                                                <h5>Years of Service: <?php echo $years_of_service; ?></h5>
                                                <span>Since <?php echo date("F j, Y", strtotime($date_approved)); ?></span>

                                                <?php if (!empty($badge)) { ?>
                                                    <img src="../img/<?php echo htmlspecialchars($badge['IMG']); ?>" 
                                                        alt="<?php echo htmlspecialchars($badge['DESCRIPTION']); ?>" 
                                                        class="img-fluid ms-5">
                                                    <h4>CONGRATULATIONS</h4>
                                                    <p><?php echo htmlspecialchars($badge['DESCRIPTION']); ?></p>
                                                <?php } else { ?>
                                                    <h5>NO ACHIEVEMENTS YET</h5>
                                                <?php } ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="container-fluid d-flex flex-column justify-content-center align-items-center gap-1">
                                                <h5>NOT YET A VOLUNTEER</h5>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>


                            <!--ACHIEVEMENT YOU CAN UNLOCK-->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 mb-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="container-fluid text-center">
                                            <h5>Achievements you can unlock...</h5><br>

                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
                                                    <?php if (!empty($attendance_count)) { ?>
                                                        <?php if ($attendance_count >= 9) { ?>
                                                            <h5 class="text-center">You unlocked all achievements! 🎉</h5>
                                                        <?php } else { ?>
                                                            <!-- Show only the NEXT unlockable badge -->
                                                            <?php 
                                                                $nextBadge = null;
                                                                foreach ($badges as $badge) {
                                                                    if ($attendance_count < $badge['COUNT']) {
                                                                        $nextBadge = $badge;
                                                                        break;
                                                                    }
                                                                }
                                                            ?>

                                                            <?php if ($nextBadge) { ?>
                                                                <div class="badge-item text-center">
                                                                    <img src="../img/<?php echo $nextBadge['IMG']; ?>" alt="Next Badge" class="img-fluid">
                                                                    <p class="mt-2"><?php echo $nextBadge['DESCRIPTION']; ?></p>
                                                                </div>
                                                            <?php } ?>

                                                            <!-- Hidden Achievements (Remove already shown one) -->
                                                            <div class="collapse text-center" id="moreAchievements">
                                                                <?php foreach ($badges as $badge) { ?>
                                                                    <?php if ($attendance_count >= $badge['COUNT'] || $badge == $nextBadge) continue; ?>

                                                                    <div class="badge-item text-center">
                                                                        <img src="../img/<?php echo $badge['IMG']; ?>" alt="Locked Badge" class="img-fluid">
                                                                        <p class="mt-2"><?php echo $badge['DESCRIPTION']; ?></p>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>

                                                            <!-- See More Button (Centered at Bottom) -->
                                                            <?php if ($attendance_count < 9) { ?>
                                                                <div class="d-flex justify-content-center w-100 mt-3">
                                                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#moreAchievements">
                                                                        See More
                                                                    </button>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--ALL ACHIEVEMENTS-->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid mb-3">

                                            <h5 class="text-center mb-4">All Achievements</h5>
                                            <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                                                <?php if ($getAchievementList): ?>
                                                    <!-- Labels Row -->
                                                    <div class="d-flex w-100 gap-2 fw-bold text-center">
                                                        <div class="w-50">Achievement</div>
                                                        <div class="w-50">Date Achieved</div>
                                                    </div>

                                                    <?php foreach ($getAchievementList as $achievement): ?>
                                                        <div class="d-flex w-100 gap-2 align-items-center">
                                                            <!-- Image & Name Container -->
                                                            <div class="border rounded d-flex flex-column align-items-center w-50 pt-3">
                                                                <img src="../img/<?php echo $achievement['ACHIEVEMENT_NAME']; ?>.png" 
                                                                    alt="<?php echo $achievement['ACHIEVEMENT_NAME']; ?>" 
                                                                    class="img-fluid" style="max-width: 100px;">
                                                                <p class="mt-2 fw-bold"><?php echo $achievement['ACHIEVEMENT_NAME']; ?></p>
                                                            </div>
                                                            
                                                            <!-- Date Achieved -->
                                                            <div class="border p-2 rounded w-50 text-center">
                                                                <span><?php echo date("F j, Y", strtotime($achievement['DATE_ACHIEVED'])); ?></span>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="border w-100 p-2 rounded text-center">
                                                        <span>No achievements yet.</span>
                                                    </div>               
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <!--TIMELINE-->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <section class="container-fluid mb-3">
                                            <ul class="timeline-with-icons">
                                            <?php if(!empty($timelines)): ?>
                                                <?php foreach ($timelines as $timeline): ?>
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        <?php echo $timeline['YEAR'] ?? " "; ?>
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold"><?php echo $timeline['ASSIGNED_ASSIGNMENT'] ?? " "; ?></h5>
                                                        <p class="text-muted">
                                                            <?php echo $timeline['ASSIGNED_POLLING_PLACE'] ?? ""; ?>
                                                        </p>
                                                    </div>
                                                </li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <p class ="text-center">No Timelines</p>
                                            <?php endif; ?> 
                                            </ul>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--CERTIFICATES-->
                <div class="tab-pane fade" id="pills-certificates" role="tabpanel" aria-labelledby="pills-certificates-tab" tabindex="0">

                    <div class="container-fluid mt-5">
                        <!--
                            <div class="row">
                            <div class="col-12">
                                <div class="container-fluid d-flex flex-row justify-content-between align-items-center border p-3">
                                    <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                    <div><img src="../img/icons8-certificate-90.png" alt="" class="img-fluid"></div>
                                    <div>
                                        <h5>Certificate of Appreciation</h5>
                                        <h6>2002</h6>
                                        <h6>Poll Watcher</h6>
                                        <h6>Maligaya Elementary School</h6>
                                    </div>
                                    </div>
                                    <div class="image-certificate">
                                        <img src="../img/icons8-certificate-90.png" alt="" class="img-fluid">
                                    </div>
                                    <div class="actions">
                                        <button type="button" class="btn btn-primary px-5"  id="previewButton">View</button>
                                    </div>

                                </div>
                            </div>

                            <!-Preview Area ->
                            <div class="col-12 mt-3 d-none" id="previewContainer">
                                <div class="border p-3 d-flex flex-column justify-content-center align-items-center">
                                    <img src="../img/icons8-certificate-90.png" alt="Certificate Preview" class="img-fluid mb-3" id="previewImage" style="width: 30%;">
                                    <button type="button" class="btn btn-primary" id="downloadButton">Download</button>
                                </div>
                            </div>
                        </div>
                        -->

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Precinct Assignment</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr class="image-cell">
                                        <th scope="row"><img src="../img/icons8-certificate-90.png" alt="Certificate Logo" width="30px"></th>
                                        <td class="text-nowrap">Certificate of Appreciation 1</td>
                                        <td class="text-nowrap">2020</td>
                                        <td class="text-nowrap">Maligaya Elementary School</td>
                                        <td><button type="button" class="btn btn-primary download-btn"><i class="bi bi-download"></i></button></td>
                                    </tr>
                                    <tr class="image-cell">
                                        <th scope="row"><img src="../img/icons8-announcement-90.png" alt="Certificate Logo" width="30px"></th>
                                        <td class="text-nowrap">Certificate of Appreciation 2</td>
                                        <td class="text-nowrap">2020</td>
                                        <td class="text-nowrap">Maligaya Elementary School</td>
                                        <td><button type="button" class="btn btn-primary download-btn"><i class="bi bi-download"></i></button></td>
                                    </tr>
                                    <tr class="image-cell">
                                        <th scope="row"><img src="../img/icons8-dissapointed-90.png" alt="Certificate Logo" width="30px"></th>
                                        <td class="text-nowrap">Certificate of Appreciation 3</td>
                                        <td class="text-nowrap">2020</td>
                                        <td class="text-nowrap">Maligaya Elementary School</td>
                                        <td><button type="button" class="btn btn-primary download-btn"><i class="bi bi-download"></i></button></td>
                                    </tr>
                                    <tr class="image-cell">
                                        <th scope="row"><img src="../img/icons8-ask-90.png" alt="Certificate Logo" width="30px"></th>
                                        <td class="text-nowrap">Certificate of Appreciation 4</td>
                                        <td class="text-nowrap">2020</td>
                                        <td class="text-nowrap">Maligaya Elementary School</td>
                                        <td><button type="button" class="btn btn-primary download-btn"><i class="bi bi-download"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title image-title" id="imageModalLabel">Image Title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 text-end mb-3">
                                                <button type="button" class="btn btn-primary modal-download-btn"><i class="bi bi-download"></i></button>
                                            </div>
                                        </div>
                                        <div class="image-preview text-center">
                                            <img id="modalImage" src="" alt="Popup Image" class="img-fluid" width="450">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>

                <!--GOALS-->
                <div class="tab-pane fade" id="pills-goals" role="tabpanel" aria-labelledby="pills-goals-tab" tabindex="0">

                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="progress-text">
                                            <h6>Progress <!--Count: 5/5--></h6>
                                        </div>
                                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 1%">25%</div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mb-3">On going goals</h6>

                                <div class="row">
                                    <div class="col-md-8 p-3 border">

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore sunt eligendi eveniet illum obcaecati ipsa deserunt laudantium ab reprehenderit in.</p>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>



        <!--PREVIEW CERTS-->
        <!--
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            const previewButton = document.getElementById("previewButton");
                                            const previewContainer = document.getElementById("previewContainer");
                                            const previewImage = document.getElementById("previewImage");
                                            const downloadButton = document.getElementById("downloadButton");

                                            previewButton.addEventListener("click", () => {
                                                // Toggle the visibility of the preview container
                                                previewContainer.classList.toggle("d-none");


                                                // Set the download link for the button dynamically (if needed)
                                                const imageUrl = previewImage.src;
                                                downloadButton.onclick = () => {
                                                    const link = document.createElement("a");
                                                    link.href = imageUrl;
                                                    link.download = "Certificate_of_Appreciation.png";
                                                    link.click();
                                                };
                                            });
                                        });
                                    </script>
                            -->






    </main>
    </div>
    </div>



    <!--SCRIPT FOR PREVIEWING AND DOWNLOADING CERTIFICATES-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageCells = document.querySelectorAll(".image-cell");
            const modalImage = document.getElementById("modalImage"); // Image in the modal
            const modalDownloadBtn = document.querySelector(".modal-download-btn"); // Download button in the modal
            const modalTitle = document.querySelector(".image-title"); // Modal title

            // Function to handle image download
            function downloadImage(imageSrc, fileName) {
                const link = document.createElement("a");
                link.href = imageSrc;
                link.download = `${fileName}.png`; // Use the name for the downloaded file
                document.body.appendChild(link); // Append the link to the DOM
                link.click(); // Programmatically click the link
                document.body.removeChild(link); // Clean up the DOM
            }

            // Loop through all rows with the class `.image-cell`
            imageCells.forEach((cell) => {
                cell.addEventListener("click", function(event) {
                    // Check if the click happened on a button (or its child, like an <i>)
                    const button = event.target.closest("button"); // Find the closest button to the click target
                    if (button && button.classList.contains("download-btn")) {
                        return; // Prevent modal display when clicking the "Download" button
                    }

                    const imgElement = cell.querySelector("img"); // Find the image in the cell
                    const nameElement = cell.querySelector("td.text-nowrap"); // Find the name in the cell

                    if (imgElement && nameElement) {
                        // Set modal image source and alt attributes
                        modalImage.src = imgElement.src;
                        modalImage.alt = nameElement.textContent.trim();
                        modalTitle.textContent = nameElement.textContent.trim();

                        // Show the modal
                        const imageModal = new bootstrap.Modal(
                            document.getElementById("imageModal")
                        );
                        imageModal.show();

                        // Now handle the download from within the modal
                        modalDownloadBtn.setAttribute("href", imgElement.src);
                        modalDownloadBtn.setAttribute("download", `${nameElement.textContent.trim()}.png`);
                    }
                });

                // Add event listener for the "Download" button in the row (icon-based)
                const downloadButton = cell.querySelector("button.download-btn");
                if (downloadButton) {
                    downloadButton.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent default navigation

                        const imgElement = cell.querySelector("img");
                        const nameElement = cell.querySelector("td.text-nowrap");

                        if (imgElement && nameElement) {
                            downloadImage(imgElement.src, nameElement.textContent.trim());
                        }
                    });
                }
            });

            // Add functionality for the modal "Download" button
            modalDownloadBtn.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default behavior

                const imageSrc = modalImage.src; // Get the image source from the modal
                const imageName = modalTitle.textContent.trim(); // Get the title from the modal

                if (imageSrc && imageName) {
                    downloadImage(imageSrc, imageName);
                }
            });
        });
    </script>



    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>