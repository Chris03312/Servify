document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("volunteersPerYearChart").getContext("2d");

    new Chart(ctx, {
        type: "line",
        data: {
            labels: ["2020", "2021", "2022", "2023", "2024", "2025"], // Years
            datasets: [
                {
                    label: "Volunteers in Caloocan",
                    data: [120, 80, 120, 60, 100, 10], // Replace with dynamic data
                    borderColor: "blue",
                    backgroundColor: "rgba(0, 0, 255, 0.2)",
                    borderWidth: 2,
                    fill: true
                },
                {
                    label: "Volunteers in Malabon",
                    data: [60, 120, 100, 50, 80, 5], // Replace with dynamic data
                    borderColor: "red",
                    backgroundColor: "rgba(255, 0, 0, 0.2)",
                    borderWidth: 2,
                    fill: true
                },
                {
                    label: "Volunteers in Navotas",
                    data: [20, 90, 130, 70, 100, 20], // Replace with dynamic data
                    borderColor: "green",
                    backgroundColor: "rgba(0, 255, 0, 0.2)",
                    borderWidth: 2,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Number of Volunteers",
                        font: {
                            size: 13
                        }
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: "Year",
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });
});
