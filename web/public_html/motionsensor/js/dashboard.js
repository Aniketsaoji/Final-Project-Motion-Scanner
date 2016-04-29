window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    var chartData;
    $.post("../data/getSensorData.php",
        {
            sid: 1,
            minutes: 30
        },
        function (data, status) {
            chartData = JSON.parse(data);
    });
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
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
                    data: chartData,
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
