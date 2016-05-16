<?php
$error = "";
if(isset($_POST['login'])) {
    if($_POST['username'] == "emilija") {
        header("Location: prv.php");
    } else {
        $error = "Username is not correct";
    }

}
?>

<html>
    <head>
        <title>Working with forms</title>
    </head>
    <body>
        <?php echo $error; ?>
        <form action="" method="post">
            <p>
                <label>Username:</label>
                <input type="text" name="username" >
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="password" >
            </p>
            <p>
                <button type="submit" name="login">Login</button>
            </p>
        </form>
    </body>
</html>