document.addEventListener("DOMContentLoaded", function () {
    const messageEl = document.getElementById("message");

    // Utility function to format time as HH:mm:ss
    function formatTime(date) {
        const hours = date.getHours().toString().padStart(2, "0");
        const minutes = date.getMinutes().toString().padStart(2, "0");
        const seconds = date.getSeconds().toString().padStart(2, "0");
        return `${hours}:${minutes}:${seconds}`;
    }

    function updateClock() {
        const now = new Date();
        const today = now.toISOString().split("T")[0]; // Format: YYYY-MM-DD

        const midnight = new Date(`${today}T00:00:00`);
        const targetTimeIn = new Date(`${today}T${attendanceData.targetTimeIn}`);
        const targetTimeOut = new Date(`${today}T${attendanceData.targetTimeOut}`);
        const endOfDay = new Date(`${today}T23:59:59`);

        let message = "";
        let colorClass = "text-black";  // Default to black

        // Parse user clock in/out times
        const userTimeIn = attendanceData.timeIn ? new Date(`${today}T${attendanceData.timeIn}`) : null;
        const userTimeOut = attendanceData.timeOut ? new Date(`${today}T${attendanceData.timeOut}`) : null;

        // Scenario 1: Before clocking in (midnight to 8:00 AM)
        if (now >= midnight && now < targetTimeIn) {
            const diff = targetTimeIn - now;
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            message = `Countdown to clock in: ${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
            colorClass = "text-primary";  // Blue for clock in countdown
        }

        // Scenario 2: User didn't clock in by 8:00 AM (even past 5:00 PM)
        else if (!userTimeIn && now >= targetTimeIn) {
            message = "You're Late!";
            colorClass = "text-danger";  // Red for late
        }

        // Scenario 3: User clocked in and counting down to clock out
        else if (userTimeIn && now >= userTimeIn && now < targetTimeOut) {
            const diff = targetTimeOut - now;
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            message = `You still have ${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")} to clock out.`;
            colorClass = "text-warning";  // Orange for countdown to clock out
        }

        // Scenario 4: User didn't clock out by 5:00 PM
        else if (!userTimeOut && now >= targetTimeOut && now <= endOfDay) {
            const diff = now - targetTimeOut;
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            message = `OVERTIME BY ${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
            colorClass = "text-danger";  // Red for overtime
        }

        // Scenario 5: User clocked in and out
        else if (userTimeIn && userTimeOut) {
            message = `Current Time: ${formatTime(now)}`;
            colorClass = "text-success";  // Green for current time
        }

        // Update message and class
        messageEl.textContent = message;
        messageEl.className = colorClass;  // Apply the correct color class
    }

    // Run the clock every second
    setInterval(updateClock, 1000);
});
