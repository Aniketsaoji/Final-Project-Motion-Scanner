var colors = [
    "rgba(46, 204, 113,1.0)",
    "rgba(230, 126, 34,1.0)",
    "rgba(52, 152, 219,1.0)",
    "rgba(149, 165, 166,1.0)",
    "rgba(231, 76, 60,1.0)",

    "rgba(52, 73, 94,1.0)",
    "rgba(189, 195, 199,1.0)",
    "rgba(142, 68, 173,1.0)"
];

function getChartColor(i){
    return colors[i % colors.length];
}

window.onload = function () {
    var ctx = document.getElementById("canvas").getContext("2d");
    var sensorData = [];
    $(document).ajaxStop(function(){
        makeChart(sensorData, ctx);
    });
    $.get('data/getSensorData.php', {
            propertyID: 1
        }, function (data, status) {
            var sensorIDs = JSON.parse(data);
            for (var i = 0; i < sensorIDs.length; ++i) {
                $.post("data/getSensorData.php",
                    {
                        sid: sensorIDs[i],
                        minutes: 10
                    },
                    function (data, status) {
                        parsed = JSON.parse(data);
                        if(parsed.length > 0){
                            sensorData.push(parsed);
                        }
                    });
            }
        }
    );
};

function makeChart(SensorData, ctx) {
    var labels = [];
    var sets = [];
    for (var i = 0; i < SensorData.length; ++i) {
        if (i == 0) {
            for (var j = 0; j < SensorData[0].length; ++j) {
                labels.push(SensorData[0][j].x);
            }
        }
        var pts = [];
        for(var j = 0; j < SensorData[i].length; ++j){
            pts.push(SensorData[i][j].y);
        }
        if(pts.length > 0){
            var chartColor = getChartColor(i);
            sets.push({
                label: "Sensor " + i,
                fill: false,
                lineTension: 0.1,
                backgroundColor: chartColor,
                borderColor: chartColor,
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: chartColor,
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: chartColor,
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: pts,
            });
        }
    }
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: sets
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
