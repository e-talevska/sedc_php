<?php
$connection=fopen("test.txt", 'r');
//$content=fread($connection, filesize("test.txt"));
while(!feof($connection)){
    echo "<h2>" . fgets($connection) . "</h2>";
}
fclose($connection);
//file_get_content gi pravi site tri nesta(fopen fread fwrite)
//var_dump($content);

$conn=fopen("write.txt", "w");
fwrite($conn," Pisuvame od pocetok vo write.txt");
fclose($conn);


//echo file_get_contents("write.txt");

$conn=fopen("write.txt", "a");
fwrite($conn,"\n Dopolnuvame vo write.txt");
fclose($conn);

echo str_replace("\n", "<br>", file_get_contents("write.txt"));
unlink("write.txt");
?>