window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    var chartData;
    $.post("data/getSensorData.php",
        {
            sid: 2,
            minutes: 10
        },
        function (data, status) {
            var parsedData = JSON.parse(data);
            makeChart(parsedData, ctx);
    });
};

function getProperties(){

}

function makeChart(Points, ctx){
    var labels = [];
    var pts = [];
    for(var i = 0; i < Points.length; ++i){
        labels.push(Points[i].x);
        pts.push(Points[i].y);
    }
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Sensor 1",
                    fill: false,
                    lineTension: 0.1,
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
                    data: pts,
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Pings Per Minute"
                    },
                    ticks: {
                        beginAtZero: true,
                        min: 0,
                        max: 5,
                        stepWidth: 2
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Time"
                    }
                }]
            }
        }
    });
}
