<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Feedback Form</title>
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
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container p-3">


        <h4 class="mb-5">Feedback Form</h4>


        <div class="text-center d-flex flex-column mb-5">
            <span class="fs-3"><strong>SEND US YOUR FEEDBACK!</strong></span>
            <span class="text-muted">Need help to something?</span>
        </div>


        <div class="card">
            <div class="card-body">
                <form action="">

                    <!--QUESTION #1-->
                    <section class="mb-5">
                        <p>1. How would you describe your experience as a volunteer during the election?</p>
                        <div class="d-flex justify-content-center">

                            <div class="row">
                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceAsVolunteer" id="happy-volunteer" autocomplete="off" required>
                                    <label class="btn btn-outline-primary border-0 px-5" for="happy-volunteer"><i class="bi bi-emoji-smile fs-3"></i><br>Happy</label>
                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceAsVolunteer" id="cool-volunteer" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0 px-5" for="cool-volunteer"><i class="bi bi-emoji-sunglasses fs-3"></i><br>Cool</label>
                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceAsVolunteer" id="sad-volunteer" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0 px-5" for="sad-volunteer"><i class="bi bi-emoji-frown fs-3"></i><br>Sad</label>

                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceAsVolunteer" id="disappointed-volunteer" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0" for="disappointed-volunteer"><i class="bi bi-emoji-dizzy fs-3"></i><br>Disappointed</label>
                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceAsVolunteer" id="thinking-volunteer" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0 px-4" for="thinking-volunteer"><i class="bi bi-emoji-sunglasses fs-3"></i><br>Thinking</label>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!--QUESTION #2-->
                    <section class="mb-5">
                        <p>2. How would you rate your experience with the election process and the use of the system?</p>
                        <div class="d-flex justify-content-center">

                            <div class="row">
                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceOnSystem" id="happy-system" autocomplete="off" required>
                                    <label class="btn btn-outline-primary border-0 px-5" for="happy-system"><i class="bi bi-emoji-smile fs-3"></i><br>Happy</label>
                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceOnSystem" id="cool-system" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0 px-5" for="cool-system"><i class="bi bi-emoji-sunglasses fs-3"></i><br>Cool</label>
                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceOnSystem" id="sad-system" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0 px-5" for="sad-system"><i class="bi bi-emoji-frown fs-3"></i><br>Sad</label>

                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceOnSystem" id="disappointed-system" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0" for="disappointed-system"><i class="bi bi-emoji-dizzy fs-3"></i><br>Disappointed</label>
                                </div>

                                <div class="col-auto">
                                    <input type="radio" class="btn-check" name="experienceOnSystem" id="thinking-system" autocomplete="off">
                                    <label class="btn btn-outline-primary border-0 px-4" for="thinking-system"><i class="bi bi-emoji-sunglasses fs-3"></i><br>Thinking</label>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!--QUESTION #3-->
                    <section class="mb-5">
                        <div>
                            <label for="suggestionTextarea" class="form-label">3. Any feedback or suggestions for improvement? We’d love to here them (Optional)</label>
                            <textarea class="form-control" id="suggestionTextarea" rows="6" placeholder="Write your suggestions here..." style="resize: none;"></textarea>
                        </div>
                    </section>

                    <!--SUBMIT BUTTON-->
                    <section class="mb-5 d-flex justify-content-center gap-5">
                        <button type="button" class="btn border-0">Cancel</button>
                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                    </section>


                </form>
            </div>
        </div>















    </main>
    </div>
    </div>




    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>