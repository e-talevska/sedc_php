<?php
session_start();

//ako ne e setirana sesijata
//proveri dali postoi cookie
if(isset($_SESSION['id']) == false) {
    if(isset($_COOKIE['id'])) {
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['iloggedin'] = true;
        setcookie("id", $_COOKIE['id'], time() + 3600*24*30 );
        setcookie("name", $_COOKIE['name'], time() + 3600*24*30 );
    }
}

if(isset($_SESSION['id'])) {
    header('Location: profile.php');
    exit;
}



require('users.php');
$errors = array();
$username = $password = '';
if(isset($_POST['login'])){
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $remember_me = false;
    //ova znaci deka korisnikot go cekiral checkboxot za
    //remeber me

    if(isset($_POST['remeberme'])){
        $remember_me = true;
    }else {
        $remember_me = false;
    }
    foreach($users as $user) {
        if($user['username'] == $username && $user['password'] == $password){
            if($remember_me) {
                setcookie("id", $user['id'], time() + 3600*24*30 );
                setcookie("name", $user['name'], time() + 3600*24*30 );
            }

            //TODO: zacuvaj vo sesija i prenasoci na
            //profil.php
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: profile.php");
            exit;
        }
    }

        $errors['username'] = "Gresni podatoci za avtentikacija";
        $errors['password'] = "Los pass";
}
?>
<html>
    <head>
        <title>Login form</title>
    </head>
    <body>
        <form method="POST">
            <p>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" >
                <span><?php if(isset($errors['username'])) {echo $errors['username'];}?></span>
            </p>
            <p>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>" >
                <span><?php if(isset($errors['password'])) {echo $errors['password'];}?></span>
            </p>
            <p>
                <input type="checkbox" name="remeberme">
                <label>Keep me logged in</label>
                </p>
            <p>
                <button type="submit" name="login" >Login</button>
            </p>
        </form>
    </body>
</html>
