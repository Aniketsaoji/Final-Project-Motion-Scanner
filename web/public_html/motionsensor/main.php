<?php

@include '../../include/dbconn.php';

$dbc = connect_to_db('mitchko');
$var = perform_query_select($dbc, 'SELECT CONV(ORD(zones),10,2) AS Movement, motionTime AS `Time` FROM mitchko.motionHistory WHERE NOT (zones=b\'0000\') ORDER BY `motionTime` DESC;',array());
print json_encode($var);