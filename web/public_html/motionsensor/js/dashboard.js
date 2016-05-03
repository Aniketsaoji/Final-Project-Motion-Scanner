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

function getChartColor(i) {
    return colors[i % colors.length];
}

function doLoad(zipCode){
    var sensorData = [];
    if (zipCode != undefined) {
        makeCrime($('#table1 tr:last'), zipCode);
        $.get('data/getSensorData.php', {
                propertyID: 1
            }, function (data, status) {
                var sensorIDs = JSON.parse(data);
                var Data = [];
                for (var i = 0; i < sensorIDs.length; ++i) {
                    Data.push(getSensorData(sensorIDs[i], 24));
                }
                $.when.apply(null, Data).done(
                    function () {
                        var SensorData = [];
                        for (var i = 0; i < arguments.length; ++i) {
                            var movementData = JSON.parse(arguments[i][0]);
                            if (movementData.length > 0) {
                                SensorData.push(movementData);
                            }
                        }
                        makeChart(SensorData, document.getElementById("canvas").getContext("2d"));
                    }
                );
            }
        );
    }
}

function makeChart(SensorData, ctx) {
    var labels = [];
    var sets = [];
    for (var i = 0; i < SensorData.length; ++i) {
        var pts = [];
        for (var j = 0; j < SensorData[i].length; ++j) {
            if (i == 0) {
                labels.push(SensorData[0][j].x == 0? "Past hour" : SensorData[0][j].x + " hours ago");
            } else if (i == (SensorData.length - 1)) {

            }
            pts.push(SensorData[i][j].y);
        }
        if (pts.length > 0) {
            var chartColor = getChartColor(i);
            sets.push({
                type: 'bar',
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
        type: 'bar',
        data: {
            labels: labels,
            datasets: sets
        },
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Pings Per Hour"
                    },
                    ticks: {
                        beginAtZero: true,
                        min: 0,
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

function getSensorData(sensorId, timeInHours) {
    return $.post("data/getSensorData.php",
        {
            sid: sensorId,
            minutes: timeInHours
        });
}

function makeCrime(context, zipCode, radius = 0.02) {
    console.log(zipCode);
    $.ajax({
        url: 'http://maps.googleapis.com/maps/api/geocode/json',
        data: {
            "address" : zipCode
        },
        type: "GET",
        dataType: 'json',
        success: function(data) {
            latlng = data.results[0].geometry.location;
            console.log(latlng);
            $.ajax({
                url: 'http://api.spotcrime.com/crimes.json',
                data: {
                    lat: latlng.lat,
                    lon: latlng.lng,
                    radius: radius,
                    key: '.',
                    _: Date.now()
                },
                type: "GET",
                dataType: 'jsonp',
                success: function(crimeData){
                    for (var i = 0; i < crimeData.crimes.length; ++i) {
                        context.after('<tr></th><td>' + (i+1) + '</td><td>' + crimeData.crimes[i].type + '</td><td>' + crimeData.crimes[i].date + '</td><td><a href="' + crimeData.crimes[i].link + '">' + crimeData.crimes[i].address +'</a></td><td>' + '<a href="https://www.google.com/maps/@' + latlng.lat + ',' + latlng.lng + ',20z" target="_blank"' +
                            '<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>' +
                            '</a>' + '</td></tr>');
                    }
                }
            });
        }
    });
}

