# The  Anti-Tickler

This is an interactive web page that shows movement within our house. An Intel Edison collects motion data from motion sensors within our house, and updates a database every 5 seconds.
This data is then applied to a 3d Model of our house<sup>i</sup> and is rendered in WebGL as a color coded house.  

## Motivation

In late February a string of break-ins occurred in the Brighton off-campus area heavily populated by BC students. Being tech-savy students we decided to use this project to install a cool motion sensor project in our house. This is that project.

### Authors

* Ryan Chan
* Nicholai Mitchko
* Aniket Saoji

### Directory Structure

* edison - Holds all the code used for programming the Intel Edison
* sql - Contains all the code needed to create and setup the database
* web - Contains all the web content supporting the collection and rendering of data
* 3d  - 3d Models of our house's floor(s) in blender

### Intel Edison

We use an Intel Edison as an IOT device to collect motion sensor data given that it provides a relatively low cost, low power, and low time requirement. Also, I had one lying around. It is relatively easy to setup and can be loaded with multiple flavors of linux. We choose the Yocto distribution of linux; Yocto is actively developed by Intel.

We could of opted to use the cheaper and easier to use Andruino uno (which we also have lying around) but the Edison's full linux installation allows us to rely on builtin utilities instead of an card or additional hardware.

![Intel Edison](https://software.intel.com/sites/default/files/managed/b6/0c/iot_TEMP_edisonboard.png)