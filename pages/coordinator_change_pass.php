<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coordinator | Change Password</title>
  <link rel="stylesheet" href="../css/coordinator_dashboard.css">
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


  <!--MAIN CONTENT-->
  <main class="container">

    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header py-3 bg-primary"></div>
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-lg-4">
                <img src="../img/servify-logo-with-text.png" alt="Servify Logo" class="img-fluid">
              </div>
              <div class="col-lg-8">
                <form action="" method="post" class="px-5 py-3">
                  <h5 class="text-primary text-center">Set your New Password</h5>
                  <p class="text-muted text-center mb-5">Please Update your password for security.</p>

                  <!--CURRENT PASSWORD-->
                  <div class="col mb-5">
                    <label for="current-password"><span class="text-primary">Current Password</span></label>
                    <input type="password" class="form-control" name="current-password" id="current-password" required>
                    <div class="invalid-feedback">
                      Please input current password.
                    </div>
                  </div>

                  <!--NEW PASSWORD-->
                  <div class="col mb-3">
                    <label for="new-password"><span class="text-primary">Create New Password</span></label>
                    <input type="password" class="form-control" name="new-password" id="new-password" required>
                    <div class="invalid-feedback">
                      Please input new password.
                    </div>
                  </div>

                  <!--CONFIRM NEW PASSWORD-->
                  <div class="col mb-4">
                    <label for="confirm-new-password"><span class="text-primary">Confirm New Password</span></label>
                    <input type="password" class="form-control" name="confirm-new-password" id="confirm-new-password"
                      required>
                    <div class="invalid-feedback">
                      Re-enter new password.
                    </div>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary px-4">Change password</button>
                  </div>

                  <!--MODAL - CHANGE PASSWORD CONFIRMATION-->
                  <div class="modal fade" id="changePassConfirmationModal" tabindex="-1"
                    aria-labelledby="changePassConfirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header bg-primary">
                        </div>
                        <div class="modal-body">
                          <h4 class="text-center text-danger">Change Password???</h4>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-outline-secondary px-4"
                            data-bs-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#changePasswordConfirmed">Confirm</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--MODAL - CONFIRMED CHANGE PASSWORD-->
                  <div class="modal fade" id="changePasswordConfirmed" tabindex="-1"
                    aria-labelledby="changePasswordConfirmedLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header bg-primary">
                        </div>
                        <div class="modal-body">
                          <h4 class="text-center text-danger">Password Changed Successfully!</h4>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-primary px-4"
                            data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </main>
  </div>
  </div>





  <!--BOOTSTRAP JS CDN LINK-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>