<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 01.06.2016
 * Time: 17:58
 */

function connect_to_db(){
    $db_connect = mysqli_connect('localhost', 'root', '', 'widget_corp');
    if(mysqli_connect_errno()) { //ovde ke vleze samo ako ima error (>0)
    die("Database connection error: " . mysqli_connect_errno());
}

    return $db_connect;

}

function disconnect_from_db($db_connect) {
    //5. zatvori konekcija so mysql
    mysqli_close($db_connect);
}