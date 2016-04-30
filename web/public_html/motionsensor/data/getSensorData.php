<?php
/**
 * Created by PhpStorm.
 * User: Nicholai
 * Date: 4/28/2016
 * Time: 10:57 PM
 */

@include "../../../include/user.php";

function doesUserOwnSensor(PDO $dbc, $sensorId, $userId)
{
    if ($sensorId != null && $sensorId != false) {
        $rows = perform_query_select($dbc, 'SELECT (AssociatedAccountID) FROM mitchko.Properties LEFT OUTER JOIN mitchko.Sensor ON `Properties`.`propertyID` = Sensor.`propertyid` WHERE sensorid=?', array($sensorId => PDO::PARAM_STR));
        if (count($rows) > 0) {
            if(strcmp($rows[0]['AssociatedAccountID'], $userId)== 0){
                return true;
            }
        }
    }
    return false;
}

function getSensorData($dbc, $sensorId, $timePeriod)
{
    $rows = perform_query_select($dbc, 'SELECT (motiontime) FROM mitchko.Security WHERE motiontime >= DATE_SUB(NOW(), INTERVAL ? MINUTE ) AND sensorId=?', array($timePeriod => PDO::PARAM_LOB,$sensorId => PDO::PARAM_INT));
    return json_encode($rows);
}

$userId = isloggedin(true);
$dbc = connect_to_db("mitchko");
if ($userId != false) {
    $sensorId = filter_input(INPUT_POST, 'sid', FILTER_SANITIZE_NUMBER_INT);
    $timePeriod = filter_input(INPUT_POST, 'minutes', FILTER_SANITIZE_NUMBER_INT);
    if (doesUserOwnSensor($dbc, $sensorId, $userId)) {
        echo getSensorData($dbc, $sensorId, $timePeriod);
    }
}