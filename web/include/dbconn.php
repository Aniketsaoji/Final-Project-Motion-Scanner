<?php

function connect_to_db( $dbname ){
    $dbc = new PDO('mysql:dbname='.$dbname.';host=localhost;charset=utf8', 'mitchko', 'mMpGCQAH',
        array(  PDO::ATTR_EMULATE_PREPARES  => false,
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION));
	return $dbc;
}

function disconnect_from_db(PDO $dbc){
    // Done implicitly with PDO :)
}

/**
 * @param PDO $dbc              The PDO Database connection. Will connect if not connected.
 * @param $qry                  The query the has to run with ? in the place of values as a prepared statement
 * @param array $parameters     An associative array where the key is the value to insert into the prepared statment and the value is type of PDO statement (PDO::PARAM_INT is for ints)
 * @return array                Returns the Rows that are affected by the statement
 */
function perform_query_select(PDO $dbc, $qry, $parameters){
    $statement = $dbc->prepare($qry);
    $i = 1;
    foreach($parameters as $value => $PDOType){
        $statement->bindValue($i, $value, $PDOType);
        $i++;
    }
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/**
 * @param PDO $dbc              The PDO Database connection. Will connect if not connected.
 * @param $qry                  The query the has to run with ? in the place of values as a prepared statement
 * @param array $parameters     An associative array where the key is the value to insert into the prepared statment and the value is type of PDO statement (PDO::PARAM_INT is for ints)
 * @return array                Returns the Rows that are affected by the statement
 */
function perform_query_insert(PDO $dbc, $qry, array $parameters){
    $statement = $dbc->prepare($qry);
    $i = 1;
    foreach($parameters as $value => $PDOType){
        $statement->bindValue($i, $value, $PDOType);
        $i++;
    }
    $statement->execute();
}

/**
 * @param PDO $dbc              The PDO Database connection. Will connect if not connected.
 * @param $qry                  The query the has to run with ? in the place of values as a prepared statement
 * @param array $parameters     An associative array where the key is the value to insert into the prepared statment and the value is type of PDO statement (PDO::PARAM_INT is for ints)
 * @return array                Returns the Rows that are affected by the statement
 */
function perform_query_insert_noparam(PDO $dbc, $qry, array $parameters){
    $statement = $dbc->prepare($qry);
    $i = 1;
    foreach($parameters as $value){
        $statement->bindValue($i, $value);
        $i++;
    }
    $statement->execute();
}

function perform_query_update(PDO $dbc, $qry, array $parameters){
    $statement = $dbc->prepare($qry);
    $i = 1;
    foreach($parameters as $value){
        $statement->bindValue($i, $value);
        $i++;
    }
    $statement->execute();
}