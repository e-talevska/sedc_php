<?php
//information about php configuration
//phpinfo();exit;
session_start();
if(isset($_SESSION['id']) === false) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['upload'])) {
    var_dump($_FILES);
}
?>

<html>
    <head>
        <title>Profile page</title>
    </head>
    <body>
        <?php echo "<h2>" . $_SESSION['name'] . "</h2>"; ?>
        <br>
        <a href="logout.php">Log out</a>
        <form method="POST" enctype="multipart/form-data">
            <p>
                <label>Upload profile picture</label>
                <input type="file" name="profile_picture" >
                <span></span>
            </p>
            <p>
                <button type="submit" name="upload">Upload</button>
            </p>
        </form>
    </body>
</html>
