Intel Edison Motion Sensor Reader
=================================
Author: Nicholai Mitchko
A simple node.js application intended to collect motion sensor data and upload that data to a database

Materials
---------
1. Intel Edison
2. Edison Arduino Breakout Board
3. 4x HC-SR501 IR Motion Sensors [Datasheet](https://www.mpja.com/download/31227sc.pdf)
4. Long Ribbon Cables Connecting Sensors to the Board
    * We used [these](http://www.amazon.com/Ribbon-Cable-10-wire-15ft/dp/B007R9SQQM?ie=UTF8&psc=1)
5. Power Supply For Board
    * The board needs to have a decent current to power all the sensors
    * We use a 12v 2a suppply to power all the entire setup [Link](http://www.amazon.com/Ribbon-Cable-10-wire-15ft/dp/B007R9SQQM?ie=UTF8&psc=1)

Setup
-----
1. Put Together Board & Download Node Project (This DIR)
2. Load Linux Image
3. Solder IR sensors to ribbon cable
4. Connect IR sensors to board
    * 5v input
    * Data Pins on board (we use 13,8,9,10,11)
5. <a href="Install">Install </a>


Important App Files
---------------------------
* main.js
* package.json
* README.md

<div id="Install"></div>

Installing & Running
-------------------------

1. Make Sure Node is Installed
```bash
     opkg install node
```
2. Copy to Edison Device
```bash
    scp /edison/EdisonProject/* root@edison.local:/node_app_slot/
```
3. Install Dependencies
```bash
    cd /node_app_slot
    npm install
```
4. Restart Node
```bash
    cd /node_app_slot
    nohup node main.js &
    # the nohup command in line 2 ignores the hangup call in the ssh terminal so it runs until killed manually
```