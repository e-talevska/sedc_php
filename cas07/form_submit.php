<?php
$error = "";
if(isset($_POST['login'])) {
    if($_POST['username'] == "emilija") {
        header("Location: prv.php");
    } else {
        $error = "Username is not correct";
    }

}

echo $error;
?>