<?php
session_start();
if(!isset($_SESSION['logiran'])){
    header("location:form.php");
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