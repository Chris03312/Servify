// attendance_time.js

// Extract variables from attendanceData
const { timeIn, timeOut, targetTime } = attendanceData;

// Function to format time as hh:mm:ss
function formatTime(date) {
    return date.toLocaleTimeString('en-US', { hour12: false });
}

// Function to show live current time
function showCurrentTime() {
    const now = new Date();
    document.getElementById("message").innerHTML = `<span class="text-success">${formatTime(now)}</span>`; // Changed to "text-success" for green color
}

// Function to calculate and display the countdown
function updateCountdown(timeIn, targetTime) {
    const now = new Date();
    const [hours, minutes, seconds] = timeIn.split(':');
    const startDate = new Date();
    startDate.setHours(hours, minutes, seconds, 0);

    const [targetHours, targetMinutes, targetSeconds] = targetTime.split(':');
    const targetDate = new Date();
    targetDate.setHours(targetHours, targetMinutes, targetSeconds, 0);

    const timeDifference = targetDate - now;

    if (timeDifference <= 0) {
        document.getElementById("message").innerHTML = "Countdown finished!";
        clearInterval(countdownInterval);
        return;
    }

    const diffHours = Math.floor(timeDifference / (1000 * 60 * 60));
    const diffMinutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    const diffSeconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

    document.getElementById("message").innerHTML =
        `YOU STILL HAVE <span class="text-danger">${diffHours.toString().padStart(2, '0')}:${diffMinutes.toString().padStart(2, '0')}:${diffSeconds.toString().padStart(2, '0')}</span>`;
}

// Initialize the attendance logic
function initializeAttendanceTimer(timeIn, timeOut, targetTime) {
    if (timeOut) {
        setInterval(showCurrentTime, 1000); // Show live current time in green
    } else if (timeIn) {
        const countdownInterval = setInterval(() => updateCountdown(timeIn, targetTime), 1000);
    } else {
        document.getElementById("message").innerHTML = "No attendance data available.";
    }
}

// Run the initialization
initializeAttendanceTimer(timeIn, timeOut, targetTime);
