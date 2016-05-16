<?php
session_start();
if(!isset($_SESSION['logiran'])) {
    header("Location: prv.php");
}
$error = "";
if(isset($_POST['login'])) {
    if (trim($_POST['username']) == '') {
        $error .= "<br> Username cannot be blank";
    }
    if(strlen($_POST['password'])<6){
        $error .="<br> Password must have at least 6 chars";
    }
    if(strpos($_POST['password'],"?")=== 0){
        $error .="<br> The password cannot have '?' at the beginning ";
    }
    if(strpos($_POST['password'],"pass")=== false){
        $error .="<br>The password doesn't contain 'pass'.";
    }
    if($error == ""){
        $_SESSION['username'] = $username;
        $_SESSION['logiran'] = true;
        header("location: prv.php");
    }

   // if($_POST['username'] == "emilija") {
     //   header("Location: prv.php");
//    } else {
//        $error = "Username is not correct";
//    }

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