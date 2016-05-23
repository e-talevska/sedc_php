<?php
/**
 * Created by PhpStorm.
 * User: emilija.talevska
 * Date: 23.05.2016
 * Time: 20:45
 */

$connection = fopen("test.txt",'r');
//$content = fread($connection, filesize("test.txt"));

while(!feof($connection)) {
    echo "<h2>" . fgets($connection) . "</h2>";
}

fclose($connection);

//file_get_contents("test.txt");
//
//
//
//var_dump($content );