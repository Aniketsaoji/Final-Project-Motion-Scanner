window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM"],
            datasets: [
                {
                    label: "Sensor 1",
                    fill: false,
                    lineTension: 0.2,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [6, 9, 5, 1, 5, 3, 7],
                },
                {
                    label: "Sensor 2",
                    fill: false,
                    lineTension: 0.2,
                    backgroundColor: "rgba(100,0,0,0.4)",
                    borderColor: "rgba(100,0,0,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(100,0,0,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(100,0,0,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [9, 5, 1, 5, 3, 7, 6],
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    var ctx2 = document.getElementById("chart2").getContext("2d");
    var myLineChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM"],
            datasets: [
                {
                    label: "Sensor 2",
                    fill: false,
                    lineTension: 0.2,
                    backgroundColor: "rgba(100,0,0,0.4)",
                    borderColor: "rgba(100,0,0,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(100,0,0,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(100,0,0,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [6, 9, 5, 1, 5, 3, 7],
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
};
