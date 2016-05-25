<?php
session_start();
//if(isset($_COOKIE['logiran'])) {
//    header("Location: prv.php");
//}
if(isset($_SESSION['logiran'])) {
    header("Location: prv.php");
}
$username = $password = $error = "";
/*
 *
 * $username = "";
 * $password = "";
 * $error = "";
 *
 */
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(trim($_POST['username']) == '') {
        $error .= "<br> Username cannot be blank";
    }

    if(strlen($_POST['password']) < 6) {
        $error .= "<br> Password must have at least 6 chars";
    }

    if(strpos($_POST['password'],"?") === 0) {
        $error .= "<br> The password cannot have '?' at beginning";
    }

    if(strpos($_POST['password'], "pass") === false) {
        $error .= "<br> Pass must contain 'pass'";
    }

    if($error == "") {
//        setcookie('logiran', $username, time() + 3600);
        $_SESSION['username'] = $username;
        $_SESSION['logiran'] = true;
        header("Location: prv.php");
    }

//    if(empty($_POST['username'])) {
//        $error .= "<br> Username cannot be blank";
//    }

//    if($_POST['username'] == "emilija") {
//        header("Location: prv.php");
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
                <input type="text" name="username" value="<?php echo $username ; ?>" >
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
            </p>
            <p>
                <button type="submit" name="login">Login</button>
            </p>
        </form>
    </body>
</html>