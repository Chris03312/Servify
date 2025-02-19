<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer| Attendance</title>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="container-fluid d-flex flex-row justify-content-between align-items-center border p-3">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                            <div><img src="../img/DPPAM LOGO.png" alt="Profile picture" class="img-fluid"
                                    width="100px;"></div>
                            <div>
                                <h4><?php echo $attendancesinfo['FIRST_NAME'] . " " . $attendancesinfo['MIDDLE_NAME'] . " " . $attendancesinfo['SURNAME'] ?? " "; ?>
                                </h4>
                                <p><strong>Membership no:</strong>
                                    <?php echo $attendancesinfo['VOLUNTEERS_ID'] ?? " "; ?>
                                </p>
                                <p><?php echo $attendancesinfo['ROLE'] . " - " . $attendancesinfo['ASSIGNED_POLLING_PLACE'] ?? " "; ?>
                                </p>
                            </div>
                        </div>

                        <div class="qrCode">
                            <img src="../img/PPCRV LOGO.png" alt="QR Code" class="img-fluid" width="100px;">
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="container-fluid text-center border p-3">
                        <h5><span class="text-danger" id="messageLate"></span></h5>
                        <h5><span class="text-warning" id="messageCountdown"></span></h5>
                        <h5><span class="text-danger" id="messageOvertime"></span></h5>
                        <h5><span class="text-success" id="messageCurrentTime"></span></h5>
                    </div>
                    <!-- <script src="js/attendancetime.js"></script> -->
                </div>

                <div class="col-12">
                    <div class="container-fluid border p-3" style="border-top: 40px solid blue !important;">
                        <?php if (!empty($getAttendances)): ?>
                            <!-- Display formatted date -->
                            <h5 class="text-center">
                                <?php echo date('D, F d, Y', strtotime($getAttendances['DATE'])); ?>
                                <h5 class="text-center"><span class="text-info" id="messageEarly"></span></h5>
                            </h5>
                            <div>
                                <!-- Display time-in and time-out -->
                                <div class="time-in">
                                    <h3>TIME IN:
                                        <?php echo $getAttendances['TIME_IN']; ?>
                                    </h3>
                                </div>
                                <div class="time-out">
                                    <h3>TIME OUT:
                                        <?php echo $getAttendances['TIME_OUT']; ?>
                                    </h3>
                                </div>
                            </div>
                        <?php else: ?>
                            <div>
                                <!-- Display time-in and time-out -->
                                <div class="time-in">
                                    <h3>TIME IN: 00:00:00
                                    </h3>
                                </div>
                                <div class="time-out">
                                    <h3>TIME OUT: 00:00:00
                                    </h3>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var attendanceData = {
                timeIn: <?php echo isset($getAttendances['TIME_IN']) && $getAttendances['TIME_IN'] !== '00:00:00' ? json_encode($getAttendances['TIME_IN']) : 'null'; ?>,
                timeOut: <?php echo isset($getAttendances['TIME_OUT']) && $getAttendances['TIME_OUT'] !== '00:00:00' ? json_encode($getAttendances['TIME_OUT']) : 'null'; ?>,
                targetTimeOut: '17:00:00',
                targetTimeIn: '05:00:00'
            };

            function getManilaTime() {
                return new Date().toLocaleString("en-PH", { timeZone: "Asia/Manila" });
            }

            function timeToDate(timeString) {
                if (!timeString || timeString === "00:00:00") return null;
                var timeParts = timeString.split(':');
                var date = new Date();
                date.setHours(timeParts[0], timeParts[1], timeParts[2], 0);
                return date;
            }

            window.onload = function () {
                var messageElementLate = document.getElementById('messageLate');
                var messageElementCountdown = document.getElementById('messageCountdown');
                var messageElementEarly = document.getElementById('messageEarly');
                var messageElementOvertime = document.getElementById('messageOvertime');
                var messageElementCurrentTime = document.getElementById('messageCurrentTime');

                var targetTimeIn = timeToDate(attendanceData.targetTimeIn);
                var targetTimeOut = timeToDate(attendanceData.targetTimeOut);
                var currentTime = new Date(getManilaTime());

                var timeIn = timeToDate(attendanceData.timeIn);
                var timeOut = timeToDate(attendanceData.timeOut);

                if (currentTime < targetTimeIn) {
                    targetTimeIn.setDate(targetTimeIn.getDate() - 1);  // Handle clock-in before midnight
                }
                if (currentTime > targetTimeOut) {
                    targetTimeOut.setDate(targetTimeOut.getDate() + 1);  // Handle clock-out after midnight
                }

                // Check if the user is late for clock-in
                if (!timeIn && currentTime > targetTimeIn) {
                    messageElementLate.textContent = "You're Late!";
                    messageElementLate.style.display = "block";
                    messageElementLate.classList.add("text-danger");
                }

                function isTimeOutEarly(timeOut, targetTimeOut) {
                    if (!timeOut) return false;
                    return timeOut.getTime() < targetTimeOut.getTime();
                }

                // Handle countdown until time-out
                if (timeIn && currentTime < targetTimeOut) {
                    var remainingTime = targetTimeOut - currentTime;
                    if (currentTime.toDateString() === targetTimeOut.toDateString()) {
                        messageElementCountdown.textContent = "Time remaining until time-out: " + formatTime(remainingTime);
                        messageElementCountdown.classList.add("text-warning");

                        var countdownInterval = setInterval(function () {
                            remainingTime -= 1000;
                            messageElementCountdown.textContent = "Time remaining until time-out: " + formatTime(remainingTime);
                            if (remainingTime <= 0) {
                                clearInterval(countdownInterval);
                                messageElementCountdown.textContent = "Time to clock out!";
                                messageElementCountdown.classList.remove("text-warning");
                                messageElementCountdown.classList.add("text-success");
                            }
                        }, 1000);
                    } else {
                        messageElementCountdown.classList.add("text-muted");
                    }
                }

                // Handle early clock-out
                if (isTimeOutEarly(timeOut, targetTimeOut)) {
                    messageElementEarly.textContent = "Clocked out early!";
                    messageElementEarly.classList.add("text-info");
                }

                // ✅ Overtime Detection Logic with Persistence
                var overtimeInterval = setInterval(function () {
                    // Recalculate timeOut if it's null (because it's '00:00:00')
                    if (timeOut === null || timeOut === "00:00:00") {
                        timeOut = new Date();
                        timeOut.setHours(0, 0, 0, 0);  // Set it to the next day at midnight
                        timeOut.setDate(timeOut.getDate() + 1); // Move it to the next day
                    }

                    // Check if the user is in overtime
                    if (timeIn && (!timeOut || timeOut === null) && currentTime > targetTimeOut) {
                        console.log("Overtime condition triggered!"); // Debug log to see if it's triggered
                        messageElementOvertime.textContent = "Overtime! Please clock out.";
                        messageElementOvertime.classList.add("text-danger");  // Ensure red color
                    } else {
                        // If clocked out, stop showing overtime message
                        if (timeOut && timeOut !== null) {
                            messageElementOvertime.textContent = "";
                            messageElementOvertime.classList.remove("text-danger");
                            clearInterval(overtimeInterval); // Stop checking once clocked out
                        }
                    }
                }, 1000);  // Check every second if overtime condition still applies

                // Update the current time display
                setInterval(function () {
                    var currentTime = new Date(getManilaTime());
                    var hours = String(currentTime.getHours()).padStart(2, '0');
                    var minutes = String(currentTime.getMinutes()).padStart(2, '0');
                    var seconds = String(currentTime.getSeconds()).padStart(2, '0');
                    messageElementCurrentTime.textContent = "Current time: " + hours + ":" + minutes + ":" + seconds;
                }, 1000);

            };

            // Helper function to format time (milliseconds) into HH:MM:SS format
            function formatTime(milliseconds) {
                var hours = Math.floor(milliseconds / 3600000);
                var minutes = Math.floor((milliseconds % 3600000) / 60000);
                var seconds = Math.floor((milliseconds % 60000) / 1000);
                return (hours < 10 ? '0' : '') + hours + ':' +
                    (minutes < 10 ? '0' : '') + minutes + ':' +
                    (seconds < 10 ? '0' : '') + seconds;
            }
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