setInterval(function() {
    // Decrease the seconds
    seconds--;

    // If seconds reach 0, decrease minutes and reset seconds
    if (seconds < 0) {
        seconds = 59;
        minutes--;
    }

    // If minutes reach 0, decrease hours and reset minutes
    if (minutes < 0) {
        minutes = 59;
        hours--;
    }

    // If hours reach 0, decrease days and reset hours
    if (hours < 0) {
        hours = 23;
        days--;
    }

    // Update the countdown on the page
    document.getElementById('days').innerHTML = days;
    document.getElementById('hours').innerHTML = hours;
    document.getElementById('minutes').innerHTML = minutes;
    document.getElementById('seconds').innerHTML = seconds;

    // If the countdown reaches zero, stop the interval and show "EXPIRED"
    if (days <= 0 && hours <= 0 && minutes <= 0 && seconds <= 0) {
        clearInterval();
        document.getElementById('countdown').innerHTML = 'EXPIRED';
    }
}, 1000); // Update every second (1000ms)
