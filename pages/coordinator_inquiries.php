<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Inquiries</title>
    <link rel="stylesheet" href="../css/coordinator_dashboard.css">
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
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container p-3">


        <h4 class="mb-5">Inquiries</h4>

        <!-- Search and Filter -->
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search inquiries...">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="resolved">Resolved</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100">Filter</button>
            </div>
        </div>

        <!-- Inquiry Table -->
        <div class="table-responsive">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td class="truncate-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloribus corrupti ad dolorum ipsa laborum esse amet voluptates pariatur. A?</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>2025-01-30</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewInquiryModal">Respond</button>
                        </td>
                    </tr>
                    <!-- More rows can be added dynamically -->
                </tbody>
            </table>
        </div>

        <!-- View Inquiry Modal -->
        <div class="modal fade" id="viewInquiryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-light">
                        <h5 class="modal-title">Inquiry Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <p><strong>Name:</strong> John Doe</p>
                            <p><strong>Email:</strong> johndoe@example.com</p>
                            <p><strong>Message:</strong> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem excepturi atque numquam eius, hic quo aspernatur ab soluta totam veniam.</p>

                            <!--REPLY-->
                            <div class="my-3">
                                <label for="reply" class="form-label"><strong>Reply:</strong></label>
                                <textarea class="form-control" id="reply" rows="5" placeholder="Type here..." required style="resize: none;"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn border-0" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill me-2"></i>Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>









    </main>
    </div>
    </div>

    <!--Script for trimming text.....-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".truncate-text").forEach(el => {
                let text = el.innerText.trim();
                let maxLength = 30; // Adjust max character length

                if (text.length > maxLength) {
                    el.innerText = text.substring(0, maxLength) + "...";
                }
            });
        });
    </script>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>