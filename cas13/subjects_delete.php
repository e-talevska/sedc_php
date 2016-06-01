<?php
/**
 * Created by PhpStorm.
 * User: emilija.talevska
 * Date: 01.06.2016
 * Time: 20:38
 */
if(isset($_GET['id'])) {
    require_once('database.php');
    $db_connect = connect_to_db();

    $query = "DELETE FROM subjects ";
    $query .= "WHERE id = " . $_GET['id'];

    $result = mysqli_query($db_connect, $query);
    if($result) {
        header("Location: subjects_list.php");
        exit;
    } else {
        echo $query. " " .mysqli_error($db_connect);
    }

    disconnect_from_db($db_connect);
} else {
    header("Location: subjects_list.php");
    exit;
}