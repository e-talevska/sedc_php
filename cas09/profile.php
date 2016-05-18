<?php
session_start();
if(isset($_SESSION['id'])===false){
    header("location: login.php");
    exit;

}
if(isset($_POST['upload'])){
    var_dump($_FILES);
}

?>

<html>
    <head>
        <title>profile page</title>
    </head>
    <body>
        <?php echo "<h2>".$_SESSION['name']."</h2>"; ?>
        <br>
        <a href="logout.php">log out</a>
        <form method="post" enctype="multipart/form-data">
            <p>
                <label> upload profile picture</label>
                <input type="file" name="profile_picture">
                <span></span>
            </p>
            <p>
                <button type="submit" name="upload">upload</button>
            </p>
        </form>
    </body>
</html>
