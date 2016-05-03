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
    $rows = perform_query_select($dbc, 'SELECT TIMESTAMPDIFF(HOUR , `motiontime`, NOW()) as x, count(`entry`) as y FROM mitchko.Security WHERE motiontime >= DATE_SUB(NOW(), INTERVAL ? HOUR ) AND sensorId=? group by x order by x DESC', array($timePeriod => PDO::PARAM_LOB,$sensorId => PDO::PARAM_INT));
    return $rows;
}

function getSensorsByProperty(PDO $dbc, $propertyID, $userId){
    $rows = perform_query_select($dbc, 'select (sensorid) from mitchko.Sensor where `propertyid`=?', array($propertyID => PDO::PARAM_LOB));
    $sensors = array();
    foreach($rows as $sensor){
        if(doesUserOwnSensor($dbc, $sensor['sensorid'], $userId)){
            array_push($sensors, $sensor['sensorid']);
        }
    }
    return $sensors;
}

$userId = isloggedin(true);
$dbc = connect_to_db("mitchko");
if ($userId != false) {
    $propertyID = filter_input(INPUT_GET, 'propertyID', FILTER_SANITIZE_NUMBER_INT);
    if($propertyID != null && $propertyID != false){
        echo json_encode(getSensorsByProperty($dbc, $propertyID, $userId));
    } else {
        $sensorId = filter_input(INPUT_POST, 'sid', FILTER_SANITIZE_NUMBER_INT);
        $timePeriod = filter_input(INPUT_POST, 'minutes', FILTER_SANITIZE_NUMBER_INT);
        if (doesUserOwnSensor($dbc, $sensorId, $userId)) {
            echo json_encode(getSensorData($dbc, $sensorId, $timePeriod));
        }
    }
}