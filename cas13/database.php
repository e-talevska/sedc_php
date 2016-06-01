<?php
//isto e so subjects list

function connect_to_db(){//isto ko cekor 1
    $db_connect = mysqli_connect('localhost', 'root', '', 'widget_corp');
    if (mysqli_connect_errno()) {//ovde ke vleze samo ako ima error-ako vrati nesto >0
        die("Database connection error:" . mysqli_connect_error());
    }
    return $db_connect;
}

function disconnect_from_db($db_connect){
//cekor 5-zatvori konekcija so mysql
    mysqli_close($db_connect);
}
?>