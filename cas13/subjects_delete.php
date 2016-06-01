<?php
if(isset($_GET['id'])) {
    require_once('database.php');
    $db_connect = connect_to_db();

    //za da znajs na koe delete kliknal korisnikot
    $query="DELETE FROM subjects ";
    $query .="WHERE id = " . $_GET['id'];

    $result=mysqli_query($db_connect, $query);
    if($result){
        header("Location:subjects_list.php");
        exit;
    }else{
        echo $query . " " .mysqli_errno($db_connect);//da ni javuva koja greska sme ja napravile vo kodot
    }
    disconnect_from_db($db_connect);
}else {
    header("Location:subjects_list.php");
    exit;
}