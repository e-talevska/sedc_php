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

$conn = fopen("write.txt", "w");
fwrite($conn, "Pisuvame od pocetok vo write.txt");
fclose($conn);

//echo file_get_contents("write.txt");

$conn = fopen("write.txt", "a");
fwrite($conn, "\nDopolnuvame vo write.txt");
fclose($conn);

echo str_replace("\n", "<br>", file_get_contents("write.txt"));

unlink("write.txt");