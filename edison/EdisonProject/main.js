#!/usr/bin/env node
// Author       : Nicholai Mitchko
// Date         : 3/16/2016
// File         : main.js
// Description  : javascript file that collects motion sensor data and inputs it into a database
// Platform     : Intel Edison

var mraa = require('mraa');                                 // Setup Code to Include The GPIO Library

var motionInput1 = new mraa.Gpio(13);                       // Pin: 13 Get the MotionSensor input on certain physical pins
var motionInput2 = new mraa.Gpio(7);                        // Pin: 7
var motionInput3 = new mraa.Gpio(8);                        // Pin: 8
var motionInput4 = new mraa.Gpio(9);                        // Pin: 9
var motionInput5 = new mraa.Gpio(10);                       // Pin: 10

motionInput1.dir(mraa.DIR_IN);                              // Make Sure the GPIO Pins in set on input mode
motionInput2.dir(mraa.DIR_IN);
motionInput3.dir(mraa.DIR_IN);
motionInput4.dir(mraa.DIR_IN);
motionInput5.dir(mraa.DIR_IN);

// Tunnel to CSCILAB so we can connect to the database
var tunnel = require('tunnel-ssh');

// Get credentials to login and run sql commands
var credentials = require('./credentials');

// Get library to connect to the database
var mysql = require('mysql');                               // Setup code to include database functionality

// SSH configuration:
// Maps local intel edison port to remote sql port for ease of use
//      * means we can connect to a remote sql server on the local internet ports
var config = {
    host: credentials.sshCredentials[0],
    username: credentials.sshCredentials[1],
    dstPort: 3306,
    password: credentials.sshCredentials[2]
};

// After setup open ssh connection
var server = tunnel(config, function (error, result) {
    console.log("Connected to CSCILAB");
});

// Once tunneled setup the database connection
var connection = mysql.createConnection({
    host: 'localhost',
    user: credentials.databaseCredentials[0],
    password: credentials.databaseCredentials[1],
    database: credentials.databaseCredentials[0]
});

// Connect to the DB
connection.connect();
console.log("Connected to database");

// Variable to hold movement values
var zones = new Array(false, false, false, false, false);

// Function to insert the values to a database
function updateDatabase() {
    connection.query('UPDATE mitchko.motion SET zone1=' + (zones[0] ? 'TRUE' : 'FALSE') +
        ' zone2=' + (zones[1] ? 'TRUE' : 'FALSE') +
        ' zone3=' + (zones[2] ? 'TRUE' : 'FALSE') +
        ' zone4='+(zones[3] ? 'TRUE': 'FALSE') +
        ' zone5='+(zones[4] ? 'TRUE': 'FALSE') +
        ' where id=1', function (err, rows, fields) {
        console.log("Updated Database");
    });
    insertIntoHistory();
    resetZones();
}

// Adds to the motion History
function insertIntoHistory(){
    var id = "";
    connection.query('SELECT id from mitchko.motionHistory order by motionTime asc limit 1', function(err, rows, fields){
        id = rows[0]['id'];
        console.log(id);
        connection.query('update mitchko.motionHistory SET zones=b\'' + (zones[0] ? '1':'0')+ (zones[1] ? '1':'0')+ (zones[2] ? '1':'0')+ (zones[3] ? '1':'0') + '\', motionTime=now() where id='+id,
            function (err, rows, fields){
            });
    });
}

// Reset Movement Data, called in zones
function resetZones() {
    zones = [false, false, false, false, false];
}

// Reads the IO pin for motion values from the sensor
function checkForMotion() {
    // If the zone had motion in it (zone[n] == true) keep the zone true
    // OR
    // If the motion sensor shows motion (motionInput1.read() == 1)
    zones[0] = zones[0]  || motionInput1.read() == 1 ;
    zones[1] = zones[1]  || motionInput2.read() == 1 ;
    zones[2] = zones[2]  || motionInput3.read() == 1 ;
    zones[3] = zones[3]  || motionInput4.read() == 1 ;
    zones[4] = zones[4]  || motionInput5.read() == 1 ;
}
// Give the Sensors 15 seconds to warm up :)
setTimeout(function () {
    setInterval(checkForMotion, 5);     // Run Motion check every 5 milliseconds
    setInterval(updateDatabase, 15000);  // Update the database every 15 seconds, (15 second Motion-Window)
}, 15000);