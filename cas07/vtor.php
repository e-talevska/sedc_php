<?php
print_r($_GET);
?>
<html>
    <head>
        <title>Vtor</title>
    </head>
    <body>
        <h2>Vtor</h2>
        <a href="prv.php">Prva stranica</a>
        <?php
            if(isset($_GET['name'])) {
                echo "<h3>" . $_GET['name'] . "</h3>";
            }
        ?>
    </body>
</html>