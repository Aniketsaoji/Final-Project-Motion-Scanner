<?php
/**
 * Created by PhpStorm.
 * User: Nicholai
 * Date: 4/28/2016
 * Time: 10:20 PM
 */

@include '../../include/dbconn.php';

function updateValues(){
    if(isset($_GET['sid'])){
        $sensorid = $_GET['sid'];
        $dbc = connect_to_db("mitchko");
        $rows = perform_query_select($dbc, 'select propertyid from mitchko.Sensor where sensorid=?', array($sensorid => PDO::PARAM_INT));
        if(count($rows)>0){
            perform_query_insert_noparam($dbc, 'insert into mitchko.Security (`propertyID`, `sensorId`, `motiontime`) VALUES (?,?,NOW())', array($rows[0]['propertyid'], $sensorid));
        }
    }
}

updateValues();