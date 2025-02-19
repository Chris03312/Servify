<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Achievements</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
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
    include('includes/admin_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <div class="container-fluid">
            <h4>My Achievements</h4>

            <ul class="nav nav-pills nav-fill px-5 mt-5 gap-5">
                <li class="nav-item">
                    <button class="nav-link" id="pills-badges-tab" data-bs-toggle="pill" data-bs-target="#pills-badges" type="button" role="tab" aria-controls="pills-badges" aria-selected="true">Volunteers</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link active" id="pills-certificates-tab" data-bs-toggle="pill" data-bs-target="#pills-certificates" type="button" role="tab" aria-controls="pills-certificates" aria-selected="true">My Achievements</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-goals-tab" data-bs-toggle="pill" data-bs-target="#pills-goals" type="button" role="tab" aria-controls="pills-goals" aria-selected="true">Uploaded File</button>
                </li>
            </ul>

             <div class="tab-content" id="pills-tabContent">

                <!--BADGES-->
                <div class="tab-pane fade" id="pills-badges" role="tabpanel" aria-labelledby="pills-badges-tab" tabindex="0">

                </div>


                <!--ACHIEVEMENTS-->
                <div class="tab-pane fade show active" id="pills-certificates" role="tabpanel" aria-labelledby="pills-certificates-tab" tabindex="0">


                    <div class="container-fluid mt-5">

                        <div class="row">

                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center gap-1">
                                            <h5>Years of Service: 2</h5>
                                            <span>Since 2021</span>
                                            <img src="../img/BRONZE BADGE.png" alt="Bronze Badge" class="img-fluid">
                                            <h4>CONGRATULATIONS</h4>
                                            <p>Consistently volunteered in at least two election cycles.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--ACHIEVEMENT YOU CAN UNLOCK-->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 mb-3">

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="container-fluid">

                                            <h5>Achievements you can unlock...</h5>

                                            <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">

                                                <div>
                                                    <img src="../img/GOLD BADGE.png" alt="Gold Badge" class="img-fluid">
                                                    <p>Consistently volunteered in at least two election cycles.</p>
                                                </div>
                                                <div>
                                                    <img src="../img/PLATINUM BADGE.png" alt="Platinum Badge" class="img-fluid">
                                                    <p>Contribute to five or more election cycles.</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--ALL ACHIEVEMENTS-->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid mb-3">

                                            <h5 class="mb-3">All Achievements</h5>

                                            <div class="d-flex flex-column justify-content-center align-items-center gap-3">

                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>

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
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
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
                <div class="row d-flex">
                    <!-- Left Side - File Uploads -->
                    <div class="col-md-6 d-flex flex-column gap-3">
                        <!-- Generated ID Upload -->
                        <div>
                            <label for="fileElem1" class="form-label fw-bold">Generated ID</label>
                            <div class="border p-4 rounded shadow-sm text-center drop-area" id="drop-area-1">
                                <p>Drag & drop your file here <br> <strong>OR</strong></p>
                                <input type="file" id="fileElem1" accept="image/*" multiple hidden>
                                <button class="btn btn-primary" onclick="document.getElementById('fileElem1').click();">UPLOAD</button>
                                <div id="file-list-1" class="mt-3"></div>
                            </div>
                        </div>

                        <!-- Generated Certificates Upload -->
                        <div>
                            <label for="fileElem2" class="form-label fw-bold">Generated Certificates</label>
                            <div class="border p-4 rounded shadow-sm text-center drop-area" id="drop-area-2">
                                <p>Drag & drop your file here <br> <strong>OR</strong></p>
                                <input type="file" id="fileElem2" accept="image/*" multiple hidden>
                                <button class="btn btn-primary" onclick="document.getElementById('fileElem2').click();">UPLOAD</button>
                                <div id="file-list-2" class="mt-3"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Preview Section -->
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                        <label class="form-label fw-bold">Preview Here</label>
                        <div class="border p-4 rounded shadow-sm text-center w-100" id="preview-container" style="height: 300px;">
                            <p class="text-muted" id="preview-text">No preview available</p>
                            <img id="preview-image" src="" alt="" class="img-fluid d-none" style="max-height: 100%; max-width: 100%;">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success" onclick="printPreview()">PRINT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







            </div>

        </div>



       






    </main>
    </div>
    </div>


<!-- JavaScript for Upload & Preview -->
<script>
    function setupDragAndDrop(dropAreaId, fileInputId, fileListId) {
        const dropArea = document.getElementById(dropAreaId);
        const fileInput = document.getElementById(fileInputId);
        const fileList = document.getElementById(fileListId);
        const previewContainer = document.getElementById("preview-container");
        const previewText = document.getElementById("preview-text");
        const previewImage = document.getElementById("preview-image");

        dropArea.addEventListener("dragover", (event) => {
            event.preventDefault();
            dropArea.classList.add("border-primary");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("border-primary");
        });

        dropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            dropArea.classList.remove("border-primary");
            handleFiles(event.dataTransfer.files);
        });

        fileInput.addEventListener("change", () => {
            handleFiles(fileInput.files);
        });

        function handleFiles(files) {
            fileList.innerHTML = "<p class='text-info'>Uploading...</p>"; // Show uploading message
            
            setTimeout(() => { // Simulate upload delay
                fileList.innerHTML = ""; // Clear uploading message
                
                for (let file of files) {
                    let listItem = document.createElement("p");
                    listItem.textContent = file.name;
                    fileList.appendChild(listItem);

                    if (file.type.startsWith("image/")) { // If file is an image, preview it
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewImage.src = e.target.result;
                            previewImage.classList.remove("d-none");
                            previewText.classList.add("d-none");
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }, 1000); // Simulated upload time (1 sec)
        }
    }

    function printPreview() {
        const previewContent = document.getElementById('preview-container').innerHTML;
        const newWindow = window.open('', '_blank');
        newWindow.document.write('<html><head><title>Print Preview</title></head><body>');
        newWindow.document.write(previewContent);
        newWindow.document.write('</body></html>');
        newWindow.document.close();
        newWindow.print();
    }

    // Initialize drag-and-drop for both containers
    document.addEventListener("DOMContentLoaded", function () {
        setupDragAndDrop("drop-area-1", "fileElem1", "file-list-1");
        setupDragAndDrop("drop-area-2", "fileElem2", "file-list-2");
    });
</script>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>