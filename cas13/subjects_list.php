<?php

//cekor 1-konekcija so mysql
$db_connect=mysqli_connect('localhost', 'root', '', 'widget_corp');
if(mysqli_connect_errno()){//ovde ke vleze samo ako ima error(ako vrati nesto >0
    die("Database connection error:" . mysqli_connect_error());
}
//cekor 2-fetch data
//query- se sto upatuvame do mysql
$query="SELECT * ";
$query .= "FROM subjects";

$result=mysqli_query($db_connect, $query);//probuva preku linkot(db_connect)da isprati query
if(!$result){ //$result===false
    die("Error while reading data:" . mysqli_error($db_connect));
}

while($row=mysqli_fetch_assoc($result)){//zemi ja prvata redica od mnozestvoto podatoci...so assoc go dava
    //imeto na kolonatana mesto mestoto kade se naogja kako so pravi "row"
    echo $row['id'] . " " . $row['menu_name'] . " <a href='subjects_insert.php?id=".$row['id']."'>Edit</a>" . " <a href='subjects_delete.php?id=".$row['id']."'>Delete</a>" . "<br>";
}
mysqli_free_result($result);

//cekor 5-zatvori konekcija so mysql
mysqli_close($db_connect);
?>