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
</head>

<body>
    <?php include('includes/coordinator_sidebar.php'); ?>

    <!--MAIN CONTENT-->
    <main class="container p-3">
        <h4 class="mb-5">Inquiries</h4>

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
                    <?php foreach ($inquiries as $inquiry): ?>
                    <tr>
                        <td><?= htmlspecialchars($inquiry['name']); ?></td>
                        <td><?= htmlspecialchars($inquiry['Email']); ?></td>
                        <td class="truncate-text"><?= htmlspecialchars($inquiry['message']); ?></td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td><?= htmlspecialchars($inquiry['created_at']); ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewInquiryModal">Respond</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
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
                            <p><strong>Name:</strong> <?= htmlspecialchars($inquiry['name']); ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($inquiry['Email']); ?></p>
                            <p><strong>Message:</strong> <?= htmlspecialchars($inquiry['message']); ?></p>

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

    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
