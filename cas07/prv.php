<?php
session_start();
//if the user is not logged in
//if(!isset($_COOKIE['logiran'])) {
//    header("Location: form.php");
//}
if(isset($_SESSION['logiran']) === false) {
    header("Location: form.php");
}
var_dump($_SESSION);
?>

<html>
    <head>
        <title>Prv</title>
    </head>
    <body>
        <h2>Prv</h2>
        <a href="vtor.php?page=1&name=PHP">Vtora stranica</a>
    </body>
</html>