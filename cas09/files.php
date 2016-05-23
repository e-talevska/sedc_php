<?php
$connection=fopen("test.txt", 'r');
//$content=fread($connection, filesize("test.txt"));
while(!feof($connection)){
    echo "<h2>" . fgets($connection) . "</h2>";
}
fclose($connection);

//var_dump($content);
?>