#!/usr/bin/env node
// Author       : Nicholai Mitchko
// Date         : 3/16/2016
// File         : main.js
// Description  : javascript file that collects motion sensor data and inputs it into a database
// Platform     : Intel Edison

var mraa = require('mraa');                                 // Setup Code to Include The GPIO Library


var pins = [new mraa.Gpio(13), new mraa.Gpio(7), new mraa.Gpio(8)];
for(var i = 0; i < pins.length; ++i){
    pins[i].dir(mraa.DIR_IN);
}

var exec = require('child_process').exec;
// Variable to hold movement values
var zones = new Array(false, false, false, false, false);

// Function to insert the values to a database
function updateDatabase() {
    console.log(zones);
    for(var i = 0; i < 5; i++){
        if(zones[i] == true){
            var a = i + 1;
            var url = 'http://cscilab.bc.edu/~mitchko/motionsensor/update.php?sid=' + a;
            exec('wget -qO- ' + url + " &> /dev/null", function(error, stdout, stderr){
            });
        }
    }
    resetZones();
}

// Reset Movement Data, called in zones
function resetZones() {
    zones = [false, false, false, false, false];
}

// Reads the IO pin for motion values from the sensor
function checkForMotion() {
    for(var j = 0; j < pins.length; ++j){
        zones[j] = pins[j].read() == 1 || zones[j];
    }
}
// Give the Sensors 15 seconds to warm up :)
setTimeout(function () {
    setInterval(checkForMotion, 5);     // Run Motion check every 5 milliseconds
    setInterval(updateDatabase, 15000);  // Update the database every 15 seconds, (15 second Motion-Window)
}, 15000);