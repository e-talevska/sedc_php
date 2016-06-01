<?php
/**
 * Created by PhpStorm.
 * User: emilija.talevska
 * Date: 01.06.2016
 * Time: 17:58
 */

//1. cekor 1 - konekcija so mysql
$db_connect = mysqli_connect('localhost', 'root', '', 'widget_corp');
if(mysqli_connect_errno()){ //ovde ke vleze samo ako ima error (> 0)
    die("Database connection error: " . mysqli_connect_error());
}

//2. fetch data
$query = "SELECT * ";
$query .= "FROM subjects";

$result = mysqli_query($db_connect, $query);
if(!$result) { // $result === false
    die("Error while reading data:" . mysqli_error($db_connect));
}

while($row = mysqli_fetch_assoc($result)){
    echo $row['id'] . " " . $row['menu_name'] . " <a href='subjects_insert.php?id=".$row['id']."'>edit</a>" .  " <a href='subjects_delete.php?id=".$row['id']."'>delete</a>" . "<br>";
}

mysqli_free_result($result);

//5. zatvori konekcija so mysql
mysqli_close($db_connect);